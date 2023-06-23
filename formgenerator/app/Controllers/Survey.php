<?php

namespace App\Controllers;

use App\Libraries\CustomFormBuilder;
use App\Libraries\FormBuilder2;
use Exception;

class Survey extends BaseController
{
    private $formBuilder;

    public function __construct()
    {
        $this->formBuilder = new CustomFormBuilder();
        $this->form_help_me = new FormBuilder2();
    }
    
    public function new()
    {
        $fields = [
            'name' => [
                //new_div($label, $input, $row, $span, $column, $attributes)
                'group' => $this->form_help_me->new_div(
                    array(
                        //new_label($name='', $value='', $attributes='')
                        $this->form_help_me->new_label('name', 'name'), 
                        //new_input($name='', $value='', $attributes='' OR $attributes=[])
                        $this->form_help_me->new_input('name', '', 'class="form-control" id="name-control" placeholder="Enter your name" required'), 
                    ),
                    1,'md', 9, 'mt-5'
                )        
            ],
            'message' => [
                'group' => $this->form_help_me->new_div(
                    array(
                        //new_label($name='', $value='', $attributes='')
                        $this->form_help_me->new_label('message', 'message', 'class="message-label-control"'),
                        //new_textarea($name='', $value='', $attributes='' OR $attributes=[])
                        $this->form_help_me->new_textarea('message', '',array('class'=> 'form-control message-control', 'placeholder'=>'Enter you message', 'required'=> true)),
                    ),
                    2,'md', 9
                )
            ],
        ];

        $data  = [
            'Name' => "Survey",
            'Structure' => $fields
        ];

        try{
            $formID = $this->formBuilder->newFormTemplate($data);

            $data = [
                'title' => 'Successful Insertion',
                'formID'  => $formID
            ];

            return view('templates/header', $data)
            . view('success')
            . view('templates/footer');

        }catch(Exception $e){
            show_error('An error occurred while inserting the form data. Please try again.');
        }

    }

    public function index()
    {

    }

}
