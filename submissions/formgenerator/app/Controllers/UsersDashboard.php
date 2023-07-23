<?php

namespace App\Controllers;

use App\Models\FormResponseModel;
use App\Models\FormModel;

class UsersDashboard extends BaseController
{
	// Class variables
	private $formBuilder;

	// Class constructor
	public function __construct()
	{
		// Instantiate the CustomFormBuilder library
		$this->formBuilder = service('CustomFormLibrary');
	}

	// Index view
	public function index()
	{
		// Sample table data
		$tableTitle = 'User List';
		$columnTitles = ['User', 'Form Name', 'Version', 'Datetime'];
		$actions = [
			'New' => 'users/newUser', //New User & New Form
		];
		try {
			$responses = $this->formBuilder->getAllData();
		} catch (\Exception $e) {
			// Return exception
			return $e->getMessage();
		}

		$data = [];

		foreach ($responses as $response) {
			// Access the fields of each row
			$responseID = $response->ResponseID;
			$formID = $response->FormID;
			$datetime = $response->Datetime; //  this is the user's datetime, not form datetime
			$formName = $response->Name;
			$version = $response->Version;
			$name = $response->User;
			$actions['Create'] = 'users/createForm/' . $name; //New Form for current user 

			// Check if the row already exists in $data
			$subrow = [
				'Form Name' => $formName,
				'Version' => $version,
				'Datetime' => $datetime,
				'actions' => [
					'Read' => 'users/' . $responseID . '/readForm/' . $formID, //Read Form 
					'Update' => 'users/' . $responseID . '/updateForm/' . $formID, //Edit Form 
					'Delete' => 'users/' . $responseID . '/deleteForm/' . $formID, //Delete specific form 
				]
			];

			$foundMatch = false;
			// Find the row in $data based on the 'id' field
			foreach ($data as  &$rowData) {
				if ($rowData['id'] == $name) {
					$rowData['Subrows'][] = $subrow;
					$foundMatch = true;
					unset($rowData);
					break;
				}
			}

			if (!$foundMatch) {
				$data[] = [
					'name' => $name,
					'id' => $name,
					'Subrows' => [
						$subrow
					]
				];
			}
		}

		// Generate the table
		$table = create_dashboard_table($tableTitle, $columnTitles, $data, 'user', $actions);

		$data['title'] = 'Users';
		$data['table'] =  $table;
		return view('admin/users/table', $data);
	}

	// View to get HTML dump of unserialised form structure
	public function getForm()
	{
		$formID = $this->request->getVar('formID');
		$formData = $this->formBuilder->getForm($formID); //Call the library to call the model to get the form

		$response = [
			'status' => 'success',
			'form' => $formData,
		];

		// Return the JSON-encoded response
		return $this->response->setJSON($response);
	}

	// View to create a form submission
	public function createForm($name = '')
	{
		//Returns the base template for user to create a new form. If existing user then pass in $name, else it is empty
		//Get all the data from library's model
		$formData = $this->formBuilder->getForm(null, false);

		//Get all the form name and put inside a dropdown selector 
		foreach ($formData as $form) {
			if ($form['Status'] == 1) {
				$options[$form['FormID']] = sprintf("%s (v%s)", $form['Name'], $form['Version']);
			}
		}

		// Sort form according to name and version no
		asort($options);
		$options = ['default' => 'Select Form'] + $options;

		//Using the custom library to create a form to catch what form the user want to create 
		$form = [
			'username' =>
			//new_div($label, $input, $row, $span, $column, $attributes)
			$this->formBuilder->new_div(
				array(
					//new_label($name='', $value='', $attributes='')
					$this->formBuilder->new_label('username', 'User Name'),
					//new_input($name='', $value='', $attributes='' OR $attributes=[])
					($name ?
						$this->formBuilder->new_input('username', $name, 'class="form-control" id="name-control" placeholder="Enter your name" disabled') :
						$this->formBuilder->new_input('username', '', 'class="form-control" id="name-control" placeholder="Enter your name" required')
					),
				),
				1,
				'md',
				9,
				'mt-2'
			),
			'dropdown' =>
			$this->formBuilder->new_div(
				array(
					$this->formBuilder->new_dropdown('form-names',  $options, 'default', 'class="form-control" id="formSelector"')
				),
				2,
				'md',
				9
			),
		];


		$data['title'] = $name ? 'New User' : 'New Form';
		$data['view'] =  $form;
		return view('admin/users/NewForm', $data);
	}

