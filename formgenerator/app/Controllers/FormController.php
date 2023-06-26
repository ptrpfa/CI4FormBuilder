<?php

namespace App\Controllers;
use Exception;

class FormController extends BaseController
{
    private $formBuilder;

    public function __construct()
    {
        // Instantiate the CustomFormBuilder library
        $this->formBuilder = service('formBuilder2');
    }

    public function index()
    {

        // Call the createForm method to generate the form view template
        $formID = 9; // Example formid
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

    // public function newForm()
    // {
    //     // $fields = [
    //     //     ['label' => 'Name', 'label_class' => 'Name-control', 'type' => 'text', 'type_class' => 'form-control name-control','placeholder' => 'Enter your name', 'required' => true, 'disabled' => false],
    //     //     ['label' => 'Message', 'label_class' => 'Message-control', 'type' => 'textarea', 'type_class' => 'form-control message-control', 'placeholder' => 'Enter your message', 'required' => true, 'disabled' => false],
    //     //     [
    //     //         'label' => 'Sex',
    //     //         'type' => 'checkbox',
    //     //         'label_class' => 'sex-form',
    //     //         'required' => true, 'disabled' => false,
    //     //         'checkboxes' => [
    //     //             [
    //     //                 'name'=> 'male',
    //     //                 'value'=> 'Male',
    //     //                 'label_class' => 'male-label form-check-label',
    //     //                 'type_class' => 'male_control form-check-input'
    //     //             ],
    //     //             [
    //     //                 'name'=> 'female',
    //     //                 'value'=> 'Female',
    //     //                 'label_class' => 'female-label form-check-label',
    //     //                 'type_class' => 'female_control form-check-input'
    //     //             ],
    //     //         ]
    //     //     ]
    //     // ];
        
    //     $fields = [
    //         'name' => [
    //             //new_div($label, $input, $row, $span, $column, $attributes)
    //             'group' => $this->formBuilder->new_div(
    //                 array(
    //                     //new_label($name='', $value='', $attributes='')
    //                     $this->formBuilder->new_label('name', 'Name'), 
    //                     //new_input($name='', $value='', $attributes='' OR $attributes=[])
    //                     $this->formBuilder->new_input('name', '', 'class="form-control" id="name-control" placeholder="Enter your name" required'), 
    //                 ),
    //                 1,'md', 9, 'mt-5'
    //             )        
    //         ],
    //         'message' => [
    //             'group' => $this->formBuilder->new_div(
    //                 array(
    //                     //new_label($name='', $value='', $attributes='')
    //                     $this->formBuilder->new_label('message', 'Message', 'class="message-label-control"'),
    //                     //new_textarea($name='', $value='', $attributes='' OR $attributes=[])
    //                     $this->formBuilder->new_textarea(
    //                         'message', '',
    //                         array('class'=> 'form-control message-control', 'placeholder'=>'Enter you message', 'required'=> true)
    //                     ),
    //                 ),
    //                 2,'md', 9
    //             )
    //         ],
    //         'sex-help' => [
    //             'group' => $this->formBuilder->new_div(
    //                 [
    //                     $this->formBuilder->new_div(
    //                         [
    //                             $this->formBuilder->new_label('sex-help', 'How to sex'),
    //                             $this->formBuilder->new_para_helper('sex-help', 'Key in which sex group you are', 'id="sex-helper"'),
    //                         ],
    //                         '', 'md', 2
    //                     ),
    //                     $this->formBuilder->new_div(
    //                         [
    //                             $this->formBuilder->new_label('gender', 'Choose Gender:'),
    //                             '<br>',
    //                             $this->formBuilder->new_div(
    //                                 [
    //                                     $this->formBuilder->new_radio('gender', 'male', 'id="male" class="form-check-input"'),
    //                                     $this->formBuilder->new_label('male', 'Male', 'class="form-check-label"'),
    //                                 ],
    //                                 '', '', '', 'form-check form-check-inline'
    //                             ),
    //                             $this->formBuilder->new_div(
    //                                 [
    //                                     $this->formBuilder->new_radio('gender', 'female', 'id="female" class="form-check-input"'),
    //                                     $this->formBuilder->new_label('female', 'Female', 'class="form-check-label"'),
    //                                 ],
    //                                 '', '', '', 'form-check form-check-inline'
    //                             ),
    //                         ],
    //                         '', 'md', '5', 'radio-control'
    //                     ),
    //                 ],
    //                 'row'
    //             )
    //         ],
            
    //         // 'sex' => [
    //         //     'group' => $this->formBuilder->new_div(
    //         //         [
    //         //             $this->formBuilder->new_label('gender', 'Choose Gender:'),
    //         //             '<br>',
    //         //             $this->formBuilder->new_div(
    //         //                 [$this->formBuilder->new_radio('gender', 'male', 'id="male" class="form-check-input"'),
    //         //                 $this->formBuilder->new_label('male', 'Male', 'class="form-check-label"')],
    //         //                 '', '', '', 'form-check form-check-inline'
    //         //             ),
    //         //             $this->formBuilder->new_div(
    //         //                 [$this->formBuilder->new_radio('gender', 'female', 'id="female" class="form-check-input"'),
    //         //                 $this->formBuilder->new_label('female', 'Female', 'class="form-check-label"')],
    //         //                 '', '', '', 'form-check form-check-inline'
    //         //             ),
    //         //         ],
    //         //         '', 'md', '5', 'radio-control'
    //         //     )
    //         // ],
            
    //     ];

    //     $data  = [
    //         'Name' => "My KuKuBird Size Chart",
    //         'Structure' => $fields
    //     ];

    //     /*
    //         Possible Parameters for $data , else default
    //         Complusory is 'Structure'!
    //         $data  = [
    //             'Name' => 
    //             'Version' =>
    //             'Datetime' =>
    //             'Description' =>
    //             'Structure' => 
    //         ];
    //     */

    //     //Call the library to insert the form template 
    //     try{
    //         $formID = $this->formBuilder->newFormTemplate($data);

    //         $data = [
    //             'title' => 'Successful Insertion',
    //             'formID'  => $formID
    //         ];

    //         return view('templates/header', $data)
    //         . view('success')
    //         . view('templates/footer');

    //     }catch(Exception $e){
    //         // Show the default CodeIgniter error page with the error message
    //         show_error('An error occurred while inserting the form data. Please try again.');
    //     }
    // }



}