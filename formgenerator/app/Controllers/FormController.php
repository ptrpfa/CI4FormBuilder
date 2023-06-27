<?php

namespace App\Controllers;
use Exception;

class FormController extends BaseController
{
    private $formBuilder;

    public function __construct()
    {
        // Instantiate the CustomFormBuilder library
        $this->formBuilder = service('CustomFormLibrary');
    }

    public function index()
    {

        // Call the createForm method to generate the form view template
        $formID = 42; // Example formid
        $formViewTemplate = null;

        try{
            $formViewTemplate = $this->formBuilder->getForm($formID);
        }catch(Exception $e){
            $formViewTemplate = $e->getMessage();
        }
        
        $data = [
            'title' => 'Form Fields',
            'FormView'  => $formViewTemplate
        ];

        return view('templates/header', $data)
        . view('index')
        . view('templates/footer');
    }
}