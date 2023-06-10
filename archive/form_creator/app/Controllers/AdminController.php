<?php

namespace App\Controllers;

use App\Libraries\CustomFormBuilder;

class AdminController extends BaseController
{
    public function index()
    {
        return view('create_form_template');
    }

    public function createFormTemplate()
    {
        // Retrieve the form fields data from the request
        $fields = $this->request->getPost('fields');

        // Create an instance of the CustomFormBuilder library
        $formBuilder = new CustomFormBuilder();

        // Save the form template in the database
        $formTemplate = [
            'fields' => $fields // Assuming you want to store the fields as JSON
        ];

        $formid = $formBuilder->saveFormTemplate($formTemplate);

        // Redirect or display a success message
        return view("success2", ['formid' => $formid]);
    }
}
