<?php

namespace App\Controllers;
use App\Models\TableModel;

class UsersDashboard extends BaseController
{
	private $formBuilder;
	private $tableModel;

	public function __construct()
	{
		//Get the library instance
		$this->formBuilder = service('CustomFormLibrary');	
		//Get the Model for the tables
		$this->tableModel = new TableModel();
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

		$tableModel = new TableModel();
		$responses = $tableModel->getResponse();
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
		$table = $this->formBuilder->generate_table($tableTitle, $columnTitles, $data, $type='user', $actions);

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
		$formData = $this->tableModel->getData('Form'); 
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
						$this->formBuilder->new_input('username', '', 'class="form-control" id="name-control" placeholder="Enter your name" required'), 
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

        $data['title'] = 'New User';
		$data['view'] =  $form;
		return view('admin/users/NewUser', $data);
	}

	public function submitForm()
	{
		//when form is submitted will go to here 
		$post = $this->request->getPost(); 
		//var_dump($post); //uncomment this to show the data you received, $post['username'] get the username keyed in at the very top of form
		
		//Call the library to save, match with Hakeem's Data saving model
		/* Fill in this portion  */

        $data['title'] = 'Success';
		return view('admin/users/success', $data);
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
		$formData = $this->tableModel->getData('Form'); 
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
		return view('admin/users/ViewForm', $data);
	}

	public function updateForm($responseID, $formID)
	{
        $data['title'] = 'Edit Form';
		//Fetch data and form send to view 
		return view('admin/users/EditForm', $data);
	}

	public function deleteForm($responseID, $formID)
	{
        //Call lib which call model
		//Check if success or not then return properly
		return view('admin/users/success', $data);
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