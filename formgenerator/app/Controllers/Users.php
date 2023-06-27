<?php

namespace App\Controllers;
use App\Models\TableModel;

class Users extends BaseController
{
	public function index()
	{
		// Sample table data
		$tableTitle = 'User List';
		$columnTitles = ['User', 'Form Name', 'Version', 'Datetime'];
		$tableModel = new TableModel();
		$responses = $tableModel->getResponse();
		$data = [];

		foreach ($responses as $response) {
			// Access the fields of each row
			$responseID = $response['ResponseID'];
			$datetime = $response['Datetime']; //user datetime not form datetime
			$formName = $response['Name'];
			$version = $reponse['Version'];
			$name = $reponse['User'];

			// Check if the row already exists in $data
			$subrow = [
				'Form Name' => $formName,
				'Version' => $version,
				'Datetime' => $datetime,
			];
		
			// Find the row in $data based on the 'id' field
			foreach ($data as $rowData) {
				if ($rowData['id'] === $responseID) {
					$rowData['Subrows'][] = $subrow;
					break;
				}
			}

			$rowData = [
				'name' => $name,
				'id' => $responseID,
				'Subrows' => [
					$subrow
				]
			];
		
			// Merge the new row with the existing data
			$data[] = $rowData;
		}
		$data = [
			[
				'name' => 'John Doe',
				'id' => 2,
				'Subrows' => [
					[
						'Form Name' => 'Form 1',
						'Version' => '1.0',
						'Datetime' => '2023-06-25 10:00:00',
					],
					[
						'Form Name' => 'Form 2',
						'Version' => '2.1',
						'Datetime' => '2023-06-26 15:30:00',
					],
					// Add more subrows for John Doe
				]
			],
			[
				'name' => 'Jane Smith',
				'id' => 2,
				'Subrows' => [
					[
						'Form Name' => 'Form 3',
						'Version' => '3.2',
						'Datetime' => '2023-06-27 09:45:00',
					],
					[
						'Form Name' => 'Form 4',
						'Version' => '4.0',
						'Datetime' => '2023-06-28 14:15:00',
					],
					// Add more subrows for Jane Smith
				]
			],
			// Add more users with their subrows
		];

        // Generate the table
		$table = generate_table($tableTitle, $columnTitles, $data, $type='user');

        $data['title'] = 'Users';
		$data['table'] =  $table;
		return view('admin/users/table', $data);
	}

	//--------------------------------------------------------------------

}
