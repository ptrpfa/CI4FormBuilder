<?php

// Get an instance of the CustomFormLibrary library
$formBuilder = service('CustomFormLibrary');

$fields = 
[
    'head' =>  $formBuilder->form_open('/users/submit'),
    'title' =>
    [
        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h4','Form 1040'),
                    ],
                    '','','','col col-auto'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h6','Department of the Treasury - Internal Revenue Service'),
                            ],
                            '','','','row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h6','U.S. Individual Income Tax Return'),
                            ],
                            '','','','row'
                        ),
                    ],
                    '','','','col col-auto'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h6','2022'),
                    ],
                    '','','','col col-auto'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h6','OMB No. 1545-0074'),
                    ],
                    '','','','col col-auto'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h6','IRS Use Only - Do not write or staple in this space.'),
                    ],
                    '','','','col col-auto'
                ),
                'seperator' => $formBuilder->new_html('hr','', 'class="mx-auto mt-2 w-80"'),
            ],
            '','','','row d-flex justify-content-center align-items-end mx-auto w-75 text-start'
        ),
    ],

    'filingStatus' => 
    [
        $formBuilder->new_div(
        [
            'filing_status' => $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_html('h5', 'Filing Status'),
                                ],
                                '',
                                '',
                                '',
                                'row align-items-start'
                            ),

                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_html('p', 'Check only one box.'),
                                ],
                                '',
                                '',
                                '',
                                'row'
                            ),
                        ],
                        '',
                        '',
                        '',
                        'col-auto align-items-start mx-1'
                    ),
                    $formBuilder->new_div(
                        [
                            'single'=> $formBuilder->new_div(
                                [
                                    $formBuilder->new_checkbox('filing_status', '', 'class="form-check-input"', true),
                                    $formBuilder->new_label('filing_status', 'Single', 'class="form-check-label"'),
                                ],
                                '',
                                '',
                                '',
                                'form-check form-check-inline'
                            ),
                            'marriedJointly' => $formBuilder->new_div(
                                [
                                    $formBuilder->new_checkbox('filing_status', '', 'class="form-check-input"', false),
                                    $formBuilder->new_label('filing_status', 'Married filing jointly', 'class="form-check-label"'),
                                ],
                                '',
                                '',
                                '',
                                'form-check form-check-inline'
                            ),
                            'marriedSeperately' => $formBuilder->new_div(
                                [
                                    $formBuilder->new_checkbox('filing_status', '', 'class="form-check-input"', false),
                                    $formBuilder->new_label('filing_status', 'Married filing separately (MFS)', 'class="form-check-label"'),
                                ],
                                '',
                                '',
                                '',
                                'form-check form-check-inline'
                            ),
                            'headOfHousehold' => $formBuilder->new_div(
                                [
                                    $formBuilder->new_checkbox('filing_status', '', 'class="form-check-input"', false),
                                    $formBuilder->new_label('filing_status', 'Head of Household (HOH)', 'class="form-check-label"'),
                                ],
                                '',
                                '',
                                '',
                                'form-check form-check-inline'
                            ),
                            'qualifyingSurvivingSpouse' => $formBuilder->new_div(
                                [
                                    $formBuilder->new_checkbox('filing_status', '', 'class="form-check-input"', false),
                                    $formBuilder->new_label('filing_status', 'Qualifying surviving spouse (QSS)', 'class="form-check-label"'),
                                ],
                                '',
                                '',
                                '',
                                'form-check form-check-inline'
                            ),
                            'qualifyingSurvivingSpouse' => $formBuilder->new_div(
                                [
                                    $formBuilder->new_checkbox('filing_status', '', 'class="form-check-input"', false),
                                    $formBuilder->new_label('filing_status', 'Qualifying surviving spouse (QSS)', 'class="form-check-label"'),
                                ],
                                '',
                                '',
                                '',
                                'form-check form-check-inline'
                            ),
                            'mfsBox' => $formBuilder->new_div(
                                [
                                    $formBuilder->new_html('p', 'If you checked the MFS box, enter the name of your spouse. If you checked the HOH or QSS box, enter the child\'s name if the qualifying person is a child but not your dependent:'),
                                    $formBuilder->new_input('child_name', '', 'class="form-control form-control-sm w-75" aria-label="child name"'),
                                ],
                                '',
                                '',
                                '',
                                'row w-auto'
                            ),
                        ],
                        '',
                        '',
                        '',
                        'col-md-8'
                    ),
                    'seperator' => $formBuilder->new_html('hr','', 'class="mx-auto mt-3"'),
                ],
                '',
                '',
                '',
                'row d-flex justify-content-center mx-auto w-75 text-start'
                ),
            ],
        ),
    ],
    // Individual First name initial etc.
    'individual' =>[
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
                                $formBuilder->new_label('securitynumber','  Your Social Security Number'),
                            ],'','','', 'form-floating'
                        ),
                    ],'','','','col col-md-3'
                ),
                'seperator' => $formBuilder->new_html('hr','', 'class="mx-auto mt-3"'),
            ],'','','', 'row d-flex justify-content-center mx-auto w-75 text-start'  
        ),
    ],

    // Spouse First name initial etc.
    'spouse' =>[
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
                'seperator' => $formBuilder->new_html('hr','', 'class="mx-auto mt-3"'),
            ],
            '','','', 'row d-flex justify-content-center mx-auto w-75 text-start'  
        ),
    ],
    // Home address
    'address' => [
        $formBuilder->new_div(
        [
            'addresses' => $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('home_address', '', 'class="form-control form-control-sm" id="floatingInput" placeholder="Home address"'),
                                            $formBuilder->new_label('floatingInput', 'Home address (number and street). If you have a P.O. box, see instructions.', 'for="floatingInput"'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-10'
                            ),
                        
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('apt_no', '', 'class="form-control form-control-sm" id="floatingInputApt" placeholder="apt no"'),
                                        $formBuilder->new_label('floatingInputApt', 'Apt no.', 'for="floatingInputApt"'),
                                    ],
                                    '','','','form-floating'
                                ),
                            ],
                            '','','','col-md-2'
                            ),
                        ],
                        '','','','row'
                    ),
                    'seperator' => $formBuilder->new_html('hr','', 'class="mx-auto mt-3"'),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('city', '', 'class="form-control form-control-sm" id="floatingInputCity" placeholder="city"'),
                                            $formBuilder->new_label('floatingInputCity', 'City, town, or post office.', 'for="floatingInputCity"'),
                                        ],
                                        '','','','form-floating'
                                    ),

                                ],
                                '','','','col-md-8'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('state', '', 'class="form-control form-control-sm" id="floatingInputState" placeholder="state"'),
                                            $formBuilder->new_label('floatingInputState', 'State', 'for="floatingInputState"'),
                                        ],
                                        '','','','form-floating'
                                    ),

                                ],
                                '','','','col-md-2'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('zipCode', '', 'class="form-control form-control-sm" id="floatingInputZip" placeholder="zip"'),
                                            $formBuilder->new_label('floatingInputZip', 'ZIP Code', 'for="floatingInputZip"'),
                                        ],
                                        '','','','form-floating'
                                    ),

                                ],
                                '','','','col-md-2'
                            ),
                            'seperator' => $formBuilder->new_html('hr','', 'class="mt-3"'),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    'If you have a foreign address, also complete space below:'
                                ],
                                '','','','form-text'
                            )
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('foreignCountry', '', 'class="form-control form-control-sm" id="floatingInputForeignCountry" placeholder="foreign country"'),
                                            $formBuilder->new_label('floatingInputForeignCountry', 'Foreign Country Name', 'for="floatingInputForeignCountry"'),
                                        ],
                                        '','','','form-floating'
                                    )
                                ],
                                '','','','col-md-5'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('foreignState', '', 'class="form-control form-control-sm" id="floatingInputForeignState" placeholder="foreign state"'),
                                            $formBuilder->new_label('floatingInputForeignState', 'Foreign province/state/county', 'for="floatingInputForeignState"'),
                                        ],
                                        '','','','form-floating'
                                    )
                                ],
                                '','','','col-md-4'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('foreignZip', '', 'class="form-control form-control-sm" id="floatingInputForeignZip" placeholder="foreign zip"'),
                                            $formBuilder->new_label('floatingInputForeignZip', 'Foreign Postal Code', 'for="floatingInputForeignZip"'),
                                        ],
                                        '','','','form-floating'
                                    )
                                ],
                                '','','','col-md-3'
                            ),
                        ],
                        '','','','row'
                    ),

                ],
                '','','','col-md-9'
            ),
            'presidentialCampaign' => $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_html('h6', 'Presidential Election', 'class="card-title"'),
                            $formBuilder->new_html('p', 'Check here if you, or your filing jointly, want $3 to go to this fund. Checking a box below will not change your tax or refund.', 'class="card-text"'),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('electionYou', '', 'class="form-check-input" id="you"'),
                                            $formBuilder->new_label('you', 'You', 'class="form-check-label"'),
                                        ],
                                        '','','','form-check form-check-inline pt-3',
                                    ),
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('electionSpouse', '', 'class="form-check-input" id="spouse"'),
                                            $formBuilder->new_label('spouse', 'Spouse', 'class="form-check-label"'),
                                        ],
                                        '','','','form-check form-check-inline',
                                    ),
                                ],
                                '','','','card-body',
                            ),
                        ],
                        '','','','card p-3',
                    ),
                ],
                '','','','col-md-3'
            ),
            'separator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),
        ],
        '','','','row d-flex justify-content-center mx-auto w-75 text-start'
    ),  
],
// Digital Assets
'digitalAssets' => [
    $formBuilder->new_div(
        [
            $formBuilder->new_div(
                [
                    $formBuilder->new_html('h5','Digital Assets'),
                ],
                '','','','col-md-2'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_html('p','At any time during 2022, did you: (a) receive (as a reward, award, or payment for property or services); or (b) sell, exchange, gift, or otherwise dispose of a digital asset (or a financial interest in a digital asset)? (See instructions.)'),
                ],
                '','','','col-md-8'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_checkbox('rewardYesCheckbox', '', 'class="form-check-input" id="rewardYesCheckbox"'),
                            $formBuilder->new_label('rewardYesCheckbox', 'Yes', 'class="form-check-label"'),
                        ],
                        '',
                        '',
                        '',
                        'form-check form-check-inline',
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_checkbox('rewardNoCheckbox', '', 'class="form-check-input" id="rewardNoCheckbox"'),
                            $formBuilder->new_label('rewardNoCheckbox', 'No', 'class="form-check-label"'),
                        ],
                        '',
                        '',
                        '',
                        'form-check form-check-inline',
                    ),
                ],
                '','','','col-md-2'
            ),
            'separator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),
        ],
        '','','','row d-flex justify-content-center mx-auto w-75 text-start'
    ),
],
// Standard Deduction
'standardDeduction'=>
[
    $formBuilder->new_div(
        [
            $formBuilder->new_div(
                [
                    $formBuilder->new_html('h5','Standard Deduction'),
                ],
                '','','','col-md-2'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    'Someone can claim:'
                                ],
                                '','','','form-text'
                            )
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_checkbox('dependentCheckbox', '', 'class="form-check-input" id="dependentCheckbox"'),
                            $formBuilder->new_label('dependentCheckbox', 'You as a dependent', 'class="form-check-label"'),
                        ],
                        '','','','form-check form-check-inline'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_checkbox('spouseDepCheckbox', '', 'class="form-check-input" id="spouseDepCheckbox"'),
                            $formBuilder->new_label('spouseDepCheckbox', 'Your spouse as a dependent', 'class="form-check-label"'),
                        ],
                        '','','','form-check form-check-inline'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_checkbox('spouseItemizesCheckbox', '', 'class="form-check-input" id="spouseItemizesCheckbox"'),
                            $formBuilder->new_label('spouseItemizesCheckbox', 'Spouse itemizes on a separate return or you were a dual-status alien', 'class="form-check-label"'),
                        ],
                        '','','','form-check form-check-inline'
                    ),
                ],
                '','','','col-md-10'
            ),
            'separator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),
        ],
        '','','','row d-flex justify-content-center mx-auto w-75 text-start'
    ),
],
// Age/Blindness
'ageBlindness' => [
    $formBuilder->new_div(
        [
            $formBuilder->new_div(
                [
                    $formBuilder->new_html('h5','Age/Blindness'),
                ],
                '','','','col-md-2'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            'You:'
                        ],
                        '','','','form-text'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_checkbox('youBorn', '', 'class="form-check-input" id="youBorn"'),
                            $formBuilder->new_label('youBorn', 'were born before January 2, 1958', 'class="form-check-label"'),
                        ],
                        '','','','form-check form-check-inline'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_checkbox('youBlind', '', 'class="form-check-input" id="youBlind"'),
                            $formBuilder->new_label('youBlind', 'Are blind', 'class="form-check-label"'),
                        ],
                        '','','','form-check form-check-inline'
                    ),
                ],
                '','','','col-md-5'
            ),

            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            'Spouse:'
                        ],
                        '','','','form-text'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_checkbox('spouseBorn', '', 'class="form-check-input" id="spouseBorn"'),
                            $formBuilder->new_label('spouseBorn', 'was born before January 2, 1958', 'class="form-check-label"'),
                        ],
                        '','','','form-check form-check-inline'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_checkbox('spouseBlind', '', 'class="form-check-input" id="spouseBlind"'),
                            $formBuilder->new_label('spouseBlind', 'Is blind', 'class="form-check-label"'),
                        ],
                        '','','','form-check form-check-inline'
                    ),
                ],
                '','','','col-md-5'
            ),
            'separator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),
        ],
        '','','','row d-flex justify-content-center mx-auto w-75 text-start'
    ),
],
// Dependents
'dependents' =>
[
    $formBuilder->new_div(
        [
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_html('h5','Dependents'),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_checkbox('fourDependents', '', 'class="form-check-input" id="fourDependents"'),
                                    $formBuilder->new_label('fourDependents', 'If more than four dependents, see instructions and check here', 'class="form-check-label"'),
                                ],
                                '','','','form-check form-check-inline'
                            ),
                        ],
                        '','','','row'
                    ),
                ],
                '','','','col-md-2'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    '(see instructions):'
                                ],
                                '','','','form-text'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_input('FNText1', '', 'aria-label="First name" class="form-control" placeholder="First name"'),
                                    $formBuilder->new_input('LNText1', '', 'aria-label="Last name" class="form-control" placeholder="Last name"'),
                                    $formBuilder->new_input('SSNText1', '', 'aria-label="SSN" class="form-control" placeholder="Social Security Number"'),
                                    $formBuilder->new_input('relationshipText1', '', 'aria-label="relationship" class="form-control" placeholder="Relationship to you"'),
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('ChildTaxCheckbox1', '', 'class="form-check-input" id="ChildTaxCheckbox"'),
                                            $formBuilder->new_label('ChildTaxCheckbox1', 'Child tax credit', 'class="form-check-label"'),
                                        ],
                                        '',
                                        '',
                                        '',
                                        'form-check form-check-reverse mx-2'
                                    ),
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('creditOtherCheckbox1', '', 'class="form-check-input" id="creditOtherCheckbox1"'),
                                            $formBuilder->new_label('creditOtherCheckbox1', 'Credit for other dependents', 'class="form-check-label"'),
                                        ],
                                        '',
                                        '',
                                        '',
                                        'form-check form-check-reverse mx-2'
                                    ),
                                ],
                                '','','','input-group pb-1'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_input('FNText2', '', 'aria-label="First name" class="form-control" placeholder="First name"'),
                                    $formBuilder->new_input('LNText2', '', 'aria-label="Last name" class="form-control" placeholder="Last name"'),
                                    $formBuilder->new_input('SSNText2', '', 'aria-label="SSN" class="form-control" placeholder="Social Security Number"'),
                                    $formBuilder->new_input('relationshipText1', '', 'aria-label="relationship" class="form-control" placeholder="Relationship to you"'),
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('ChildTaxCheckbox2', '', 'class="form-check-input" id="ChildTaxCheckbox"'),
                                            $formBuilder->new_label('ChildTaxCheckbox2', 'Child tax credit', 'class="form-check-label"'),
                                        ],
                                        '',
                                        '',
                                        '',
                                        'form-check form-check-reverse mx-2'
                                    ),
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('creditOtherCheckbox2', '', 'class="form-check-input" id="creditOtherCheckbox2"'),
                                            $formBuilder->new_label('creditOtherCheckbox2', 'Credit for other dependents', 'class="form-check-label"'),
                                        ],
                                        '',
                                        '',
                                        '',
                                        'form-check form-check-reverse mx-2'
                                    ),
                                ],
                                '','','','input-group pb-1'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_input('FNText3', '', 'aria-label="First name" class="form-control" placeholder="First name"'),
                                    $formBuilder->new_input('LNText3', '', 'aria-label="Last name" class="form-control" placeholder="Last name"'),
                                    $formBuilder->new_input('SSNText3', '', 'aria-label="SSN" class="form-control" placeholder="Social Security Number"'),
                                    $formBuilder->new_input('relationshipText1', '', 'aria-label="relationship" class="form-control" placeholder="Relationship to you"'),
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('ChildTaxCheckbox3', '', 'class="form-check-input" id="ChildTaxCheckbox3"'),
                                            $formBuilder->new_label('ChildTaxCheckbox3', 'Child tax credit', 'class="form-check-label"'),
                                        ],
                                        '',
                                        '',
                                        '',
                                        'form-check form-check-reverse mx-2'
                                    ),
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('creditOtherCheckbox3', '', 'class="form-check-input" id="creditOtherCheckbox"'),
                                            $formBuilder->new_label('creditOtherCheckbox3', 'Credit for other dependents', 'class="form-check-label"'),
                                        ],
                                        '',
                                        '',
                                        '',
                                        'form-check form-check-reverse mx-2'
                                    ),
                                ],
                                '','','','input-group pb-1'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_input('FNText4', '', 'aria-label="First name" class="form-control" placeholder="First name"'),
                                    $formBuilder->new_input('LNText4', '', 'aria-label="Last name" class="form-control" placeholder="Last name"'),
                                    $formBuilder->new_input('SSNText4', '', 'aria-label="SSN" class="form-control" placeholder="Social Security Number"'),
                                    $formBuilder->new_input('relationshipText4', '', 'aria-label="relationship" class="form-control" placeholder="Relationship to you"'),
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('ChildTaxCheckbox4', '', 'class="form-check-input" id="ChildTaxCheckbox4"'),
                                            $formBuilder->new_label('ChildTaxCheckbox4', 'Child tax credit', 'class="form-check-label"'),
                                        ],
                                        '',
                                        '',
                                        '',
                                        'form-check form-check-reverse mx-2'
                                    ),
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('creditOtherCheckbox4', '', 'class="form-check-input" id="creditOtherCheckbox4"'),
                                            $formBuilder->new_label('creditOtherCheckbox4', 'Credit for other dependents', 'class="form-check-label"'),
                                        ],
                                        '',
                                        '',
                                        '',
                                        'form-check form-check-reverse mx-2'
                                    ),
                                ],
                                '','','','input-group pb-1'
                            ),
                        ],
                        '','','','row'
                    ),
                ],
                '','','','col-md-10'
            ),
            'separator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),
        ],
        '','','','row d-flex justify-content-center mx-auto w-75 text-start'
    ),
],
// Income
'income' => [
    $formBuilder->new_div(
        [
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_html('h5','Income'),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_html('p','Attach Form(s) W-2 here. Also attach Forms W-2G and 1099-R if tax was withheld. If you did not get a Form W-2, see instructions.'),
                        ],
                        '','','','row'
                    ),
                ],
                '','','','col-md-2'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_input('1atext', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1a"'),
                            $formBuilder->new_label('floatingInput', '1a. Total amount from Form(s) W-2, box 1 (see instructions)'),
                        ],
                        '','','','form-floating'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_input('1btext', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1b"'),
                            $formBuilder->new_label('floatingInput', '1b. Household employee wages not reported on Form(s) W-2'),
                        ],
                        '','','','form-floating'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_input('1ctext', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1c"'),
                            $formBuilder->new_label('floatingInput', '1c. Tip income not reported on line 1a (see instructions)'),
                        ],
                        '','','','form-floating'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_input('1dtext', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1d"'),
                            $formBuilder->new_label('floatingInput', '1d. Medicaid waiver payments not reported on Form(s) W-2 (see instructions)'),
                        ],
                        '','','','form-floating'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_input('1etext', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1e"'),
                            $formBuilder->new_label('floatingInput', '1e. Taxable dependent care benefits from Form 2441, line 26'),
                        ],
                        '','','','form-floating'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_input('1ftext', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1f"'),
                            $formBuilder->new_label('floatingInput', '1f. Employer-provided adoption benefits from Form 8839, line 29'),
                        ],
                        '','','','form-floating'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_input('1gtext', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1g"'),
                            $formBuilder->new_label('floatingInput', '1g. Wages from Form 8919, line 6'),
                        ],
                        '','','','form-floating'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_input('1htext', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1h"'),
                            $formBuilder->new_label('floatingInput', '1h. Other earned income (see instructions)'),
                        ],
                        '','','','form-floating'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_input('1itext', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1i"'),
                            $formBuilder->new_label('floatingInput', '1i. Nontaxable combat pay election (see instructions)'),
                        ],
                        '','','','form-floating'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_input('1ztext', '', 'class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1z"'),
                            $formBuilder->new_label('floatingInput', '1z. Add lines 1a through 1h'),
                        ],
                        '','','','form-floating'
                    ),
                ],
                '','','','col-md-10'
            ),
            
        ],
        '','','','row d-flex justify-content-center mx-auto w-75 text-start'
    ),
],
'attachSchB'=>[
    $formBuilder->new_div(
        [
            $formBuilder->new_div(
                [
                    $formBuilder->new_html('p','Attach Sch. B if required'),
                ],
                '','','','col-md-2'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('2atext', '', 'class="form-control form-control-sm mb-1" id="2a" placeholder="2a"'),
                                            $formBuilder->new_label('2a', '2a. Tax-exempt interest'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-6'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('2btext', '', 'class="form-control form-control-sm mb-1" id="2b" placeholder="2b"'),
                                            $formBuilder->new_label('2b', '2b. Taxable interest'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-6'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('3atext', '', 'class="form-control form-control-sm mb-1" id="3a" placeholder="3a"'),
                                            $formBuilder->new_label('3a', '3a. Qualified dividends'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-6'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('3btext', '', 'class="form-control form-control-sm mb-1" id="3b" placeholder="3b"'),
                                            $formBuilder->new_label('3b', '3b. Ordinary dividends'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-6'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('4atext', '', 'class="form-control form-control-sm mb-1" id="4a" placeholder="4a"'),
                                            $formBuilder->new_label('4a', '4a. IRA distributions'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-6'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('4btext', '', 'class="form-control form-control-sm mb-1" id="4b" placeholder="4b"'),
                                            $formBuilder->new_label('4b', '4b. Taxable amount'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-6'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('5atext', '', 'class="form-control form-control-sm mb-1" id="5a" placeholder="5a"'),
                                            $formBuilder->new_label('5a', '5a. Pensions and annuities'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-6'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('5btext', '', 'class="form-control form-control-sm mb-1" id="5b" placeholder="5b"'),
                                            $formBuilder->new_label('5b', '5b. Taxable amount'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-6'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('6atext', '', 'class="form-control form-control-sm mb-1" id="6a" placeholder="6a"'),
                                            $formBuilder->new_label('6a', '6a. Social security benefits'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-4'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('6btext', '', 'class="form-control form-control-sm mb-1" id="6b" placeholder="6b"'),
                                            $formBuilder->new_label('6b', '6b. Taxable amount'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-4'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('6c', '', 'class="form-check-input" id="6c"'),
                                            $formBuilder->new_label('6c', '6c. If you elect to use the lump-sum election method, check here', 'class="form-check-label"'),
                                        ],
                                        '','','','form-check form-check-reverse'
                                    ),
                                ],
                                '','','','col-md-4'
                            ),
                        ],
                        '','','','row'
                    ),
                    
                ],
                '','','','col-md-10'
            ),
        ],
        '','','','row d-flex justify-content-center mx-auto w-75 text-start'
    ),
],

$formBuilder->new_div(
    [
        $formBuilder->new_div(
            [
                $formBuilder->new_html('h6','12. Standard Deduction for'),
                $formBuilder->new_list(
                    [
                        'Single or Married filing separately, $12,950',
                        'Married filing jointly or Qualifying surviving spouse, $25,900',
                        'Head of household, $19,400',
                        'If you checked any box under Standard Deduction, see instructions',
                    ],
                ),
            ],
            '','','','col-md-2'
        ),

        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('7a','','class="form-control form-control-sm mb-1"'),
                                        $formBuilder->new_label('7a','7. Capital gain or (loss). Attach Schedule D if required.'),
                                    ],
                                    '','','','form-floating'
                                ),
                            ],
                            '','','','col-md-10'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_checkbox('7b', '', 'class="form-check-input" id="7b"'),
                                        $formBuilder->new_label('7b', 'If not required, check here', 'class="form-check-label"')
                                    ],
                                    '','','','form-check form-check-reverse'
                                ),
                            ],
                            '','','','col-md-2'
                        )
                    ],
                    '','','','row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('8','','class="form-control form-control-sm mb-1"'),
                                        $formBuilder->new_label('8','8. Other income from Schedule 1, line 10'),
                                    ],
                                    '','','','form-floating'
                                ),
                            ],
                            '','','','col-md-12'
                        ),
                    ],
                    '','','','row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('9','','class="form-control form-control-sm mb-1"'),
                                        $formBuilder->new_label('9','9. Other income from Schedule 1, line 10'),
                                    ],
                                    '','','','form-floating'
                                ),
                            ],
                            '','','','col-md-12'
                        ),
                    ],
                    '','','','row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('10','','class="form-control form-control-sm mb-1"'),
                                        $formBuilder->new_label('10','10. Other income from Schedule 1, line 10'),
                                    ],
                                    '','','','form-floating'
                                ),
                            ],
                            '','','','col-md-12'
                        ),
                    ],
                    '','','','row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('11','','class="form-control form-control-sm mb-1"'),
                                        $formBuilder->new_label('11','11. Other income from Schedule 1, line 10'),
                                    ],
                                    '','','','form-floating'
                                ),
                            ],
                            '','','','col-md-12'
                        ),
                    ],
                    '','','','row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('12','','class="form-control form-control-sm mb-1"'),
                                        $formBuilder->new_label('12','12. Standard deduction or itemized deductions (from Schedule A)'),
                                    ],
                                    '','','','form-floating'
                                ),
                            ],
                            '','','','col-md-12'
                        ),
                    ],
                    '','','','row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('13','','class="form-control form-control-sm mb-1"'),
                                        $formBuilder->new_label('13','13. Qualified business income deduction from Form 8995 or Form 8995-A'),
                                    ],
                                    '','','','form-floating'
                                ),
                            ],
                            '','','','col-md-12'
                        ),
                    ],
                    '','','','row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('14','','class="form-control form-control-sm mb-1"'),
                                        $formBuilder->new_label('14','14. Add lines 12 and 13'),
                                    ],
                                    '','','','form-floating'
                                ),
                            ],
                            '','','','col-md-12'
                        ),
                    ],
                    '','','','row'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_input('15','','class="form-control form-control-sm mb-1"'),
                                        $formBuilder->new_label('15','15. Subtract line 14 from line 11. If zero or less, enter -0-. This is your taxable income'),
                                    ],
                                    '','','','form-floating'
                                ),
                            ],
                            '','','','col-md-12'
                        ),
                    ],
                    '','','','row'
                ),
            ],
            '','','','col-md-10'
        ),
        'separator' => $formBuilder->new_html('hr', '', 'class="mt-2"'),
    ],
    '','','','row d-flex justify-content-center mx-auto w-75 text-start'
),
// Tax and credits
'taxAndCredits' =>
[
    $formBuilder->new_div(
        [
            $formBuilder->new_div(
                [
                    $formBuilder->new_html('h5','Tax and Credits'),
                ],
                '','','','col-md-2'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('16','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('16','16. Tax (see instructions). Check if any from Form(s):'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-6'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('8814', '', 'class="form-check-input" id="8814"'),
                                            $formBuilder->new_label('8814', '8814', 'class="form-check-label"')
                                        ],
                                        '','','','form-check form-check-inline'
                                    ),
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('4972', '', 'class="form-check-input" id="4972"'),
                                            $formBuilder->new_label('4972', '4972', 'class="form-check-label"')
                                        ],
                                        '','','','form-check form-check-inline'
                                    ),
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_div(
                                                [
                                                    $formBuilder->new_checkbox('others', '', 'class="form-check-input" id="others"'),
                                                    $formBuilder->new_label('others', 'Others', 'class="form-check-label"')
                                                ],
                                                '','','','form-check form-check-inline'
                                            ),
                                        ],
                                        '','','','d-flex justify-content-start'
                                    )
                                ],
                                '','','','col-md-6'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('17','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('17','17. Amount from Schedule 2, line 3'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('18','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('18','18. Add lines 16 and 17'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('19','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('19','19. Child tax credit or credit for other dependents from Schedule 8812'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('20','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('20','20. Amount from Schedule 3, line 8'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('21','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('21','21. Add lines 19 and 20'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('22','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('22','22. Subtract line 21 from line 18. If zero or less, enter -0-'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('23','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('23','23. Other taxes, including self-employment tax, from Schedule 2, line 21'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('24','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('24','24. Add lines 22 and 23. This is your total tax'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                ],
                '','','','col-md-10'
            ),
            'separator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),
        ],
        '','','','row d-flex justify-content-center mx-auto w-75 text-start'
    ),
],
// Payments
'payments' =>
[
    $formBuilder->new_div(
        [
            $formBuilder->new_div(
                [
                    $formBuilder->new_html('h5','Payments'),
                ],
                '','','','col-md-2'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    'Federal income tax withheld from:'
                                ],  
                                '','','','form-text'
                            )
                        ], 
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('25a','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('25a','25a. Form(s) W-2'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],  
                                '','','','col-md-3'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('25b','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('25b','25b. Form(s) 1099'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],  
                                '','','','col-md-3'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('25c','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('25c','25c. Other forms (see instructions)'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],  
                                '','','','col-md-3'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('25d','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('25d','25d. Add lines 25a through 25c'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],  
                                '','','','col-md-3'
                            ),
                        ], 
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('26','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('26','26. 2022 estimated tax payments and amount applied from 2021 return'),
                                        ],
                                        '','','','form-floating'
                                    )
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                ],
                '','','','col-md-10'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_html('h6','27. Earned income credit (EIC)')
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_html('p','If you have a qualifying child, attach Sch. EIC')
                        ],
                        '','','','row'
                    ),
                ],
                '','','','col-md-2'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('27','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('27','27. Earned income credit (EIC)'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('28','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('28','28. Additional child tax credit from Schedule 8812'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('29','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('29','29. American opportunity credit from Form 8863, line 8'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('30','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('30','30. Reserved for future use'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('31','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('31','31. Amount from Schedule 3, line 15'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('32','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('32','32. Add lines 27, 28, 29, and 31. These are your total other payments and refundable credits'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('33','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('33','33. Add lines 25d, 26, and 32. These are your total payments'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                ],
                '','','','col-md-10'
            ),
            'separator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),
        ],
        '','','','row d-flex justify-content-center mx-auto w-75 text-start'
    ),
],
// Refund
'refund' =>
[
    $formBuilder->new_div(
        [
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_html('h5','Refund'),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_html('p','Direct deposit? See instructions.'),
                        ],
                        '','','','row'
                    ),
                ],
                '','','','col-md-2'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('34','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('34','34. If line 33 is more than line 24, subtract line 24 from line 33. This is the amount you overpaid'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-12'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('35a','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('35a','35a. Amount of line 34 you want refunded to you.'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-6'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_div(
                                                [
                                                    $formBuilder->new_checkbox('35aCheckbox', '', 'class="form-check-input" id="35aCheckbox"'),
                                                    $formBuilder->new_label('35aCheckbox', 'If Form 8888 is attached, check here', 'class="form-check-label"')
                                                ],
                                                '','','','form-check form-check-reverse'
                                            ),
                                        ],
                                        '','','','d-flex justify-content-end'
                                    ),
                                ],
                                '','','','col-md-6'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('35b','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('35b','35b. Routing Number'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-6'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('35bChecking', '', 'class="form-check-input" id="35bChecking"'),
                                            $formBuilder->new_label('35bChecking', 'Checking', 'class="form-check-label"')
                                        ],
                                        '','','','form-check form-check-inline'
                                    ),
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('35bSavings', '', 'class="form-check-input" id="35bSavings"'),
                                            $formBuilder->new_label('35bSavings', 'Savings', 'class="form-check-label"')
                                        ],
                                        '','','','form-check form-check-inline'
                                    ),
                                ],
                                '','','','col-md-6'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('36','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('36','36. Amount of line 34 you want applied to your 2023 estimated tax'),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],  
                                '','','','col-md-12'
                            ),
                        ],  
                        '','','','row'
                    ),
                ],
                '','','','col-md-10'
            ),
            'separator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),

        ],
        '','','','row d-flex justify-content-center mx-auto w-75 text-start'
    ),
],
// Amount you owe
'amtYouOwe' =>
[
    $formBuilder->new_div(
        [
            $formBuilder->new_div(
                [
                    $formBuilder->new_html('h5','Amount You Owe')
                ],
                '','','','col-md-2'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    'For details on how to pay, go to www.irs.gov/Payments or see instructions'
                                ],
                                '','','','form-text'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_input('37','','class="form-control form-control-sm mb-1"'),
                                    $formBuilder->new_label('37','37. Subtract line 33 from line 24. This is the amount you owe'),
                                ],
                                '','','','form-floating'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_input('38','','class="form-control form-control-sm mb-1"'),
                                    $formBuilder->new_label('38','38. Estimated tax penalty (see instructions)'),
                                ],
                                '','','','form-floating'
                            ),
                        ],
                        '','','','row'
                    ),
                ],
                '','','','col-md-10'
            ),
            'separator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),
        ],
        '','','','row d-flex justify-content-center mx-auto w-75 text-start'
    ),
],
// Third Party Designee
'thirdPartyDesignee' =>
[
    $formBuilder->new_div(
        [
            $formBuilder->new_div(
                [
                    $formBuilder->new_html('h5','Third Party Designee'),
                ],
                '','','','col-md-2'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_html('p','Do you want to allow another person to discuss this return with the IRS? See instructions'),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_checkbox('thirdPartyYes', '', 'class="form-check-input" id="thirdPartyYes"'),
                                    $formBuilder->new_label('thirdPartyYes', 'Yes. Complete below', 'class="form-check-label"')
                                ],
                                '','','','form-check form-check-inline'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_checkbox('thirdPartyNo', '', 'class="form-check-input" id="thirdPartyNo"'),
                                    $formBuilder->new_label('thirdPartyNo', 'No', 'class="form-check-label"')
                                ],
                                '','','','form-check form-check-inline'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('designeeName','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('designeeName',"Designee's Name"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-4'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('phoneNumber','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('phoneNumber',"Phone Number"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-4'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('pin','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('pin',"Personal Identification Number (PIN)"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-4'
                            ),
                        ],
                        '','','','row'
                    ),
                ],
                '','','','col-md-10'
            ),
            'separator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),
        ],
        '','','','row d-flex justify-content-center mx-auto w-75 text-start'
    ),
],
// Sign Here
'sign' =>
[
    $formBuilder->new_div(
        [
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_html('h5','Sign Here'),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_html('p','Joint return? See instructions. Keep a copy for your records.'),
                        ],
                        '','','','row'
                    ),
                ],
                '','','','col-md-2'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            'Under penalties of perjury, I declare that I have examined this return and accompanying schedules and statements, and to the best of my knowledge and belief, they are true, correct, and complete. Declaration of preparer (other than taxpayer) is based on all information of which preparer has any knowledge.',
                        ], 
                        '','','','form-text'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('inputGroupFile02','Your Signature','class="form-control"'),
                                            $formBuilder->new_label('inputGroupFile02','Upload','class="input-group-text"'),
                                        ],
                                        '','','','input-group mb-3'
                                    ),
                                ],
                                '','','','col-md-4'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('date','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('date',"Date"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-2'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('yourOccupation','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('yourOccupation',"Your Occupation"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-3'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('yourIdenProtectPin','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('yourIdenProtectPin',"Your Identity Protection PIN"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-3'
                            ),
                        ],
                        '','','','row mt-3'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('spouseInputGroupFile02','Spouse Signature','class="form-control"'),
                                            $formBuilder->new_label('spouseInputGroupFile02','Upload','class="input-group-text"'),
                                        ],
                                        '','','','input-group mb-3'
                                    ),
                                ],
                                '','','','col-md-4'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('date2','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('date2',"Date"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-2'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('spouseOccupation','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('spouseOccupation',"Spouse Occupation"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-3'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('spouseIdenProtectPin','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('spouseIdenProtectPin',"Spouse's Identity Protection PIN"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-3'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_div(
                                                [
                                                    $formBuilder->new_input('phoneNumber','','class="form-control form-control-sm mb-1"'),
                                                    $formBuilder->new_label('phoneNumber',"Phone Number"),
                                                ],
                                                '','','','form-floating'
                                            ),
                                        ],
                                        '','','','col-md-6'
                                    ),
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_div(
                                                [
                                                    $formBuilder->new_input('email','','class="form-control form-control-sm mb-1"'),
                                                    $formBuilder->new_label('email',"Email"),
                                                ],
                                                '','','','form-floating'
                                            ),
                                        ],
                                        '','','','col-md-6'
                                    ),
                                ],
                                '','','','row'
                            ),
                        ],
                        '','','','row mt-3'
                    ),
                ],
                '','','','col-md-10'
            ),
            'separator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),
        ],
        '','','','row d-flex justify-content-center mx-auto w-75 text-start'
    ),
],
// Paid Preparer Use Only
'paidPreparer' =>
[
    $formBuilder->new_div(
        [
            $formBuilder->new_div(
                [
                    $formBuilder->new_html('h5','Paid Preparer Use Only')
                ],
                '','','','col-md-2'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('prepName','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('prepName',"Preparer's Name"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-3'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('prepSignature','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('prepSignature',"Preparer's Signature"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-3'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('prepDate','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('prepDate',"Date"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-2'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('ptin','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('ptin',"PTIN"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-2'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_checkbox('selfEmployedCheckbox', '', 'class="form-check-input"', true),
                                            $formBuilder->new_label('selfEmployedCheckbox', 'Check if Self-Employed', 'class="form-check-label"'),
                                        ],
                                        '','','','form-check'
                                    ),
                                ],
                                '','','','col-md-2'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('firmName','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('firmName',"Firm's Name"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-8'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('firmPhone','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('firmPhone',"Phone No."),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-4'
                            ),
                        ],
                        '','','','row'
                    ),
                    $formBuilder->new_div(
                        [
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('firmAddress','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('firmAddress',"Firm's Address"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-8'
                            ),
                            $formBuilder->new_div(
                                [
                                    $formBuilder->new_div(
                                        [
                                            $formBuilder->new_input('firmEIN','','class="form-control form-control-sm mb-1"'),
                                            $formBuilder->new_label('firmEIN',"Firm's EIN"),
                                        ],
                                        '','','','form-floating'
                                    ),
                                ],
                                '','','','col-md-4'
                            ),
                        ],
                        '','','','row'
                    ),
                ],
                '','','','col-md-10'
            ),
            'separator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),
        ],
        '','','','row d-flex justify-content-center mx-auto w-75 text-start'
    ),
],
// footer
'footer' =>
[
    $formBuilder->new_div(
        [
            $formBuilder->new_div(
                [
                    $formBuilder->new_html('h6','Go to www.irs.gov/Form1040 for instructions and the latest information.')
                ],
                '','','','col-md-9'
            ),
            $formBuilder->new_div(
                [
                    $formBuilder->new_html('h6','Form 1040 (2022)','class="text-end"')
                ],
                '','','','col-md-3'
            ),
        ],
        '','','','row d-flex justify-content-center mx-auto w-75 text-start'
    ),
],

    'tail' => $formBuilder->form_close(),
];

// $Rules = [
//     'name' => 'required',
//     'message' => 'required',
//     'gender' => 'required'
// ];