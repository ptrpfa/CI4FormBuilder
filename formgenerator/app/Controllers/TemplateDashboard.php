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

			// Set subrow actions
			$subrow_actions = [	
				'Read' => base_url('template/') . $formID,
				'Update' => base_url('template/update/') . $formID,
				'Delete' => base_url('template/delete/'). $formID, 
				'Activate' => base_url('template/activate/'). $formID 
			];

			// Set subrow information
			$subrow = [	
				'Version' => $version, 
				'Description' => $description, 
				'Datetime' => $datetime, 
				'Status' => $status,
				'actions' => $subrow_actions
			];
		
			// Set row information
			$rowData = [
				'id' => $formID,
				'name' => $name,
				'Subrows' => [
					$subrow
				]
			];
		
			// Append row to data array
			$data[] = $rowData;

			// Loop through each data entry
			foreach ($data as $rowData) {
				// Find the row in $data based on the 'id' field
				if ($rowData['id'] === $formID) {
					// Append current subrow to 
					$rowData['Subrows'][] = $subrow;
					break;
				}
			}

		}

		// Set table values
		$tableTitle = 'Web Form Templates';
		$columnTitles = ['Form', 'Version', 'Description', 'Datetime', 'Status'];
		$actions = [									
			'New' => base_url('template/create'),  				// Whole New Form Template
			'DeleteAll' => base_url('template/deleteAll/'), 	// Delete all version of this forms
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
        }
		catch(\Exception $e){
			// Return exception
            return $e->getMessage();
        }
        // Prepare data context
        $data = [
            'title' => $form['Name'],
            'FormView'  => unserialize($form['Structure'])
        ];
		// Return view
        return view('admin/form_template/previewForm', $data);
	}

	// View to create a new form template
	public function createForm($formID = null) {
		// Load helper functions in controller
		helper(['form', 'validation_helper', 'filesystem']);
		// Initialise associative array keys and rules
		$keys = ['form_name', 'form_status', 'form_version', 'form_description', 'form_structure'];
		$db_keys = ['Name', 'Status', 'Version', 'Description', 'Structure'];
		$rules = [
			'form_name' => 'required|max_length[500]|min_length[1]|regex_match[/^[a-zA-Z0-9_ ]+$/]',
			'form_status'  => 'required|max_length[1]|min_length[1]|in_list[0,1]',
			'form_version'  => 'required|max_length[100]|min_length[0]|regex_match[/^[0-9\.]*$/]',
			'form_description'  => 'required|max_length[1000]|min_length[0]|regex_match[/^[a-zA-Z0-9_ !]+$/]',
			'form_structure'  => 'required|min_length[1]',
		];

		// Check request type
		if($this->request->is('post')) {	 
			// Get POST data
			$post = $this->request->getPost($keys);

			// Validate data received
			$validated_data = validate($post, $rules, false);

			// Check if data validation failed
			if(!$validated_data) {
				// Return validation errors
				return view('admin/form_template/createForm', $post);
			}
			else {
				// Map validated data keys to their database equivalent
				$validated_data = array_combine($db_keys, array_values($validated_data));
				try {
					// Create form
					$formID = $this->formBuilder->createFormDump($validated_data);
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
			var_dump(directory_map('../app/Config/FormTemplates', 1));

			// return view('admin/form_template/createForm');
		}
	}

	// View to update a form template
	public function updateForm($formID) {
		null;
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
		return view('admin/success', ['message' => 'Deleted form ' . $formID . '!']);
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
		return view('admin/success', ['message' => 'Deleted all versions of form ' . $formID . '!']);
	}

}
