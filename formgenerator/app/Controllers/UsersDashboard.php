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
		// //Remove username from the array
		// //Call library to validate and sanitize the remaining data 
		// //Call Library to serialize() and encrypt and sent to model to save
		// //Sucess

		$keys = ['name', 'message', 'username', 'gender'];
		// // Add input validation rules
		$rules = [
			'name' => 'required|max_length[500]|min_length[1]|regex_match[/^[a-zA-Z0-9_ ]+$/]',
			'message' => 'required|max_length[500]|min_length[1]|regex_match[/^[a-zA-Z0-9_ ]+$/]',
			'gender' => 'required'
		];

		$post = $this->request->getPost();

		// Retrieve the value of 'username' and 'formid'
		$username = $post['username'] ?? 'default_user';
		$formID = $post['formid'];

		// Remove the 'username' and 'formid' key from the array 
		unset($post['username']);
		unset($post['formid']);
	
		// Validate the input using the custom validate function
		try {
			$encrpyt = false;
			$validatedData = $this->formBuilder->validateData($post, $rules, $encrpyt);
		
			if (!$validatedData) {
				// Validation failed, return error view or perform any other actions
				return view('errors/html/error_404', ['message' => 'Validation error']);
			}
		
			// Proceed with the rest of the code
			// ...
		} catch (\Exception $e) {
			// Log the error or display a user-friendly error message
			log_message('error', 'Form validation failed: ' . $e->getMessage());
			// Handle the exception as needed
			// For example, you can return an error view
			return view('errors/html/error_404', ['message' => 'An error occurred']);
		}
		
		
		// Store the validated encrypted data into the database
		$formID = $formID;
		$user = $username;
		$formData = serialize([
			'name' => $validatedData['name'],
			'message' => $validatedData['message'],
			'gender' => $validatedData['gender']
		]);

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
					1,'md', 9, 'mt-2'
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

		$pdfIframe = $this->formBuilder->export_to_pdf($formData);

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

		$data['view'] = $this->formBuilder->placeFormData($data['response'], $data['view']);
		
		//var_dump($response);

		return view('admin/users/EditForm', $data);
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




//Sample Data style, spoil already dun refer this
// $data = [
// 	[
// 		'name' => 'John Doe',
// 		'id' => 1,
// 		'Subrows' => [
// 			[
// 				'Form Name' => 'Form 1',
// 				'Version' => '1.0',
// 				'Datetime' => '2023-06-25 10:00:00',
// 			],
// 			[
// 				'Form Name' => 'Form 2',
// 				'Version' => '2.1',
// 				'Datetime' => '2023-06-26 15:30:00',
// 			],
// 			// Add more subrows for John Doe
// 		]
// 	],
// 	[
// 		'name' => 'Jane Smith',
// 		'id' => 2,
// 		'Subrows' => [
// 			[
// 				'Form Name' => 'Form 3',
// 				'Version' => '3.2',
// 				'Datetime' => '2023-06-27 09:45:00',
// 			],
// 			[
// 				'Form Name' => 'Form 4',
// 				'Version' => '4.0',
// 				'Datetime' => '2023-06-28 14:15:00',
// 			],
// 			// Add more subrows for Jane Smith
// 		]
// 	],
// 	// Add more users with their subrows
// ];
