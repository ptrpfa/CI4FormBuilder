<?php

// Get an instance of the CustomFormLibrary library
$formBuilder = service('CustomFormLibrary');

$fields = 
[
    'head' =>  $formBuilder->form_open('/users/submit'),
    'individual' =>
        $formBuilder->new_div(
            [
                'firstname' => $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_input('firstname', '', 'class="form-control"'),
                                $formBuilder->new_label('firstname','Your First name and Middle initial'),
                            ],'','','','form-floating'
                        ),
                    ],'','','','col col-md-5'
                ),
                'lastname' => $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_input('lastname', '', 'class="form-control"'),
                                $formBuilder->new_label('lastname','Last Name'),
                            ],'','','', 'form-floating'
                        ),
                    ],'','','','col col-md-4'
                ),
                'securitynumber' => $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_input('securitynumber', '', 'class="form-control"'),
                                $formBuilder->new_label('securitynumber','Your Social Security Number'),
                            ],'','','', 'form-floating'
                        ),
                    ],'','','','col col-md-3'
                ),
            
            ],'','','', 'row d-flex justify-content-center mx-auto w-75 text-start'  
        )         
    ,
    'seperator' => $formBuilder->new_html('hr','', 'class="mx-auto mt-3"'),
    'spouse' =>
        $formBuilder->new_div(
            [
                'spouse-firstname' => $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_input('spouse-firstname', '', 'class="form-control"'),
                                $formBuilder->new_label('spouse-firstname',"If joint return, spouse's first name and middle initial"),
                            ],'','','','form-floating'
                        ),
                    ],'','','','col col-md-5'
                ),
                'spouse-lastname' => $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_input('spouse-lastname', '', 'class="form-control"'),
                                $formBuilder->new_label('spouse-lastname','Last Name'),
                            ],'','','', 'form-floating'
                        ),
                    ],'','','','col col-md-4'
                ),
                'spouse-securitynumber' => $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_input('spouse-securitynumber', '', 'class="form-control"'),
                                $formBuilder->new_label('spouse-securitynumber',"Spouse's Social Security Number"),
                            ],'','','', 'form-floating'
                        ),
                    ],'','','','col col-md-3'
                ),
            
            ],'','','', 'row d-flex justify-content-center mx-auto w-75 text-start'  
        )         
    ,
    'tail' => $formBuilder->form_close(),
];
return $fields;