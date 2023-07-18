<?php

namespace App\Controllers;
use mikehaertl\wkhtmlto\Pdf;

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

	public function index()
	{
		// Sample table data
		$tableTitle = 'User List';
		$columnTitles = ['User', 'Form Name', 'Version', 'Datetime'];
		/*** 
			Create the Action Button redirection URL  
		***/
		$actions = [
			'New' => 'users/newUser', //New User & New Form
		];
		try{
			$responses = $this->formBuilder->getAllData();
		}catch(\Exception $e) {
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
			$actions['Create' ] = 'users/createForm/' . $name; //New Form for current user 

			// Check if the row already exists in $data
			$subrow = [
				'Form Name' => $formName,
				'Version' => $version,
				'Datetime' => $datetime,
				'actions' => [
					'Read' => 'users/' . $responseID . '/readForm/' . $formID , //Read Form 
					'Update' => 'users/' . $responseID . '/updateForm/' . $formID, //Edit Form 
					'Delete' => 'users/' . $responseID . '/deleteForm/'. $formID, //Delete specific form 
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

	//--------------------------------------------------------------------//
	/***
		CRUD PORTION
	***/
	public function newUser()
	{
        // Checks whether the form is requested by ajax call.
		//This gets the form at the bottom of the screen dynamically
        if ($this->request->is('post')) {
			
			$post = $this->request->getPost(); 
			$formID = $post['formID'];
			$formData = $this->formBuilder->getForm($formID); //Call the library to call the model to get the form

			$response = [
				'status' => 'success',
				'form' => $formData, 
			];
			
			// Return the JSON-encoded response
			return $this->response->setJSON($response);
        }
		
		//Get all the data, currently library's model does not support to get all. Can add if you want
		$formData = $this->formBuilder->getForm(null, false);

		$options = [];
		foreach ($formData as $form) {
			$options[$form['FormID']] = $form['Name'];
		}
		//Using our library to create a input to create a text input for username 
		//and a select type html tag
		$form = [
			'username' => 
				//new_div($label, $input, $row, $span, $column, $attributes)
				$this->formBuilder->new_div(
					array(
						//new_label($name='', $value='', $attributes='')
						$this->formBuilder->new_label('username', 'User Name'), 
						//new_input($name='', $value='', $attributes='' OR $attributes=[])
						$this->formBuilder->new_input('username', '', 'class="form-control" id="name-control" placeholder="Enter your name" required'), 
					),
					1,'md', 9, 'mt-2'
				)        
			,
			'dropdown' => 
				 $this->formBuilder->new_div(
					array(
						$this->formBuilder->new_dropdown('form-names',  $options, '', 'class="form-control" id="formSelector"')
					),
					2,'md', 9
				)
			,
		];

        $data['title'] = 'New User';
		$data['view'] =  $form;
		return view('admin/users/NewUser', $data);
	}

	public function submitForm()
	{
		$post = $this->request->getPost();
	
		// Retrieve the value of 'username' and 'formid'
		$username = $post['username'] ?? 'default_user';
		$formID = $post['formid'];
	
		// Remove the 'username' and 'formid' key from the array 
		unset($post['username']);
		unset($post['formid']);
	
		// extract keys from $post output 
		$keys = array_keys($post);
		$html = $this->formBuilder->getForm($formID);
		try{
			$rules = $this->formBuilder->generateRulesFromHTML($html);
		} catch (\Exception $e){
			return view('errors/html/error_404', ['message' => $e->getMessage()]);
		}
		
		// Validate the input using the custom validate function
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
	

	public function createForm($name=null)
	{
		// Checks whether the form is requested by ajax call.
		//This gets the form at the bottom of the screen dynamically
        if ($this->request->is('post')) {
			
			$post = $this->request->getPost(); 
			$formID = $post['formID'];
			$formData = $this->formBuilder->getForm($formID); //Call the library to call the model to get the form

			$response = [
				'status' => 'success',
				'form' => $formData, 
			];
			
			// Return the JSON-encoded response
			return $this->response->setJSON($response);
        }

		//Get all the data, currently library's model does not support to get all. Can add if you want
		$formData = $this->formBuilder->getForm(null, false);
		$options = [];
		foreach ($formData as $form) {
			$options[$form['FormID']] = $form['Name'];
		}
		//Using our library to create a input to create a text input for username 
		//and a select type html tag
		$form = [
			'username' => [
				//new_div($label, $input, $row, $span, $column, $attributes)
				'group' => $this->formBuilder->new_div(
					array(
						//new_label($name='', $value='', $attributes='')
						$this->formBuilder->new_label('username', 'User Name'), 
						//new_input($name='', $value='', $attributes='' OR $attributes=[])
						$this->formBuilder->new_input('username', $name, 'class="form-control" id="name-control" placeholder="Enter your name" disabled'), 
					),
					1,'md', 9, 'mt-5'
				)        
			],
			'dropdown' => [
				'group' => $this->formBuilder->new_div(
					array(
						$this->formBuilder->new_dropdown('form-names',  $options, '', 'class="form-control" id="formSelector"')
					),
					2,'md', 9
				)
			],
		];

		$data['title'] = 'New Form';
		$data['view'] =  $form;
		return view('admin/users/NewForm', $data);
	}

	public function readForm($responseID, $formID)
	{
        $data['title'] = 'View Form';
		//Fetch data and form send to view
		//form tag goes below
		$formData = '			  
		<div class="row d-flex justify-content-center mx-auto w-75 text-start">
		<div class="col col-md-4">
		  <div class="form-floating">
			<input type="text" class="form-control form-control-sm" id="floatingInput1" placeholder="hello" value="meow">
			<label for="floatingInput1">Your First name and Middle initial</label>
		  </div>
		</div>
		<div class="col col-md-4">
		  <div class="form-floating">
			<input type="text" class="form-control form-control-sm" id="floatingInput2">
			<label for="floatingInput2">Last Name</label>
		  </div>
		</div>
		<div class="col col-md-4">
		  <div class="form-floating">
			<input type="text" class="form-control form-control-sm" id="floatingInput3">
			<label for="floatingInput3">Your Social Security Number</label>
		  </div>
		</div>
	  </div>
	  <hr class="mx-auto mt-3">
	  ';

		$pdfContent = $this->formBuilder->export_to_pdf($formData);

		$pdfIframe = '<iframe id="pdf-view" src="data:application/pdf;base64,' . base64_encode($pdfContent) . '" width="100%" height="600px"></iframe>';

        $data['pdfContent'] = $pdfIframe;	

		return view('admin/users/ViewForm', $data);
	}

	public function updateForm($responseID, $formID)
	{
		try {
			// Fetch form from database
			$form = $this->formBuilder->getForm($formID, false);
			$response = $this->formBuilder->getResponseFormData($responseID);
		} catch(\Exception $e) {
			// Return exception
			return $e->getMessage();
		}
		// Load helper functions in controller
		helper(['form', 'validation_helper', 'filesystem']);

		$data['title'] = 'Edit Form';
		$data['view'] = unserialize($form["Structure"]);
		$data['response'] = unserialize($response["Response"]);

		$data['view'] = $this->formBuilder->placeFormData($responseID, $data['response'], $data['view']);

		return view('admin/users/EditForm', $data);
	}

	public function submitUpdatedForm($responseID){

		$post = $this->request->getPost();

		$html = $this->formBuilder->getAssociatedFormStructure($responseID);

		$rules = $this->formBuilder->generateRulesFromHTML($html);

		// Validate the input using the custom validate function
		// try {
		// 	$encrpyt = false;
		// 	$validatedData = $this->formBuilder->validateData($post, $rules, $encrpyt);
		// 	if (!$validatedData['success']) {
		// 		// Validation failed, return error view or perform any other actions
		// 		return view('errors/html/error_404', ['message' => 'Validation error']);
		// 	}
		// } catch (\Exception $e) {
		// 	// Validation failed, return error view or perform any other actions
		// 	$errorFields = implode(", ", $validatedData['errors']); // Combine all error fields into a comma-separated string
		// 	$errorMessage = "Validation Error for the following fields: " . $errorFields;
		// 	return view('errors/html/error_404', ['message' => $errorMessage]);
		// }

		$encrpyt = false;
		$validatedData = $this->formBuilder->validateData($post, $rules, $encrpyt);

		if (!$validatedData['success']) {
			// Validation failed, return error view or perform any other actions
			$errorFields = implode(", ", $validatedData['errors']); // Combine all error fields into a comma-separated string
			$errorMessage = "Validation Error for the following fields: " . $errorFields;
			return view('errors/html/error_404', ['message' => $errorMessage]);
		}

		$responseData = serialize($post);

		$formData = [
			'Response' => $responseData
		];

		$this->formBuilder->submitUpdatedFormData($responseID, $formData);

		$data['title'] = 'Form Update';
		return view('admin/users/update_success', $data);
	}

	public function deleteForm($responseID) {
		try {
			// Delete the specified form response
			$this->formBuilder->deleteResponseFormData($responseID);
		}
		catch(\Exception $e) {
			// Return exception message
			return $e->getMessage();
		}
		// Return success view
		return view('admin/users/delete_success');
	}
	
}





