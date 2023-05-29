<?php

namespace App\Controllers;

use App\Libraries\CustomFormBuilder;

class FormController extends BaseController
{
    public function index()
    {
        // Create an instance of the CustomFormBuilder library
        $formBuilder = new CustomFormBuilder();

        // Call the createForm method to generate the form view template
        $formid = 1; // Example formid
        $formViewTemplate = $formBuilder->createForm($formid);

        // Pass the form view template to the view file for rendering
        return view('form_view', ['form' => $formViewTemplate]);
    }

    public function submitForm()
    {
        // Create an instance of the CustomFormBuilder library
        $formBuilder = new CustomFormBuilder();

        // Retrieve the submitted form data
        $data = $this->request->getPost();

        // Store the form data in the database
        $userid = 3; // Example userid
        $formid = 1; // Example formid
        $formBuilder->storeFormData($data, $userid, $formid);

        // Redirect or display a success message
        return view("success");
    }
}
