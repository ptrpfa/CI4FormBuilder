<?php

namespace App\Controllers;

class TemplateDashboard extends BaseController
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
		// Initialise view's context data
		$data = [];

		try {
			// Get all form template data
			$forms = $this->formBuilder->getForm(null, false);
		}
		catch(\Exception $e) {
			// Return exception
			return $e->getMessage();
		}

		// Loop through each form
		foreach ($forms as $form) 
		{
			// Get form fields
			$formID = $form['FormID'];
			$name = $form['Name'];
			$version = $form['Version'];
			$datetime = $form['Datetime'];
			$description = $form['Description'];
			$status = $form['Status'] ? 'Active' : 'Inactive';
			$deactivate_at = $form['deletedAt'] ? $form['deletedAt'] : '-';

			// Set subrow information
			$subrow = [	
				'Version' => $version, 
				'Description' => $description, 
				'Datetime' => $datetime, 
				'Status' => $status,
				'Deactivate At' => $deactivate_at, 
				'actions' => [	
					'Read' => base_url('template/') . $formID,
					'Update' => base_url('template/update/') . $formID,
					'Deactivate' => base_url('template/delete/'). $formID, 
					'Activate' => base_url('template/activate/'). $formID 
				]
			];
		
			$foundMatch = false;
			// Find the row in $data based on the 'id' field
			foreach ($data as  &$rowData) {
				if ($rowData['name'] == $name) {
					$rowData['Subrows'][] = $subrow;
					$foundMatch = true;
					unset($rowData);
					break;
				}
			}
			
			if (!$foundMatch) {
				$data[] = [
					'id' => $formID,
					'name' => $name,
					'Subrows' => [
						$subrow
					]
				];
			}

		}

		// Set table values
		$tableTitle = 'Web Form Templates';
		$columnTitles = ['Form', 'Version', 'Description', 'Datetime', 'Status', 'Deactivated At'];
		$actions = [									
			'New' => base_url('template/create'),  					// Whole New Form Template
			'DeactivateAll' => base_url('template/deleteAll/'), 	// Delete all version of this forms
		];

        // Generate the table
		$table = create_dashboard_table($tableTitle, $columnTitles, $data, 'admin', $actions);

		// Prepare data context
        $data['title'] = 'Form Templates';
		$data['table'] =  $table;

		// Return view
		return view('admin/dashboard', $data);
	}

	// View to get a particular form template
	public function readForm($formID) {
        try {
			// Fetch form from database
			$form = $this->formBuilder->getForm($formID, false);	
			$pdfContent = $this->formBuilder->export_to_pdf($form['Structure']);

			$pdfIframe = '<iframe id="pdf-view" src="data:application/pdf;base64,' . base64_encode($pdfContent) . '" width="100%" height="700px"></iframe>';
        }
		catch(\Exception $e){
			// Return exception
            return $e->getMessage();
        }
        // Prepare data context
        $data = [
            'title' => $form['Name'],
            'FormView'  => $pdfIframe
			// 'FormView'  => unserialize($form['Structure'])
        ];
		// Return view
        return view('admin/form_template/previewForm', $data);
	}

	// View to create a new form template
	public function createForm($formID = null) {
		// Load helper functions in controller
		helper(['form', 'validation_helper', 'filesystem']);
		// Initialise associative array keys and rules
		$keys = ['form_name', 'form_status', 'form_version', 'form_description', 'form_structure', 'form_template'];
		$db_keys = ['Name', 'Status', 'Version', 'Description', 'Structure'];
		$rules = [
			'form_name' => 'required|max_length[500]|min_length[1]|regex_match[/^[a-zA-Z0-9_ ]+$/]',
			'form_status'  => 'required|max_length[1]|min_length[1]|in_list[0,1]',
			'form_version'  => 'required|max_length[100]|min_length[0]|regex_match[/^[0-9\.]*$/]',
			'form_description'  => 'required|max_length[1000]|min_length[0]|regex_match[/^[a-zA-Z0-9_ !]+$/]'
		];
		// Boolean flag to determine if a predefined form template is used
		$use_template = false;
		// Get form template files
		$form_templates = directory_map('../app/Config/FormTemplates', 1);
		// Check request type
		if($this->request->is('post')) {	 
			// Get POST data
			$post = $this->request->getPost($keys);
			// Check type of form structure provided
			if($post['form_template'] == null) {
				// Remove form_template key-value pair
				unset($post['form_template']);
			}
			else {
				// Remove form_structure key-value pair
				unset($post['form_structure']);
				$use_template = true;
			}

			// Validate data received
			$validated_data = validate($post, $rules, false);

			// Check if data validation failed
			if(!$validated_data['success']) {
				// Append form template files to context data
				$post['form_templates'] = $form_templates;
				// Return validation errors
				return view('admin/form_template/createForm', $post);
			}
			else {
				// Map validated data keys to their database equivalent
				$validated_data = array_combine($db_keys, array_values($validated_data['data']));
				try {
					// Check type of form structure used (HTML dump or predefined file template)
					if($use_template) {
						// Load form structure
						include(APPPATH . 'Config/FormTemplates/' . $validated_data['Structure']);
						$validated_data['Structure'] = $fields;
						$includedVars = get_defined_vars();
						if (isset($includedVars['Rules'])) {
							$validated_data['Rules'] = $includedVars['Rules'];
						}
						// Create form
						$formID = $this->formBuilder->createForm($validated_data);
					}
					else {
						// Create form from HTML dump provided
						$formID = $this->formBuilder->createFormDump($validated_data);
					}
				}
				catch(\Exception $e) {
					// Return exception
					return $e->getMessage();
				}
				// Return view
				return view('admin/success', ['message' => 'Created new form ' . $formID . '!']);
			}
		}
		else { 
			// GET request
			return view('admin/form_template/createForm', ['form_templates' => $form_templates]);
		}
	}

	// View to update a form template
	public function updateForm($formID) {
		try {
			// Fetch form from database
			$form = $this->formBuilder->getForm($formID, false);
        }
		catch(\Exception $e){
			// Return exception
            return $e->getMessage();
        }
		// Load helper functions in controller
		helper(['form', 'validation_helper', 'filesystem']);
		// Initialise associative array keys and rules
		$keys = ['form_id', 'form_name', 'form_status', 'form_version', 'form_description', 'form_structure', 'form_template'];
		$db_keys = ['FormID', 'Name', 'Status', 'Version', 'Description', 'Structure'];
		$rules = [
			'form_id'  => 'required|max_length[100]|min_length[1]|regex_match[/^[0-9]+$/]',
			'form_name' => 'required|max_length[500]|min_length[1]|regex_match[/^[a-zA-Z0-9_ ]+$/]',
			'form_status'  => 'required|max_length[1]|min_length[1]|in_list[0,1]',
			'form_version'  => 'required|max_length[100]|min_length[0]|regex_match[/^[0-9\.]*$/]',
			'form_description'  => 'required|max_length[1000]|min_length[0]|regex_match[/^[a-zA-Z0-9_ !]+$/]'
		];
		// Boolean flag to determine if a predefined form template is used
		$use_template = false;
		// Get form template files
		$form['form_templates'] = directory_map('../app/Config/FormTemplates', 1);
		// Check request type
		if($this->request->is('post')) {	 
			// Get POST data
			$post = $this->request->getPost($keys);
			// Check type of form structure provided
			if($post['form_template'] == null) {
				// Remove form_template key-value pair
				unset($post['form_template']);
				$post['form_structure'] = htmlspecialchars_decode($post['form_structure']);
			}
			else {
				// Remove form_structure key-value pair
				unset($post['form_structure']);
				$use_template = true;
			}

			// Validate data received
			$validated_data = validate($post, $rules, false);

			// Check if data validation failed
			if(!$validated_data['success']) {
				// Combine form and post arrays
				$form = array_merge($form, $post);
				// Return validation errors
				return view('admin/form_template/updateForm', $form);
			}
			else {
				// Map validated data keys to their database equivalent
				$validated_data = array_combine($db_keys, array_values($validated_data['data']));
				try {
					// Check type of form structure used (HTML dump or predefined file template)
					if($use_template) {
						// Load form structure
						include(APPPATH . 'Config/FormTemplates/' . $validated_data['Structure']);
						$validated_data['Structure'] = $fields;
						$includedVars = get_defined_vars();
						if (isset($includedVars['Rules'])) {
							$validated_data['Rules'] = $includedVars['Rules'];
						}
						// Update form
						$this->formBuilder->updateForm($validated_data);
					}
					else {
						// Update form from HTML dump provided
						$this->formBuilder->updateFormDump($validated_data);
					}
				}
				catch(\Exception $e) {
					// Return exception
					return $e->getMessage();
				}
				// Return view
				return view('admin/success', ['message' => 'Updated form ' . $formID . '!']);
			}
		}
		else { 
			// GET request
			return view('admin/form_template/updateForm', $form);
		}
	}

	// View to delete a form template (set status to inactive)
	public function deleteForm($formID) {
		try {
			// Delete the specified form template
			$this->formBuilder->deleteForm($formID);
		}
		catch(\Exception $e) {
			// Return exception
			return $e->getMessage();
		}
		// Return view
		return view('admin/success', ['message' => 'Deactivated form ' . $formID . '!']);
	}

	// View to activate a form template (set status to active)
	public function activateForm($formID) {
		try {
			// Activate the specified form template
			$this->formBuilder->activateForm($formID);
		}
		catch(\Exception $e) {
			// Return exception
			return $e->getMessage();
		}
		// Return view
		return view('admin/success', ['message' => 'Activated form ' . $formID . '!']);
	}

	// View to delete all versions of a specified form template (set status to inactive)
	public function deleteAllForm($formID) {
		try {
			// Delete all versions of the specified form template
			$this->formBuilder->deleteAllForm($formID);
		}
		catch(\Exception $e) {
			// Return exception
			return $e->getMessage();
		}
		// Return view
		return view('admin/success', ['message' => 'Deactivated all versions of form ' . $formID . '!']);
	}


	public function getFormHTML()
	{
		if ($this->request->is('get')) {
			//Get File name from ajax call
			$filename = $this->request->getVar('filename');
			
			//Pass file name to library to get form html dump
			include(APPPATH . 'Config/FormTemplates/' . $filename);

			$formhtml = $this->formBuilder->getFormHTML($fields);
			
			$response = [
				'status' => 'success',
				'data' => $formhtml, // Replace with the actual form data
			];
		
			return $this->response->setJSON($response);
		}
	}	

	public function printFormHTML()
	{
		if ($this->request->is('get')) {
			//Get File name from ajax call
			$form = $this->request->getVar('form');

			$pdfContent = $this->formBuilder->export_to_pdf($form);

			$response = [
				'status' => 'success',
				'pdfContent' => base64_encode($pdfContent), // Replace with the actual form data
			];
		
			return $this->response->setJSON($response);

		}
	}
}