	// View for user submission of a form response
	public function submitForm()
	{
		$post = $this->request->getPost();

		//Retrieve the value of 'username' and 'formid'
		$username = $post['username'] ?? 'default_user';
		$formID = $post['formid'];

		// Check if form is active
		if (!model(FormModel::class)->is_active($formID)) {
			return view('errors/html/error_404', ['message' => 'The form you are trying to submit is currently inactive.']);
		}

		// Remove the 'username' and 'formid' key from the array 
		unset($post['username']);
		unset($post['formid']);

		// extract keys from $post output 
		$keys = array_keys($post);

		$html = $this->formBuilder->getForm($formID);

		//Getting the rules
		try {
			$form = $this->formBuilder->getForm($formID, false);
			$rules = null;

			if (is_null($form['Rules']) || $form['Rules'] === false) {
				$rules = $this->formBuilder->generateRulesFromHTML($html);
			} else {
				$rules = $form['Rules'];
			}
		} catch (\Exception $e) {
			return view('errors/html/error_404', ['message' => $e->getMessage()]);
		}

		//Validate the input using the custom validate function
		$encrypt = false;
		$validatedData = $this->formBuilder->validateData($post, $rules, $encrypt);

		if (!$validatedData['success']) {
			// Validation failed, return error view or perform any other actions
			$errorFields = implode(", ", $validatedData['errors']); // Combine all error fields into a comma-separated string
			$errorMessage = "Validation Error for the following fields: " . $errorFields;
			return view('errors/html/error_404', ['message' => $errorMessage]);
		}

		// Extract the validated data
		$validatedData = $validatedData['data'];

		// Prepare the form data dynamically
		foreach ($keys as $key) {
			$formData[$key] = $validatedData[$key];
		}

		// Check for uploaded files, if any
		$uploaded_files = $this->request->getFiles();

		if ($uploaded_files) {
			$file_label = "user_file";
			$allowedMaxSize = 2048; // 2MB maximum file size
			$allowedMimeTypes = ['image/bmp', 'image/jpg', 'image/jpeg', 'image/gif', 'image/png', 'image/webp'];

			foreach ($uploaded_files['user_file'] as $index => $current_file) {
				// Validate each uploaded file
				if ($current_file->getError() === UPLOAD_ERR_NO_FILE) {
					break;
				}
				// $uploadErrors = $this->validateUploadedFile($current_file, $allowedMaxSize, $allowedMimeTypes);
				$uploadErrors = $this->formBuilder->validateUploadedFile($current_file, $allowedMaxSize, $allowedMimeTypes);

				if (!empty($uploadErrors)) {
					// Return view with the file upload validation errors
					return view('errors/html/error_404', ['message' => "File Upload Error: " . implode(', ', $uploadErrors)]);
				} else {
					// Set folder name (id)
					$folder = sprintf("%d", model(FormResponseModel::class)->get_next_id());
					// Store file on server (id/<filename>)
					$file_path = $current_file->store($folder, $current_file->getRandomName());
					// Set filepath to POST data, if a file is successfully uploaded
					$formData['user_file'][$index] = $file_path;
				}
			}
		} else {
			$formData['user_file'] = '';
		}

		// Serialize the form data
		$formData = serialize($formData);

		// Store the validated encrypted data into the database
		$formID = $formID;
		$user = $username;

		// Call custom library to insert form data 
		$this->formBuilder->submitFormData($formID, $user, $formData);

		// Proceed with any additional actions or redirect as needed
		$data['title'] = 'Form Submission';
		$data['formID'] = $formID;
		return view('admin/users/create_success', $data);
	}

	// Function to get a preview of a user form response
	public function readForm($responseID, $formID)
	{
		$data['title'] = 'View Form';

		// Get user's form response and generate a PDF of it
		$pdfContent = $this->formBuilder->export_to_pdf($this->updateForm($responseID, $formID, true));

		$pdfIframe = '<iframe id="pdf-view" src="data:application/pdf;base64,' . base64_encode($pdfContent) . '" width="100%" height="800px"></iframe>';

		$data['pdfContent'] = $pdfIframe;

		return view('admin/users/ViewForm', $data);
	}

