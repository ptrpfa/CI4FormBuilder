<?php


// Get an instance of the FormBuilder2 library
$formBuilder = service('formBuilder2');

$fields = 
[
    //array below is test test ah
    'firstname' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_label('Your First name and Middle initial', 'floatingInput'),
                $formBuilder->new_input('name', '', 'class="form-control form-control-sm" id="floatingInput" placeholder="Your First name and Middle initial"'),
            ],
            1, 'md', 4
        ),
    ],

    // The actual form kinda starts here
    // Maritial Status / Filing Status
    'filing_status' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('<h5>Filing Status</h5>'),
                            ],
                            'col-md-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_paragraph('Check only one box.'),
                            ],
                            'row'
                        ),
                    ],
                    'col col-auto align-items-start mx-1'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_checkbox('filing_status', 'Single', 'flexCheckDefault'),
                        $formBuilder->new_checkbox('filing_status', 'Married filing jointly', 'flexCheckDefault'),
                        $formBuilder->new_checkbox('filing_status', 'Married filing separately (MFS)', 'flexCheckDefault'),
                        $formBuilder->new_checkbox('filing_status', 'Head of Household (HOH)', 'flexCheckDefault'),
                        $formBuilder->new_checkbox('filing_status', 'Qualifying surviving spouse (QSS)', 'flexCheckDefault')
                    ],
                    'col col-md-8'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_paragraph("If you checked the MFS box, enter the name of uyour spouse. If you checked the HOH or QSS box, enter the child's name if the qualifying person is a child but not your dependent:"),
                        $formBuilder->new_input('name','','class="form-control form-control-sm w-75" type="text" aria-label="child name"')
                    ],
                    'row w-auto'
                ),
                $formBuilder->new_html('<hr class="mx-auto mt-3">') // hr line
            ],
            'row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // First name and middle initial, Last name, Social Security Number
    'name' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('first_name', '', 'class="form-control form-control-sm" id="floatingInput" placeholder="Your First name and Middle initial"'),
                                        $formBuilder->new_label('floatingInput', 'Your First name and Middle initial'),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col col-md-4'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('last_name', '', 'class="form-control form-control-sm" id="floatingInput" placeholder="Last Name"'),
                                        $formBuilder->new_label('floatingInput', 'Last Name'),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col col-md-4'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('ssn', '', 'class="form-control form-control-sm" id="floatingInput" placeholder="Your Social Security Number"'),
                                        $formBuilder->new_label('floatingInput', 'Your Social Security Number'),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col col-md-4'
                        ),
                    ],
                    'row d-flex justify-content-center mx-auto w-75 text-start'
                ),
                $formBuilder->new_html('<hr class="mx-auto mt-3">'),
            ]
        ),
    ],
    // Spouse First name, last name etc.
    'spouse' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('<div class="form-text">If Joint Return:</div>'),
                    ],
                    'row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('spouse_first_name', '', 'class="form-control form-control-sm" id="floatingInput" placeholder="Spouse\'s First name and Middle initial"'),
                                        $formBuilder->new_label('floatingInput', 'Spouse\'s First name and Middle initial'),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col col-md-4'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('spouse_last_name', '', 'class="form-control form-control-sm" id="floatingInput" placeholder="Last Name"'),
                                        $formBuilder->new_label('floatingInput', 'Last Name'),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col col-md-4'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('spouse_ssn', '', 'class="form-control form-control-sm" id="floatingInput" placeholder="Spouse\'s Social Security Number"'),
                                        $formBuilder->new_label('floatingInput', 'Spouse\'s Social Security Number'),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col col-md-4'
                        ),
                    ],
                    'row d-flex justify-content-center mx-auto w-75 text-start'
                ),
                $formBuilder->new_html('<hr class="mx-auto mt-3">'),
            ]
        ),
    ],
    // Home Address
    'address' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('home_address', '', 'class="form-control form-control-sm" id="floatingInput" placeholder="Home address"'),
                                        $formBuilder->new_label('floatingInput', 'Home address (number and street). If you have a P.O. box, see instructions.'),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col-md-10'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('apt_no', '', 'class="form-control form-control-sm" id="floatingInputApt" placeholder="apt no"'),
                                        $formBuilder->new_label('floatingInputApt', 'Apt no.'),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col-md-2'
                        ),
                    ],
                    'row'
                ),
                $formBuilder->new_html('<hr class="mt-3">'),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('city', '', 'class="form-control form-control-sm" id="floatingInput" placeholder="city"'),
                                        $formBuilder->new_label('floatingInput', 'City, town, or post office.'),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col-md-8'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('state', '', 'class="form-control form-control-sm" id="floatingInputApt" placeholder="state"'),
                                        $formBuilder->new_label('floatingInputApt', 'State'),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col-md-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('zip', '', 'class="form-control form-control-sm" id="floatingInputApt" placeholder="zip"'),
                                        $formBuilder->new_label('floatingInputApt', 'ZIP Code'),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col-md-2'
                        ),
                    ],
                    'row'
                ),
                $formBuilder->new_html('<hr class="mt-3">'),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('<div class="form-text">If you have a foreign address, also complete spaces below:</div>'),
                    ],
                    'row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('foreign_country', '', 'class="form-control form-control-sm" id="floatingInput" placeholder="foreign country"'),
                                        $formBuilder->new_label('floatingInput', 'Foreign Country Name'),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col-md-5'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('foreign_province', '', 'class="form-control form-control-sm" id="floatingInputApt" placeholder="Foreign province/state/county"'),
                                        $formBuilder->new_label('floatingInputApt', 'Foreign province/state/county'),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col-md-4'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('foreign_postal_code', '', 'class="form-control form-control-sm" id="floatingInputApt" placeholder="Foreign postal code"'),
                                        $formBuilder->new_label('floatingInputApt', 'Foreign postal code'),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col-md-3'
                        ),
                    ],
                    'row'
                ),
            ],
            'col-md-9'
        ),
    ],
    'presidential_campaign' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_html('<h6 class="card-title">Presidential Election Campaign</h6>'),
                                        $formBuilder->new_html('<p class="card-text">Check here if you, or your filing jointly, want $3 to go to this fund. Checking a box below will not change your tax or refund.</p>'),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_div(
                                                    [
                                                        $formBuilder->new_input('you', '', 'class="form-check-input" value="" id="you"'),
                                                        $formBuilder->new_label('you', 'You', 'form-check-label'),
                                                    ],
                                                    'form-check form-check-inline pt-3'
                                                ),
                                                $formBuilder->new_div(
                                                    [
                                                        $formBuilder->new_input('spouse', '', 'class="form-check-input" value="" id="spouse"'),
                                                        $formBuilder->new_label('spouse', 'Spouse', 'form-check-label'),
                                                    ],
                                                    'form-check form-check-inline'
                                                ),
                                            ]
                                        ),
                                    ],
                                    'card-body'
                                ),
                            ],
                            'card py-3'
                        ),
                    ],
                    'col-md-3'
                ),
                $formBuilder->new_html('<hr class="mt-3">'),
            ],
            'row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // Digital Assets
    'digital_assets' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('<h5>Digital Assets</h5>'),
                    ],
                    'col-md-2'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('<p>At any time during 2022, did you: (a) receive (as a reward, award, or payment for property or services); or (b) sell, exchange, gift, or otherwise dispose of a digital asset (or a financial interest in a digital asset)? (See instructions.)</p>'),
                    ],
                    'col-md-8'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('yes', '', 'class="form-check-input" value="" id="yes"'),
                                        $formBuilder->new_label('yes', 'Yes', 'form-check-label'),
                                    ],
                                    'form-check form-check-inline'
                                ),
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('no', '', 'class="form-check-input" value="" id="no"'),
                                        $formBuilder->new_label('no', 'No', 'form-check-label'),
                                    ],
                                    'form-check form-check-inline'
                                ),
                            ]
                        ),
                    ],
                    'col-md-2'
                ),
            ],
            'row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    $formBuilder->new_html('<hr class="mt-3">')
    // Standard Deduction
    
];