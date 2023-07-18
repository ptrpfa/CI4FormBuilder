<?php

namespace App\Controllers;
use Exception;

class Sample extends BaseController
{
    public function index()
    {
        //Get the library instance
        $formBuilder = service('CustomFormLibrary');
        //Get the Form Fields
        // $fields = include(APPPATH . 'Config/FormTemplates/sample.php');
        $fields = include(APPPATH . 'Config/FormTemplates/f1040sa.php');


        $data  = [
            'Name' => "f1040",
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
            $form = $formBuilder->test($data);
            
            $data = [
                'title' => 'Successful Insertion',
                'FormView'  => $form
            ];

            return view('templates/header', $data)
            . view('index')
            . view('templates/footer');

        }catch(Exception $e){
            // Show the default CodeIgniter error page with the error message
            throw new Exception('An error occurred. ' . $e->getMessage());
        }
    }
}
