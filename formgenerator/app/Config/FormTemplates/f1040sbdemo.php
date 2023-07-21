<?php

// Get an instance of the CustomFormLibrary library
$formBuilder = service('CustomFormLibrary');

$fields = [
    'head' =>  $formBuilder->form_open('/form/70'),
    'title' =>
    [
        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h5', 'SCHEDULE B'),
                            ],
                            '',
                            '',
                            '',
                            'row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h5', 'Form 1040'),
                            ],
                            '',
                            '',
                            '',
                            'row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h7', 'Department of the Treasury Internal Revenue Service'),
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
                    'col-md-2'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h3', 'Interest and Ordinary Dividends'),
                            ],
                            '',
                            '',
                            '',
                            'row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h7', 'Go to www.irs.gov/ScheduleB for instructions and the latest information.'),
                            ],
                            '',
                            '',
                            '',
                            'row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h7', 'Attach to Form 1040 or 1040-SR'),
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
                    'col-md-8 text-center'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h7', 'OMB No. 1545-0074'),
                            ],
                            '',
                            '',
                            '',
                            'row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h7', '2022'),
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
                    'col-md-2 text-center'
                ),
                'seperator' => $formBuilder->new_html('hr', '', 'class="mx-auto mt-2 w-80"'),
            ],
            '',
            '',
            '',
            'row d-flex justify-content-center align-items-end mx-auto w-75 text-start'
        ),
    ],
    // Name
    'name' =>
    [
        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_input('name', '', 'class="form-control form-control-sm" id="name" placeholder="name"'),
                                $formBuilder->new_label('name', 'Name(s) shown on return', 'for="name"'),
                            ],
                            '',
                            '',
                            '',
                            'form-floating'
                        ),
                    ],
                    '',
                    '',
                    '',
                    'col-md-10'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_input('ssn', '', 'class="form-control form-control-sm" id="ssn" placeholder="ssn"'),
                                $formBuilder->new_label('ssn', 'Your Social Security Number', 'for="name"'),
                            ],
                            '',
                            '',
                            '',
                            'form-floating'
                        ),
                    ],
                    '',
                    '',
                    '',
                    'col-md-2 '
                ),
            ],
            '',
            '',
            '',
            'row d-flex justify-content-center align-items-end mx-auto w-75 text-start pb-3'
        ),
    ],

    // Part I: Interest
    'interest' =>
    [
        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h5', 'Part I: Interest'),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('p', '(See instructions and the Instructions for Form 1040, line 2b.)'),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('p', "Note: If you received a Form 1099-INT, Form 1099-OID, or substitute statement from a brokerage firm, list the firm's name as the payer and enter the total interest shown on that form."),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                    ],
                    '',
                    '',
                    '',
                    'col-md-2 text-start'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_label('1', "1. List name of payer. If any interest is from a seller-financed mortgage and thebuyer used the property as a personal residence, see the instructions and list thisinterest first. Also, show that buyer's social security number and address:", 'for="1"'),
                                                $formBuilder->new_textarea('1', '', 'class="form-control" id="1" rows="14"')
                                            ],
                                            '',
                                            '',
                                            '',
                                            'mb-2'
                                        ),
                                    ],
                                    '',
                                    '',
                                    '',
                                    'col-md-12'
                                ),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('2', '', 'class="form-control form-control-sm" id="2" placeholder="2"'),
                                                $formBuilder->new_label('2', '2. Add the amounts on line 1', 'for="2"'),
                                            ],
                                            '',
                                            '',
                                            '',
                                            'form-floating'
                                        ),
                                    ],
                                    '',
                                    '',
                                    '',
                                    'col-md-12'
                                ),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('3', '', 'class="form-control form-control-sm" id="3" placeholder="3"'),
                                                $formBuilder->new_label('3', '3. Excludable interest on series EE and I U.S. savings bonds issued after 1989. Attach Form 8815', 'for="3"'),
                                            ],
                                            '',
                                            '',
                                            '',
                                            'form-floating'
                                        ),
                                    ],
                                    '',
                                    '',
                                    '',
                                    'col-md-12'
                                ),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('4', '', 'class="form-control form-control-sm" id="4" placeholder="4"'),
                                                $formBuilder->new_label('4', '4.  Subtract line 3 from line 2. Enter the result here and on Form 1040 or 1040-SR, line 2b', 'for="4"'),
                                            ],
                                            '',
                                            '',
                                            '',
                                            'form-floating'
                                        ),
                                        $formBuilder->new_div(
                                            [
                                                'Note: If line 4 is over $1,500, you must complete Part III.'
                                            ],
                                            '',
                                            '',
                                            '',
                                            'form-text'
                                        ),
                                    ],
                                    '',
                                    '',
                                    '',
                                    'col-md-12'
                                ),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                    ],
                    '',
                    '',
                    '',
                    'col-md-10'
                ),
                'seperator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),
            ],
            '',
            '',
            '',
            'row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // Part II: Ordinary Dividends
    'ordinaryDividends' =>
    [
        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h5', 'Part II: Ordinary Dividends'),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('p', '(See instructions and the Instructions for Form 1040, line 3b.)'),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('p', "Note: If you received a Form 1099-DIV or substitute statement from a brokerage firm, list the firm's name as the payer and enter the ordinary dividends shown on that form."),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                    ],
                    '',
                    '',
                    '',
                    'col-md-2 text-start'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_label('5', "5. List name of payer", 'for="5"'),
                                                $formBuilder->new_textarea('5', '', 'class="form-control" id="5" rows="14"')
                                            ],
                                            '',
                                            '',
                                            '',
                                            'mb-2'
                                        ),
                                    ],
                                    '',
                                    '',
                                    '',
                                    'col-md-12'
                                ),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('6', '', 'class="form-control form-control-sm" id="6" placeholder="6"'),
                                                $formBuilder->new_label('6', '6. Add the amounts on line 5. Enter the total here and on Form 1040 or 1040-SR, line 3b', 'for="6"'),
                                            ],
                                            '',
                                            '',
                                            '',
                                            'form-floating'
                                        ),
                                        $formBuilder->new_div(
                                            [
                                                'If line 6 is over $1,500, you must complete Part III.'
                                            ],
                                            '',
                                            '',
                                            '',
                                            'form-text'
                                        ),
                                    ],
                                    '',
                                    '',
                                    '',
                                    'col-md-12'
                                ),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                    ],
                    '',
                    '',
                    '',
                    'col-md-10'
                ),
                'seperator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),
            ],
            '',
            '',
            '',
            'row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // Part III: Foreign Accounts and Trusts
    'foreignAccountsAndTrusts' =>
    [
        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h5', 'Part III: Foreign Accounts and Trusts'),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('p', 'Caution: If required, failure to file FinCEN Form 114 may result in substantial penalties. Additionally, you may be required to file Form 8938, Statement of Specified Foreign Financial Assets. See instructions.'),
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
                    'col-md-2 text-start'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_html('p', 'You must complete this part if you (a) had over $1,500 of taxable interest or ordinary dividends; (b) had a foreign account; or (c) received a distribution from, or were a grantor of, or a transferor to, a foreign trust.'),
                                    ],
                                    '',
                                    '',
                                    '',
                                    'col-md-12'
                                ),
                            ],
                            '',
                            '',
                            '',
                            'row'
                        ),
                        'seperator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_html('p', 'a. At any time during 2022, did you have a financial interest in or signature authority over a financialaccount (such as a bank account, securities account, or brokerage account) located in a foreigncountry? See instructions'),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_radio('7a_radio', 'Yes', 'class="form-check-input"', false),
                                                $formBuilder->new_label('7a_radio', 'Yes', 'class="form-check-label"'),
                                            ],
                                            '',
                                            '',
                                            '',
                                            'form-check form-check-inline'
                                        ),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_radio('7a_radio', 'No', 'class="form-check-input"', false),
                                                $formBuilder->new_label('7a_radio', 'No', 'class="form-check-label"'),
                                            ],
                                            '',
                                            '',
                                            '',
                                            'form-check form-check-inline'
                                        ),
                                    ],
                                    '',
                                    '',
                                    '',
                                    'col-md-12'
                                ),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_html('p', 'If “Yes,” are you required to file FinCEN Form 114, Report of Foreign Bank and FinancialAccounts (FBAR), to report that financial interest or signature authority? See FinCEN Form 114 and its instructions for filing requirements and exceptions to those requirements.'),
                                    ],
                                    '',
                                    '',
                                    '',
                                    'col-md-12'
                                ),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('7b', '', 'class="form-control form-control-sm" id="7b" placeholder="7b"'),
                                                $formBuilder->new_label('7b', '7b. If you are required to file FinCEN Form 114, list the name(s) of the foreign country(-ies) where the financial account(s) are located:', 'for="7b"'),
                                            ],
                                            '',
                                            '',
                                            '',
                                            'form-floating'
                                        ),
                                    ],
                                    '',
                                    '',
                                    '',
                                    'col-md-12'
                                ),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_html('p', 'If “Yes,” are you required to file FinCEN Form 114, Report of Foreign Bank and FinancialAccounts (FBAR), to report that financial interest or signature authority? See FinCEN Form 114 and its instructions for filing requirements and exceptions to those requirements.'),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_radio('8_radio', 'Yes', 'class="form-check-input"', false),
                                                $formBuilder->new_label('8_radio', 'Yes', 'class="form-check-label"'),
                                            ],
                                            '',
                                            '',
                                            '',
                                            'form-check form-check-inline'
                                        ),
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_radio('8_radio', 'No', 'class="form-check-input"', false),
                                                $formBuilder->new_label('8_radio', 'No', 'class="form-check-label"'),
                                            ],
                                            '',
                                            '',
                                            '',
                                            'form-check form-check-inline'
                                        ),
                                    ],
                                    '',
                                    '',
                                    '',
                                    'col-md-12'
                                ),
                            ],
                            '',
                            '',
                            '',
                            'row mt-2'
                        ),
                    ],
                    '',
                    '',
                    '',
                    'col-md-10'
                ),
                'seperator' => $formBuilder->new_html('hr', '', 'class="mt-3"'),
            ],
            '',
            '',
            '',
            'row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // footer
    'footer' =>
    [
        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h7', 'For Paperwork Reduction Act Notice, see the Instructions for Form 1040.')
                    ],
                    '',
                    '',
                    '',
                    'col-auto'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h7', 'Cat. No. 17146N')
                    ],
                    '',
                    '',
                    '',
                    'col-auto'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h7', 'Schedule B (Form 1040) 2022', 'class="text-end"')
                    ],
                    '',
                    '',
                    '',
                    'col-auto'
                ),
            ],
            '',
            '',
            '',
            'row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],

    'tail' => $formBuilder->form_close(),
];