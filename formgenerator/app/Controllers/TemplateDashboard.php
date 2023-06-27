<?php

namespace App\Controllers;
use App\Models\TableModel;

class TemplateDashboard extends BaseController
{
	public function index()
	{
		/*** 
			Create the table columns and getting the Data from model
		***/

		$tableTitle = 'Web Form Templates';
		$columnTitles = ['Form Name', 'Version', 'Description', 'Dateitme'];
		/*** 
			Create the Action Button redirection URL  
		***/
		$actions = [
			'New' => 'template/newForm', //Whole New Form Template
			'DeleteAll' => 'template/DeleteForm', //Delete all version of this form
		];

		$tableModel = new TableModel();
		$forms = $tableModel->getData('Form');
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
					'Update' => 'template/updateForm/' . $formID, //Edit Form 
					'Delete' => 'template/deleteForm/'. $formID, //Delete specific form 
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

		// $data = [
		// 	[
		// 		'name' => 'Form 1',
		// 		'id'=> 1,
		// 		'Subrows' => [
		// 			[
		// 				'Version' => '1.0',
		// 				'Description' => 'W3-Form Bulk cargo evasion',
		// 				'Datetime' => '2023-06-26 15:30:00',
		// 			],
		// 			[
		// 				'Version' => '2.0',
		// 				'Description' => 'W3-Form Bulk cargo invasion',
		// 				'Datetime' => '2023-06-30 15:30:00',
		// 			],
		// 			// Add more subrows for John Doe
		// 		]
		// 	],
		// 	[
		// 		'name' => 'Form 2',
		// 		'Subrows' => [
		// 			[
		// 				'Version' => '1.0',
		// 				'Description' => 'My father evade the family',
		// 				'Datetime' => '2023-06-26 15:30:00',
		// 			],
		// 			[
		// 				'Version' => '3.0',
		// 				'Description' => 'i save money for father day',
		// 				'Datetime' => '2023-06-31 15:30:00',
		// 			],
		// 			// Add more subrows for Jane Smith
		// 		]
		// 	],
		// 	// Add more users with their subrows
		// ];

        // Generate the table
		$table = generate_table($tableTitle, $columnTitles, $data, $type='admin', $actions);

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
