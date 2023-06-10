<?php

namespace App\Controllers;

use App\Libraries\CustomFormBuilder;

class FormController extends BaseController
{
    public function index()
    {
        $fields = [
            ['label' => 'Name', 'label_class' => 'Name-control', 'type' => 'text', 'type_class' => 'form-control name-control','placeholder' => 'Enter your name', 'required' => true, 'disabled' => false],
            ['label' => 'Message', 'label_class' => 'Message-control', 'type' => 'textarea', 'type_class' => 'form-control message-control', 'placeholder' => 'Enter your message', 'required' => true, 'disabled' => false],
            [
                'label' => 'Sex',
                'type' => 'checkbox',
                'label_class' => 'sex-form',
                'required' => true, 'disabled' => false,
                'checkboxes' => [
                    [
                        'name'=> 'male',
                        'value'=> 'Male',
                        'label_class' => 'male-label form-check-label',
                        'type_class' => 'male_control form-check-input'
                    ],
                    [
                        'name'=> 'female',
                        'value'=> 'Female',
                        'label_class' => 'female-label form-check-label',
                        'type_class' => 'female_control form-check-input'
                    ],
                ]
            ]
        ];

        //Create the library 
        $FormBuidler = new CustomFormBuilder();

        //Call the library
        $formViewTemplate = $FormBuidler->createFormTemplate($fields);

        $data = [
            'title' => 'Form Fields',
            'FormView'  => $formViewTemplate
        ];

        return view('templates/header', $data)
        . view('index')
        . view('templates/footer');
    }

}