<?php

namespace App\Controllers;
use App\Models\TableModel;

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
	
	public function index()
	{

		// Set table values
		$tableTitle = 'Web Form Templates';
		$columnTitles = ['Form', 'Version', 'Description', 'Datetime'];
		$actions = [									// Create the Action Button redirection URL  
			'New' => base_url('template/create_form'),  		// Whole New Form Template
			'DeleteAll' => base_url('template/delete_form'), 	// Delete all version of this forms
		];

		$forms = (new TableModel())->getData('Form');
		$data = [];

		foreach ($forms as $form) {
			// Access the fields of each row
			$formID = $form['FormID'];
			$name = $form['Name'];
			$version = $form['Version'];
			$datetime = $form['Datetime'];
			$description = $form['Description'];
			$actions['Create' ] = 'template/createForm/' . $name; //New version of this template

			// Check if the row already exists in $data
			$subrow = [
				'Version' => $version,
				'Description' => $description,
				'Datetime' => $datetime,
				'actions' => [
					'Read' => 'template/readForm/' . $formID , //Read Form 
					'Update' => 'template/update_form/' . $formID, //Edit Form 
					'Delete' => 'template/delete_form/'. $formID, //Delete specific form 
				]
			];
		
			// Find the row in $data based on the 'id' field
			foreach ($data as $rowData) {
				if ($rowData['id'] === $formID) {
					$rowData['Subrows'][] = $subrow;
					break;
				}
			}

			$rowData = [
				'name' => $name,
				'id' => $formID,
				'Subrows' => [
					$subrow
				]
			];
		
			// Merge the new row with the existing data
			$data[] = $rowData;
		}

        // Generate the table
		$table = $this->formBuilder->generate_table($tableTitle, $columnTitles, $data, $type='admin', $actions);

        $data['title'] = 'Form Templates';
		$data['table'] =  $table;
		return view('admin/dashboard', $data);
	}

	//--------------------------------------------------------------------
	public function newData()
	{
		$data['title'] = 'Meow Templates';
		$data['table'] =  '';
		return view('admin/dashboard', $data);
	}
}
