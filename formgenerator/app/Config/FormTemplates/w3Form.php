<?php


// Get an instance of the CustomFormLibrary library
$formBuilder = service('CustomFormLibrary');

$fields = [
    'head' => [
        'group' => $formBuilder->form_open('/users/submit')
    ],
    'name' => [
        //new_div($label, $input, $row, $span, $column, $attributes)
        'group' => $formBuilder->new_div(
            array(
                //new_label($name='', $value='', $attributes='')
                $formBuilder->new_label('name', 'Name'), 
                //new_input($name='', $value='', $attributes='' OR $attributes=[])
                $formBuilder->new_input('name', '', 'class="form-control" id="name-control" placeholder="Enter your name" required'), 
            ),
            1,'md', 9, 'mt-4'
        )        
    ],
    'message' => [
        'group' => $formBuilder->new_div(
            array(
                //new_label($name='', $value='', $attributes='')
                $formBuilder->new_label('message', 'Message', 'class="message-label-control"'),
                //new_textarea($name='', $value='', $attributes='' OR $attributes=[])
                $formBuilder->new_textarea(
                    'message', '',
                    array('class'=> 'form-control message-control', 'placeholder'=>'Enter you message', 'required'=> true)
                ),
            ),
            2,'md', 9
        )
    ],
    'sex-help' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('sex-help', 'How to sex'),
                        $formBuilder->new_html('p', 'Key in which sex group you are', 'id="sex-helper"'),
                    ],
                    '', 'md', 2
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('gender', 'Choose Gender:'),
                        '<br>',
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_radio('gender', 'male', 'id="male" class="form-check-input"'),
                                $formBuilder->new_label('male', 'Male', 'class="form-check-label"'),
                            ],
                            '', '', '', 'form-check form-check-inline'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_radio('gender', 'female', 'id="female" class="form-check-input"'),
                                $formBuilder->new_label('female', 'Female', 'class="form-check-label"'),
                            ],
                            '', '', '', 'form-check form-check-inline'
                        ),
                    ],
                    '', 'md', '5', 'radio-control'
                ),
            ],
            'row'
        )
    ],
    'tail' => [
        'group' => $formBuilder->form_close()
    ],
    
];

return $fields;