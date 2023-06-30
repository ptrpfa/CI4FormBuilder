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

		// Get all form template data
		$forms = $this->formBuilder->getForm(null, false);

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
			'New' => base_url('template/create'),  		// Whole New Form Template
			// 'DeleteAll' => base_url('template/deleteForm/'), 	// Delete all version of this forms
		];

        // Generate the table
		$table = create_dashboard_table($tableTitle, $columnTitles, $data, 'admin', $actions);

        $data['title'] = 'Form Templates';
		$data['table'] =  $table;
		return view('admin/dashboard', $data);
	}

	// View to get a particular form template
	public function readForm($formID) {
		
		// Fetch form data
		$form = $this->formBuilder->getForm($formID, false);
		
	}

	// View to create a new form template
	public function createForm($formID = null) {

		null;
	}

	// View to update a form template
	public function updateForm($formID) {
		null;
	}

	// View to delete a form template
	public function deleteForm($formID) {
		null;
	}

	// View to delete all versions of a specified form template
	public function deleteAllForm($formID) {
		$all = null;
	}


	//--------------------------------------------------------------------
	// public function newData()
	// {
	// 	$data['title'] = 'Meow Templates';
	// 	$data['table'] =  '';
	// 	return view('admin/dashboard', $data);
	// }
}
