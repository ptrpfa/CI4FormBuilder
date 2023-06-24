<?php

namespace App\Controllers;
use Exception;

class AdminController extends BaseController
{
    public function index()
    {
        //Get the library instance
        $formBuilder = service('CustomFormLibrary');
        //Get the Form Fields
        $fields = include(APPPATH . 'Config/FormTemplates/w3Form.php');
        $data  = [
            'Name' => "Meow Meow Chart",
            'Structure' => $fields
        ];

        /*
            Possible Parameters for $data , else default
            Complusory is 'Structure'!
            $data  = [
                'Name' => 
                'Version' =>
                'Datetime' =>
                'Description' =>
                'Structure' => 
            ];
        */

        //Call the library to insert the form template 
        try{
            $formID = $formBuilder->newFormTemplate($data);

            $data = [
                'title' => 'Successful Insertion',
                'formID'  => $formID
            ];

            return view('templates/header', $data)
            . view('success')
            . view('templates/footer');

        }catch(Exception $e){
            // Show the default CodeIgniter error page with the error message
            show_error('An error occurred while inserting the form data. Please try again.');
        }
    }
}