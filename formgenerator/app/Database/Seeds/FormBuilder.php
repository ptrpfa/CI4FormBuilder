<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FormBuilder extends Seeder
{
    public function run()
    {   
        // Instantiate the CustomFormBuilder library
        $formBuilder = service('CustomFormLibrary');

        // Define pre-built form templates
        $form_templates = [
            [
                'Name'    => 'Sample',
                'Version' => '1.0',
                'Description'  => 'Sample Form',
                'Structure' => include(APPPATH . 'Config/FormTemplates/sample.php'),    // Ensure form template file exists
                'Status'   => 1
            ],
            [
                'Name'    => 'W3 Form',
                'Version' => '1.0',
                'Description'  => 'Sample Form',
                'Structure' => include(APPPATH . 'Config/FormTemplates/w3form.php'),    // Ensure form template file exists
                'Status'   => 1
            ],
        ];

        // Loop through each form template and insert into the database
        foreach ($form_templates as $form) {
            // Create form
            $formID = $formBuilder->createForm($form);
            echo 'Added form ' . $formID . '!' . PHP_EOL;
        }
    }
}