	// View to update a user's form response
	public function updateForm($responseID, $formID = null, $data_only = false)
	{
		//Edit Form Submitted
		if ($this->request->getPost()) {
			$post = $this->request->getPost();
			$html = $this->formBuilder->getAssociatedFormData($responseID);

			try {
				if ($formID === null) {
					$form = $this->formBuilder->getAssociatedFormData($responseID, false);
				} else {
					$form = $this->formBuilder->getForm($formID, false);
				}
				$rules = null;

				// Check if form is active
				if (!model(FormModel::class)->is_active($form['FormID'])) {
					return view('errors/html/error_404', ['message' => 'The form you are trying to submit is currently inactive.']);
				}

				//Get Rules from model
				if (is_null($form['Rules']) || $form['Rules'] === false) {
					$rules = $this->formBuilder->generateRulesFromHTML($html);
				} else {
					$rules = $form['Rules'];
				}
			} catch (\Exception $e) {
				return view('errors/html/error_404', ['message' => $e->getMessage()]);
			}

			$encrpyt = false;
			$validatedData = $this->formBuilder->validateData($post, $rules, $encrpyt);

			if (!$validatedData['success']) {
				// Validation failed, return error view or perform any other actions
				$errorFields = implode(", ", $validatedData['errors']); // Combine all error fields into a comma-separated string
				$errorMessage = "Validation Error for the following fields: " . $errorFields;
				return view('errors/html/error_404', ['message' => $errorMessage]);
			}

			$responseData = $validatedData['data'];

			$uploaded_files = $this->request->getFiles();

			if ($uploaded_files) {
				$file_label = "user_file";
				$allowedMaxSize = 2048; // 2MB maximum file size
				$allowedMimeTypes = ['image/bmp', 'image/jpg', 'image/jpeg', 'image/gif', 'image/png', 'image/webp'];
	
				foreach ($uploaded_files['user_file'] as $index => $current_file) {
					// Validate each uploaded file
					if ($current_file->getError() === UPLOAD_ERR_NO_FILE) {
						break;
					}
					// $uploadErrors = $this->validateUploadedFile($current_file, $allowedMaxSize, $allowedMimeTypes);
					$uploadErrors = $this->formBuilder->validateUploadedFile($current_file, $allowedMaxSize, $allowedMimeTypes);
	
					if (!empty($uploadErrors)) {
						// Return view with the file upload validation errors
						return view('errors/html/error_404', ['message' => "File Upload Error: " . implode(', ', $uploadErrors)]);
					} else {
						// Set folder name (id)
						$folder = sprintf("%d", model(FormResponseModel::class)->get_next_id());
						// Store file on server (id/<filename>)
						$file_path = $current_file->store($folder, $current_file->getRandomName());
						// Set filepath to POST data, if a file is successfully uploaded
						$responseData['user_file'][$index] = $file_path;
					}
				}
			} else {
				$responseData['user_file'] = '';
			}

			$responseData = serialize($responseData);

			$formData = [
				'Response' => $responseData
			];

			$this->formBuilder->submitUpdatedFormData($responseID, $formData);

			$data['title'] = 'Form Update';
			return view('admin/users/update_success', $data);
		} else {
			// Get the form structure for user to update their form data
			try {
				// Fetch form from database
				$form = $this->formBuilder->getForm($formID, false);
				$response = $this->formBuilder->getResponseFormData($responseID);
			} catch (\Exception $e) {
				// Return exception
				return $e->getMessage();
			}
			// Load helper functions in controller
			helper(['form', 'validation_helper', 'filesystem']);

			$data['title'] = 'Edit Form';
			$data['view'] = $form["Structure"];
			$data['response'] = unserialize($response["Response"]);

			$data['view'] = $this->formBuilder->placeFormData($responseID, $data['response'], $data['view']);
			$data['form_name']  = $form['Name'];
			$data['formID']  = $formID;

			return !$data_only ? view('admin/users/EditForm', $data) : $data['view'];
		}
	}

	// Function to delete a user's form response
	public function deleteForm($responseID)
	{
		try {
			// Delete the specified form response
			$this->formBuilder->deleteResponseFormData($responseID);
		} catch (\Exception $e) {
			// Return exception message
			return $e->getMessage();
		}
		// Return success view
		return view('admin/users/delete_success');
	}
}