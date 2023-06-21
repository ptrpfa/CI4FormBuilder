<?php

namespace App\Controllers;

use App\Libraries\CustomFormBuilder;
use App\Libraries\FormBuilder2;
use Exception;

class FormController extends BaseController
{
    private $formBuilder;

    public function __construct()
    {
        // Instantiate the CustomFormBuilder library
        $this->formBuilder = new CustomFormBuilder();
        $this->form_help_me = new FormBuilder2();
    }

    public function newForm()
    {
        // $fields = [
        //     ['label' => 'Name', 'label_class' => 'Name-control', 'type' => 'text', 'type_class' => 'form-control name-control','placeholder' => 'Enter your name', 'required' => true, 'disabled' => false],
        //     ['label' => 'Message', 'label_class' => 'Message-control', 'type' => 'textarea', 'type_class' => 'form-control message-control', 'placeholder' => 'Enter your message', 'required' => true, 'disabled' => false],
        //     [
        //         'label' => 'Sex',
        //         'type' => 'checkbox',
        //         'label_class' => 'sex-form',
        //         'required' => true, 'disabled' => false,
        //         'checkboxes' => [
        //             [
        //                 'name'=> 'male',
        //                 'value'=> 'Male',
        //                 'label_class' => 'male-label form-check-label',
        //                 'type_class' => 'male_control form-check-input'
        //             ],
        //             [
        //                 'name'=> 'female',
        //                 'value'=> 'Female',
        //                 'label_class' => 'female-label form-check-label',
        //                 'type_class' => 'female_control form-check-input'
        //             ],
        //         ]
        //     ]
        // ];

        $fields = [
            'name' => [
                //new_label($name='', $value='', $attributes='')
                'label' => $this->form_help_me->new_label('name', 'Name'), 
                //new_input($name='', $value='', $attributes='' OR $attributes=[])
                'input' => $this->form_help_me->new_input('name', '', 'class="form-control" id="name-control" placeholder="Enter your name" required') 
            ],
            'message' => [
                //new_label($name='', $value='', $attributes='')
                'label' => $this->form_help_me->new_label('message', 'Message', 'class="message-label-control"'),
                //new_textarea($name='', $value='', $attributes='' OR $attributes=[])
                'input' => $this->form_help_me->new_textarea(
                    'message', '',
                    array('class'=> 'form-control message-control', 'placeholder'=>'Enter you message', 'required'=> true)
                )
            ]
        ];

        $data  = [
            'Name' => "My KuKuBird Size Chart",
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
            $formID = $this->form_help_me->newFormTemplate($data);

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

    public function index()
    {

        // Call the createForm method to generate the form view template
        $formID = 4; // Example formid
        $formViewTemplate = null;

        try{
            $formViewTemplate = $this->form_help_me->getForm($formID);
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