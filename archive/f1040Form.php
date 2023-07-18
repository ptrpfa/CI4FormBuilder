<?php

// Get an instance of the CustomFormLibrary library
$formBuilder = service('CustomFormLibrary');

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
    'filingStatus' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h5', 'Filing Status'),
                            ],
                            'col-md-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('','Check only one box.'),
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
                        $formBuilder->new_html("", "If you checked the MFS box, enter the name of your spouse. If you checked the HOH or QSS box, enter the child's name if the qualifying person is a child but not your dependent:"),
                        $formBuilder->new_input('name','','class="form-control form-control-sm w-75" type="text" aria-label="child name"')
                    ],
                    'row w-auto'
                ),
                $formBuilder->new_html('hr', '', 'class="mx-auto mt-3"') // hr line
            ],
            'row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // First name and middle initial, Last name, Social Security Number
    'yourDetails' => [
        'group1' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_html('h5', 'Your Information'),
                                            ],
                                            'form-floating'
                                        ),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('text', 'Your First name and Middle initial', 'form-control form-control-sm', 'floatingInput', 'Your First name and Middle initial'),
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
                                                $formBuilder->new_input('text', 'Last Name', 'form-control form-control-sm', 'floatingInput', 'Last Name'),
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
                                                $formBuilder->new_input('text', 'Your Social Security Number', 'form-control form-control-sm', 'floatingInput', 'Your Social Security Number'),
                                            ],
                                            'form-floating'
                                        ),
                                    ],
                                    'col col-md-4'
                                ),
                            ],
                            'row d-flex justify-content-center mx-auto w-75 text-start'
                        ),
                        $formBuilder->new_html('hr', '', 'class="mx-auto mt-3"') // hr line
                    ],
                    'row d-flex justify-content-center mx-auto w-75 text-start'
                ),
            ]
        ),
        // Spouse First name and middle initial, last name, Social Security Number
        'spouseDetails' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_html('h5', 'If Joint Return:'),
                                            ],
                                            'form-text'
                                        ),
                                    ],
                                    'row'
                                ),
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('text', "Spouse's First name and Middle initial", 'form-control form-control-sm', 'floatingInput', "Spouse's First name and Middle initial"),
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
                                                $formBuilder->new_input('text', 'Last Name', 'form-control form-control-sm', 'floatingInput', 'Last Name'),
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
                                                $formBuilder->new_input('text', "Spouse's Social Security Number", 'form-control form-control-sm', 'floatingInput', "Spouse's Social Security Number"),
                                            ],
                                            'form-floating'
                                        ),
                                    ],
                                    'col col-md-4'
                                ),
                            ],
                            'row d-flex justify-content-center mx-auto w-75 text-start'
                        ),
                        $formBuilder->new_html('hr', '', 'class="mx-auto mt-3"') // hr line
                    ],
                    'row d-flex justify-content-center mx-auto w-75 text-start'
                ),
            ]
        ),
        // Home Address
        'homeAddress' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_html('h5', 'Home Address'),
                                            ],
                                            'form-floating'
                                        ),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_div(
                                                    [
                                                        $formBuilder->new_input('text', 'Home address (number and street). If you have a P.O. box, see instructions.', 'form-control form-control-sm', 'floatingInput', 'Home address'),
                                                    ],
                                                    'col-md-10'
                                                ),
                                                $formBuilder->new_div(
                                                    [
                                                        $formBuilder->new_input('text', 'Apt no.', 'form-control form-control-sm', 'floatingInputApt', 'Apt no.'),
                                                    ],
                                                    'col-md-2'
                                                ),
                                            ],
                                            'row'
                                        ),
                                    ],
                                    'col-md-9'
                                ),
                            ],
                            'row d-flex justify-content-center mx-auto w-75 text-start'
                        ),
                        $formBuilder->new_html('hr', '', 'class="mt-3"') // hr line
                    ],
                    'row d-flex justify-content-center mx-auto w-75 text-start'
                ),
            ]
        ),
        // City Town / Post Office , State, ZIP code
        'cityAddress' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_div(
                                                    [
                                                        $formBuilder->new_input('text', 'City, town, or post office.', 'form-control form-control-sm', 'floatingInput', 'City'),
                                                    ],
                                                    'col-md-8'
                                                ),
                                                $formBuilder->new_div(
                                                    [
                                                        $formBuilder->new_input('text', 'State', 'form-control form-control-sm', 'floatingInputApt', 'State'),
                                                    ],
                                                    'col-md-2'
                                                ),
                                                $formBuilder->new_div(
                                                    [
                                                        $formBuilder->new_input('text', 'ZIP Code', 'form-control form-control-sm', 'floatingInputApt', 'ZIP Code'),
                                                    ],
                                                    'col-md-2'
                                                ),
                                            ],
                                            'row'
                                        ),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col-md-9'
                        ),
                    ],
                    'row d-flex justify-content-center mx-auto w-75 text-start'
                ),
                $formBuilder->new_html('hr', '', 'class="mt-3"') // hr line
            ]
        ),
        // Foreign Country Name / State / Postal Code
        'foreignAddress' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_div(
                                                    [
                                                        $formBuilder->new_input('text', 'Foreign Country Name', 'form-control form-control-sm', 'floatingInput', 'Foreign Country Name'),
                                                    ],
                                                    'col-md-5'
                                                ),
                                                $formBuilder->new_div(
                                                    [
                                                        $formBuilder->new_input('text', 'Foreign province/state/county', 'form-control form-control-sm', 'floatingInputApt', 'Foreign province/state/county'),
                                                    ],
                                                    'col-md-4'
                                                ),
                                                $formBuilder->new_div(
                                                    [
                                                        $formBuilder->new_input('text', 'Foreign postal code', 'form-control form-control-sm', 'floatingInputApt', 'Foreign postal code'),
                                                    ],
                                                    'col-md-3'
                                                ),
                                            ],
                                            'row'
                                        ),
                                    ],
                                    'form-floating'
                                ),
                            ],
                            'col-md-9'
                        ),
                    ],
                    'row d-flex justify-content-center mx-auto w-75 text-start'
                ),
            ]
        ),
    ],
        // Card for Presidential Election Campaign
        'presidentialCampaign' => [
            'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h6', 'Presidential Election Campaign', '', 'class="card-title"'),
                                $formBuilder->new_html('','Check here if you, or your filing jointly, want $3 to go to this fund. Checking a box below will not change your tax or refund.'),
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_checkbox('', 'You', 'form-check-input', 'you'),
                                                $formBuilder->new_label('You', 'form-check-label', 'you'),
                                            ],
                                            'form-check form-check-inline pt-3'
                                        ),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_checkbox('', 'Spouse', 'form-check-input', 'spouse'),
                                                $formBuilder->new_label('Spouse', 'form-check-label', 'spouse'),
                                            ],
                                            'form-check form-check-inline'
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
                $formBuilder->new_html('hr', '', 'class="mt-3"') // hr line
            ],
            'row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // Digital Assets
    'standardDeduction' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h5', 'Digital Assets', '', 'class="col-md-2"'),
                    ],
                    'col-md-2'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('', 'At any time during 2022, did you: (a) receive (as a reward, award, or payment for property or services); or (b) sell, exchange, gift, or otherwise dispose of a digital asset (or a financial interest in a digital asset)? (See instructions.)'),
                    ],
                    'col-md-8'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_checkbox('', 'Yes', 'form-check-input', 'yes'),
                                $formBuilder->new_label('Yes', 'form-check-label', 'yes'),
                            ],
                            'form-check form-check-inline'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_checkbox('', 'No', 'form-check-input', 'no'),
                                $formBuilder->new_label('No', 'form-check-label', 'no'),
                            ],
                            'form-check form-check-inline'
                        ),
                    ],
                    'col-md-2'
                ),
                $formBuilder->new_html('hr', '', 'class="mt-3"'),
            ],
            'row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // Standard Deduction
    'standardDeduction' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h5', 'Standard Deduction', '', 'class="col-md-2"'),
                    ],
                    'col-md-2'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('','Someone can claim:'),
                            ],
                            'row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_checkbox('', 'You as a dependent', 'form-check-input', 'dependent'),
                                $formBuilder->new_label('You as a dependent', 'form-check-label', 'dependent'),
                            ],
                            'form-check form-check-inline'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_checkbox('', 'Your spouse as a dependent', 'form-check-input', 'spouse dependent'),
                                $formBuilder->new_label('Your spouse as a dependent', 'form-check-label', 'spouse dependent'),
                            ],
                            'form-check form-check-inline'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_checkbox('', 'Spouse itemizes on a separate return or you were a dual-status alien', 'form-check-input', 'spouse itemizes'),
                                $formBuilder->new_label('Spouse itemizes on a separate return or you were a dual-status alien', 'form-check-label', 'spouse itemizes'),
                            ],
                            'form-check form-check-inline'
                        ),
                    ],
                    'col-md-10'
                ),
                $formBuilder->new_html('hr', '', 'class="mt-3"'),
            ],
            'row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // Age/Blindness
    'ageBlindness' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h5', 'Age/Blindness', '', 'class="col-md-2"'),
                    ],
                    'col-md-2'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('', 'You:'),
                            ],
                            'form-text'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_checkbox('', 'were born before January 2, 1958', 'form-check-input', 'you born'),
                                $formBuilder->new_label('were born before January 2, 1958', 'form-check-label', 'you born'),
                            ],
                            'form-check form-check-inline'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_checkbox('', 'Are blind', 'form-check-input', 'you blind'),
                                $formBuilder->new_label('Are blind', 'form-check-label', 'you blind'),
                            ],
                            'form-check form-check-inline'
                        ),
                    ],
                    'col-md-5'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('', 'Spouse:'),
                            ],
                            'form-text'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_checkbox('', 'was born before January 2, 1958', 'form-check-input', 'spouse born'),
                                $formBuilder->new_label('was born before January 2, 1958', 'form-check-label', 'spouse born'),
                            ],
                            'form-check form-check-inline'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_checkbox('', 'Is blind', 'form-check-input', 'spouse blind'),
                                $formBuilder->new_label('Is blind', 'form-check-label', 'spouse blind'),
                            ],
                            'form-check form-check-inline'
                        ),
                    ],
                    'col-md-5'
                ),
                $formBuilder->new_html('hr', '', 'class="mt-3"'),
            ],
            'row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // Dependents
    'dependents' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h5', 'Dependents', '', 'class="row"'),
                            ],
                            'col-md-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_checkbox('', 'If more than four dependents, see instructions and check here', 'form-check-input', 'four dependents'),
                                        $formBuilder->new_label('If more than four dependents, see instructions and check here', 'form-check-label', 'four dependents'),
                                    ],
                                    'form-check form-check-inline'
                                ),
                            ],
                            'row'
                        ),
                    ],
                    'col-md-2'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('', '(see instructions):'),
                            ],
                            'form-text row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('text', 'First name', 'form-control', 'placeholder="First name"'),
                                        $formBuilder->new_input('text', 'Last name', 'form-control', 'placeholder="Last name"'),
                                        $formBuilder->new_input('text', 'SSN', 'form-control', 'placeholder="Social Security Number"'),
                                        $formBuilder->new_input('text', 'relationship', 'form-control', 'placeholder="Relationship to you"'),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_checkbox('', 'Child tax credit', 'form-check-input', 'child tax credit'),
                                                $formBuilder->new_label('Child tax credit', 'form-check-label', 'child tax credit'),
                                            ],
                                            'form-check form-check-reverse mx-2'
                                        ),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_checkbox('', 'Credit for other dependents', 'form-check-input', 'credit other'),
                                                $formBuilder->new_label('Credit for other dependents', 'form-check-label', 'credit other'),
                                            ],
                                            'form-check form-check-reverse mx-2'
                                        ),
                                    ],
                                    'input-group pb-1'
                                ),
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('text', 'First name', 'form-control', 'placeholder="First name"'),
                                        $formBuilder->new_input('text', 'Last name', 'form-control', 'placeholder="Last name"'),
                                        $formBuilder->new_input('text', 'SSN', 'form-control', 'placeholder="Social Security Number"'),
                                        $formBuilder->new_input('text', 'relationship', 'form-control', 'placeholder="Relationship to you"'),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_checkbox('', 'Child tax credit', 'form-check-input', 'child tax credit'),
                                                $formBuilder->new_label('Child tax credit', 'form-check-label', 'child tax credit'),
                                            ],
                                            'form-check form-check-reverse mx-2'
                                        ),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_checkbox('', 'Credit for other dependents', 'form-check-input', 'credit other'),
                                                $formBuilder->new_label('Credit for other dependents', 'form-check-label', 'credit other'),
                                            ],
                                            'form-check form-check-reverse mx-2'
                                        ),
                                    ],
                                    'input-group pb-1'
                                ),
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('text', 'First name', 'form-control', 'placeholder="First name"'),
                                        $formBuilder->new_input('text', 'Last name', 'form-control', 'placeholder="Last name"'),
                                        $formBuilder->new_input('text', 'SSN', 'form-control', 'placeholder="Social Security Number"'),
                                        $formBuilder->new_input('text', 'relationship', 'form-control', 'placeholder="Relationship to you"'),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_checkbox('', 'Child tax credit', 'form-check-input', 'child tax credit'),
                                                $formBuilder->new_label('Child tax credit', 'form-check-label', 'child tax credit'),
                                            ],
                                            'form-check form-check-reverse mx-2'
                                        ),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_checkbox('', 'Credit for other dependents', 'form-check-input', 'credit other'),
                                                $formBuilder->new_label('Credit for other dependents', 'form-check-label', 'credit other'),
                                            ],
                                            'form-check form-check-reverse mx-2'
                                        ),
                                    ],
                                    'input-group pb-1'
                                ),
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('text', 'First name', 'form-control', 'placeholder="First name"'),
                                        $formBuilder->new_input('text', 'Last name', 'form-control', 'placeholder="Last name"'),
                                        $formBuilder->new_input('text', 'SSN', 'form-control', 'placeholder="Social Security Number"'),
                                        $formBuilder->new_input('text', 'relationship', 'form-control', 'placeholder="Relationship to you"'),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_checkbox('', 'Child tax credit', 'form-check-input', 'child tax credit'),
                                                $formBuilder->new_label('Child tax credit', 'form-check-label', 'child tax credit'),
                                            ],
                                            'form-check form-check-reverse mx-2'
                                        ),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_checkbox('', 'Credit for other dependents', 'form-check-input', 'credit other'),
                                                $formBuilder->new_label('Credit for other dependents', 'form-check-label', 'credit other'),
                                            ],
                                            'form-check form-check-reverse mx-2'
                                        ),
                                    ],
                                    'input-group'
                                ),
                            ],
                            'col-md-10'
                        ),
                    ],
                    'row d-flex justify-content-center mx-auto w-75 text-start'
                ),
                $formBuilder->new_html('hr', '', 'class="mt-3"'),
            ],
            'row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // Income
    'income' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_label('Income', 'floatingInput'),
                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="Income"'),
            ],
            1, 'md', 2
        ),
        '1a' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('1a. Total amount from Form(s) W-2, box 1 (see instructions)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1a"'),
                ],
                1, 'md', 10
            ),
        ],
        '1b' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('1b. Household employee wages not reported on Form(s) W-2', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1b"'),
                ],
                1, 'md', 10
            ),
        ],
        '1c' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('1c. Taxable interest', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1c"'),
                ],
                1, 'md', 10
            ),
        ],
        '1d' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('1d. Tax-exempt interest', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1d"'),
                ],
                1, 'md', 10
            ),
        ],
        '1e' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('1e. Ordinary dividends', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1e"'),
                ],
                1, 'md', 10
            ),
        ],
        '1f' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('1f. Qualified dividends', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1f"'),
                ],
                1, 'md', 10
            ),
        ],
        '1g' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('1g. Rental real estate, royalties, partnerships, S corporations, trusts, etc.', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1g"'),
                ],
                1, 'md', 10
            ),
        ],
        '1h' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('1h. Farm income or (loss)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1h"'),
                ],
                1, 'md', 10
            ),
        ],
        '2a' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('2a. Social Security benefits (see instructions)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="2a"'),
                ],
                1, 'md', 10
            ),
        ],
        '2b' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('2b. Taxable amount of Social Security benefits (see instructions)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="2b"'),
                ],
                1, 'md', 10
            ),
        ],
        '3a' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('3a. Taxable amount of pensions and annuities', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="3a"'),
                ],
                1, 'md', 10
            ),
        ],
        '3b' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('3b. Total IRA distributions', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="3b"'),
                ],
                1, 'md', 10
            ),
        ],
        '3c' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('3c. Taxable amount of IRA distributions', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="3c"'),
                ],
                1, 'md', 10
            ),
        ],
        '3d' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('3d. Total pensions and annuities', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="3d"'),
                ],
                1, 'md', 10
            ),
        ],
        '4a' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('4a. Total ordinary dividends (qualified dividends included on Form 1040, line 3a)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="4a"'),
                ],
                1, 'md', 10
            ),
        ],
        '4b' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('4b. Total qualified dividends (included on Form 1040, line 3b)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="4b"'),
                ],
                1, 'md', 10
            ),
        ],
        '5a' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('5a. Total taxable refunds, credits, or offsets of state and local income taxes', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="5a"'),
                ],
                1, 'md', 10
            ),
        ],
        '5b' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('5b. Taxable amount of refunds, credits, or offsets of state and local income taxes', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="5b"'),
                ],
                1, 'md', 10
            ),
        ],
        '6' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('6. Total unemployment compensation (taxable and nontaxable)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="6"'),
                ],
                1, 'md', 10
            ),
        ],
        '7a' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('7a. Total amount of other income (excluding Alaska Permanent Fund dividends; see instructions)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="7a"'),
                ],
                1, 'md', 10
            ),
        ],
        '7b' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('7b. Description of other income (see instructions)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="7b"'),
                ],
                1, 'md', 10
            ),
        ],
        '8a' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('8a. Total amount of IRA distributions included on Form 1040, line 4b (taxable amount)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="8a"'),
                ],
                1, 'md', 10
            ),
        ],
        '8b' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('8b. Total amount of IRA distributions included on Form 1040, line 4b (nontaxable amount)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="8b"'),
                ],
                1, 'md', 10
            ),
        ],
        '9a' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('9a. Taxable amount of pensions and annuities not included on Form 1040, line 4b', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="9a"'),
                ],
                1, 'md', 10
            ),
        ],
        '9b' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('9b. Total amount of pensions and annuities not included on Form 1040, line 4b', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="9b"'),
                ],
                1, 'md', 10
            ),
        ],
        '10' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('10. Total social security benefits (see instructions)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="10"'),
                ],
                1, 'md', 10
            ),
        ],
        '11' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('11. Add lines 1 through 10', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="11"'),
                ],
                1, 'md', 10
            ),
        ],
        '12a' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('12a. Total educator expenses (see instructions)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="12a"'),
                ],
                1, 'md', 10
            ),
        ],
        '12b' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('12b. Certain business expenses of reservists, performing artists, and fee-basis government officials (see instructions)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="12b"'),
                ],
                1, 'md', 10
            ),
        ],
        '12c' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('12c. Total expenses related to the rental of personal property (see instructions)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="12c"'),
                ],
                1, 'md', 10
            ),
        ],
        '12d' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('12d. Total expenses related to the production of income (see instructions)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="12d"'),
                ],
                1, 'md', 10
            ),
        ],
        '12e' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('12e. Total expenses related to the practice of a profession (see instructions)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="12e"'),
                ],
                1, 'md', 10
            ),
        ],
        '12f' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('12f. Total expenses related to the production of self-employment income (see instructions)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="12f"'),
                ],
                1, 'md', 10
            ),
        ],
        '13' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('13. Add lines 12a through 12f', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="13"'),
                ],
                1, 'md', 10
            ),
        ],
        '14' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('14. Subtract line 13 from line 11. If zero or less, enter -0-', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="14"'),
                ],
                1, 'md', 10
            ),
        ],
        '15' => [
            'group' => $formBuilder->new_div(
                [
                    $formBuilder->new_label('15. Taxable amount (see instructions)', 'floatingInput'),
                    $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="15"'),
                ],
                1, 'md', 10
            ),
        ],
    ],
    // Tax and Credits
    'taxAndCredits' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('16. Tax (see instructions). Check if any from Form(s):', '16'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="16" placeholder="16"'),
                    ],
                    1, 'md', 6
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_input('checkbox', '', 'class="form-check-input" id="flexCheckDefault" value="8814"'),
                                $formBuilder->new_label('8814', 'flexCheckDefault'),
                            ],
                            0, 'form-check form-check-inline'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_input('checkbox', '', 'class="form-check-input" id="flexCheckDefault" value="4972"'),
                                $formBuilder->new_label('4972', 'flexCheckDefault'),
                            ],
                            0, 'form-check form-check-inline'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_input('checkbox', '', 'class="form-check-input" id="flexCheckDefault" value="others"'),
                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm" placeholder="Others" aria-label="others"'),
                            ],
                            1, 'form-check form-check-inline text-center'
                        ),
                    ],
                    1, 'md', 6
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('17. Amount from Schedule 2, line 3', '17'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="17" placeholder="17"'),
                    ],
                    1, 'md', 12
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('18. Add lines 16 and 17', '18'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="18" placeholder="18"'),
                    ],
                    1, 'md', 12
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('19. Child tax credit or credit for other dependents from Schedule 8812', '19'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="19" placeholder="19"'),
                    ],
                    1, 'md', 12
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('20. Amount from Schedule 3, line 8', '20'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="20" placeholder="20"'),
                    ],
                    1, 'md', 12
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('21. Add lines 19 and 20', '21'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="21" placeholder="21"'),
                    ],
                    1, 'md', 12
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('22. Subtract line 21 from line 18. If zero or less, enter -0-', '22'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="22" placeholder="22"'),
                    ],
                    1, 'md', 12
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('23. Other taxes, including self-employment tax, from Schedule 2, line 21', '23'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="23" placeholder="23"'),
                    ],
                    1, 'md', 12
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('24. Add lines 22 and 23. This is your total tax', '24'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="24" placeholder="24"'),
                    ],
                    1, 'md', 12
                ),
            ],
            1, 'col-md-10'
        ),
    ],
    // Payments
    'payments' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_label('25a. Form(s) W-2', '25a'),
                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="25a" placeholder="25a"'),
                            ],
                            1, 'col-md-3'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_label('25b. Form(s) 1099', '25b'),
                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="25b" placeholder="25b"'),
                            ],
                            1, 'col-md-3'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_label('25c. Other forms (see instructions)', '25c'),
                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="25c" placeholder="25c"'),
                            ],
                            1, 'col-md-3'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_label('25d. Add lines 25a through 25c', '25d'),
                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="25d" placeholder="25d"'),
                            ],
                            1, 'col-md-3'
                        ),
                    ],
                    1, 'row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('26. 2022 estimated tax payments and amount applied from 2021 return', '26'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="26" placeholder="26"'),
                    ],
                    1, 'row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_label('27. Earned income credit (EIC)', '27'),
                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="27" placeholder="27"'),
                            ],
                            1, 'col-md-12'
                        ),
                    ],
                    1, 'row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('28. Additional child tax credit from Schedule 8812', '28'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="28" placeholder="28"'),
                    ],
                    1, 'row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('29. American opportunity credit from Form 8863, line 8', '29'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="29" placeholder="29"'),
                    ],
                    1, 'row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('30. Reserved for future use', '30'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="30" placeholder="30"'),
                    ],
                    1, 'row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('31. Amount from Schedule 3, line 15', '31'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="31" placeholder="31"'),
                    ],
                    1, 'row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('32. Add lines 27, 28, 29, and 31. These are your total other payments and refundable credits', '32'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="32" placeholder="32"'),
                    ],
                    1, 'row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('33. Add lines 25d, 26, and 32. These are your total payments', '33'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="33" placeholder="33"'),
                    ],
                    1, 'row'
                ),
            ],
            1, 'col-md-10'
        ),
    ],
    // Refund    
    'refund' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_label('34. If line 33 is more than line 24, subtract line 24 from line 33. This is the amount you overpaid', '34'),
                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="34" placeholder="34"'),
                            ],
                            1, 'col-md-12'
                        ),
                    ],
                    1, 'row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_label('35a. Amount of line 34 you want refunded to you.', '35a'),
                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="35a" placeholder="35a"'),
                            ],
                            1, 'col-md-6'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_checkbox('35a', '', 'form-check-input', '35a'),
                                        $formBuilder->new_label('If Form 8888 is attached, check here', '35a', 'form-check-label'),
                                    ],
                                    1, 'form-check form-check-reverse'
                                ),
                            ],
                            1, 'col-md-6'
                        ),
                    ],
                    1, 'row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_label('35b. Routing Number', '35b'),
                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="35b" placeholder="35b"'),
                            ],
                            1, 'col-md-6'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_checkbox('flexCheckDefault', '', 'form-check-input', 'flexCheckDefault'),
                                        $formBuilder->new_label('Checking', 'flexCheckDefault', 'form-check-label'),
                                    ],
                                    1, 'form-check form-check-inline'
                                ),
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_checkbox('flexCheckDefault', '', 'form-check-input', 'flexCheckDefault'),
                                        $formBuilder->new_label('Savings', 'flexCheckDefault', 'form-check-label'),
                                    ],
                                    1, 'form-check form-check-inline'
                                ),
                            ],
                            1, 'col-md-6'
                        ),
                    ],
                    1, 'row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_label('35d. Account Number', '35d'),
                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="35d" placeholder="35d"'),
                            ],
                            1, 'col-md-12'
                        ),
                    ],
                    1, 'row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_label('36. Amount of line 34 you want applied to your 2023 estimated tax', '36'),
                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="36" placeholder="36"'),
                            ],
                            1, 'col-md-12'
                        ),
                    ],
                    1, 'row'
                ),
            ],
            1, 'col-md-10'
        ),
    ],
    // Amount you owe
    'amtYouOwe' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('37. Subtract line 33 from line 24. This is the amount you owe', '37'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="37" placeholder="37"'),
                    ],
                    1, 'form-floating'
                ),
            ],
            1, 'row'
        ),
        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_label('38. Estimated tax penalty (see instructions)', '38'),
                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="38" placeholder="38"'),
                    ],
                    1, 'form-floating'
                ),
            ],
            1, 'row'
        ),
    ],
    // Sign here    
    'sign' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_label('Sign Here', ''),
                                $formBuilder->new_html('', 'Joint return? See instructions. Keep a copy for your records.'),
                            ],
                            1, 'row'
                        ),
                        $formBuilder->new_div(
                            [
                            $formBuilder->new_html('', 'Under penalties of perjury, I declare that I have examined this return and accompanying schedules and statements, and to the best of my knowledge and belief, they are true, correct, and complete. Declaration of preparer (other than taxpayer) is based on all information of which preparer has any knowledge.'),
                            ],
                            1, '', '' , 'form-text'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_html('', 'Upload your signature below:'),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('file', '', 'class="form-control" id="inputGroupFile02"'),
                                                $formBuilder->new_label('Upload', 'inputGroupFile02', 'input-group-text'),
                                            ],
                                            1, 'input-group mb-3'
                                        ),
                                    ],
                                    1, 'col-md-5'
                                ),
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_label('Date', 'Date'),
                                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="Date" placeholder="Date"'),
                                            ],
                                            1, 'form-floating'
                                        ),
                                    ],
                                    1, 'col-md-2'
                                ),
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_label('Your Occupation', 'yourOccupation'),
                                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="yourOccupation" placeholder="Your Occupation"'),
                                            ],
                                            1, 'form-floating'
                                        ),
                                    ],
                                    1, 'col-md-2'
                                ),
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                            $formBuilder->new_html('', 'If the IRS sent you an Identity Protection PIN, enter it here'),
                                            ],
                                            1,'','', 'form-floating'
                                        ),
                                        $formBuilder->new_div(
                                            [
                                            $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="idenProtectPin" placeholder=""'),
                                            ],
                                            1,'','', 'form-floating'
                                        ),
                                    ],
                                    1, 'col-md-3'
                                ),
                            ],
                            1, 'row mt-3'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_html('', 'Spouse signature. If a joint return, both must sign.'),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('file', '', 'class="form-control" id="inputGroupFile02"'),
                                                $formBuilder->new_label('Upload', 'inputGroupFile02', 'input-group-text'),
                                            ],
                                            1, 'input-group mb-3'
                                        ),
                                    ],
                                    1, 'col-md-5'
                                ),
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_label('Date', 'Date'),
                                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="Date" placeholder="Date"'),
                                            ],
                                            1, 'form-floating'
                                        ),
                                    ],
                                    1, 'col-md-2'
                                ),
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_label('Spouse Occupation', 'spouseOccupation'),
                                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="spouseOccupation" placeholder="Spouse Occupation"'),
                                            ],
                                            1, 'form-floating'
                                        ),
                                    ],
                                    1, 'col-md-2'
                                ),
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                            $formBuilder->new_html('', 'If the IRS sent you an Identity Protection PIN, enter it here'),
                                            ],
                                            1,'','', 'form-floating'
                                        ),
                                        $formBuilder->new_div(
                                            [
                                            $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="idenProtectPin" placeholder=""'),
                                            ],
                                            1,'','', 'form-floating'
                                        ),
                                    ],
                                    1, 'col-md-3'
                                ),
                            ],
                            1, 'row mt-3'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_label('Phone Number', 'phoneNumber'),
                                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="phoneNumber" placeholder="Phone Number"'),
                                            ],
                                            1, 'form-floating'
                                        ),
                                    ],
                                    1, 'col-md-6'
                                ),
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_label('Email Address', 'email'),
                                                $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="email" placeholder="Email Address"'),
                                            ],
                                            1, 'form-floating'
                                        ),
                                    ],
                                    1, 'col-md-6'
                                ),
                            ],
                            1, 'row'
                        ),
                    ],
                    1, 'col-md-10'
                ),
            ],
            1, 'row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // Paid Preparer Use Only
    'paidPreparer' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                    $formBuilder->new_html('h5','Paid Preparer Use Only'),
                    ],
                    1, 'col-md-2'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_label('Preparer\'s Name', 'prepName'),
                                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="prepName" placeholder="Preparer\'s Name"'),
                                    ],
                                    1, 'form-floating'
                                ),
                            ],
                            1, 'col-md-3'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_label('Preparer\'s Signature', 'prepSign'),
                                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="prepSign" placeholder="Preparer\'s Signature"'),
                                    ],
                                    1, 'form-floating'
                                ),
                            ],
                            1, 'col-md-3'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_label('Date', 'date'),
                                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="date" placeholder="Date"'),
                                    ],
                                    1, 'form-floating'
                                ),
                            ],
                            1, 'col-md-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_label('PTIN', 'ptin'),
                                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="ptin" placeholder="PTIN"'),
                                    ],
                                    1, 'form-floating'
                                ),
                            ],
                            1, 'col-md-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('checkbox', '', 'class="form-check-input" value="" id="flexCheckDefault"'),
                                                $formBuilder->new_label('Check if Self-Employed', 'flexCheckDefault', 'form-check-label'),
                                            ],
                                            1, 'form-check'
                                        ),
                                    ],
                                    1, 'col-md-2'
                                ),
                            ],
                            1, 'row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_label('Firm\'s Name', 'firmName'),
                                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="firmName" placeholder="Firm\'s Name"'),
                                    ],
                                    1, 'form-floating'
                                ),
                            ],
                            1, 'col-md-8'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_label('Phone No.', 'phoneNumber'),
                                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="phoneNumber" placeholder="Phone No."'),
                                    ],
                                    1, 'form-floating'
                                ),
                            ],
                            1, 'col-md-4'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_label('Firm\'s Address', 'firmAddress'),
                                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="firmAddress" placeholder="Firm\'s Address"'),
                                    ],
                                    1, 'form-floating'
                                ),
                            ],
                            1, 'col-md-8'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_label('Firm\'s EIN', 'firmEIN'),
                                        $formBuilder->new_input('text', '', 'class="form-control form-control-sm mb-1" id="firmEIN" placeholder="Firm\'s EIN"'),
                                    ],
                                    1, 'form-floating'
                                ),
                            ],
                            1, 'col-md-4'
                        ),
                    ],
                    1, 'col-md-10'
                ),
            ],
            1, 'row', '','', 'd-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // footer
    'footer' => [
        'group' => $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                    $formBuilder->new_html('h6','Go to www.irs.gov/Form1040 for instructions and the latest information.'),
                    ],
                    1, '','9'
                ),
                $formBuilder->new_div(
                    [
                    $formBuilder->new_html('h6','Form 1040 (2022)'),
                    ],
                    1, '', '3'
                ),
            ],
            1, 'row', '','', 'd-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
];
return $fields;