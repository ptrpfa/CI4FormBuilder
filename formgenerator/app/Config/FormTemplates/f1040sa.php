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
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h5','SCHEDULE A'),
                            ],
                            '','','','row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h5','Form 1040'),
                            ],
                            '','','','row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h7','Department of the Treasury Internal Revenue Service'),
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
                                $formBuilder->new_html('h3','Itemized Deductions'),
                            ],
                            '','','','row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h7','Go to www.irs.gov/ScheduleA for instructions and the latest information.'),
                            ],
                            '','','','row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h7','Attach to Form 1040 or 1040-SR'),
                            ],
                            '','','','row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h7','Caution: If you are claiming a net qualified disaster loss on Form 4684, see the instructions for line 16.'),
                            ],
                            '','','','row'
                        ),
                    ],
                    '','','','col-md-8 text-center'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h7','OMB No. 1545-0074'),
                            ],
                            '','','','row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h7','2022'),
                            ],
                            '','','','row'
                        ),
                    ],
                    '','','','col-md-2 text-center'
                ),
                'seperator' => $formBuilder->new_html('hr','', 'class="mx-auto mt-2 w-80"'),
            ],
            '','','','row d-flex justify-content-center align-items-end mx-auto w-75 text-start'
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
                                $formBuilder->new_label('name', 'Name(s) shown on Form 1040 or 1040-SR', 'for="name"'),
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
                                $formBuilder->new_input('ssn', '', 'class="form-control form-control-sm" id="ssn" placeholder="ssn"'),
                                $formBuilder->new_label('ssn', 'Your Social Security Number', 'for="name"'),
                            ],
                            '','','','form-floating'
                        ),
                    ],
                    '','','','col-md-2'
                ),
            ],
            '','','','row d-flex justify-content-center align-items-end mx-auto w-75 text-start pb-3'
        ),
    ],
    // Medical and Dental Expenses
    'medicalAndDental' =>
    [
        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h5','Medical and Dental Expenses'),
                    ],
                    '','','','col-md-2 text-start'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('p','Caution: Do not include expenses reimbursed or paid by others.'),
                            ],
                            '','','','row'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('1', '', 'class="form-control form-control-sm" id="1" placeholder="1"'),
                                                $formBuilder->new_label('1', '1. Medical and dental expenses (see instructions)', 'for="1"'),
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
                                                $formBuilder->new_input('2', '', 'class="form-control form-control-sm" id="2" placeholder="2"'),
                                                $formBuilder->new_label('2', '2. Enter amount from Form 1040 or 1040-SR, line 11', 'for="2"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('3', '', 'class="form-control form-control-sm" id="3" placeholder="3"'),
                                                $formBuilder->new_label('3', '3. Multiply line 2 by 7.5% (0.075)', 'for="3"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('4', '', 'class="form-control form-control-sm" id="4" placeholder="4"'),
                                                $formBuilder->new_label('4', '4. Subtract line 3 from line 1. If line 3 is more than line 1, enter -0-', 'for="4"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),
                            ],
                            '','','','row mt-2'
                        ),
                        
                    ],
                    '','','','col-md-10'
                ),
                'seperator' => $formBuilder->new_html('hr','', 'class="mt-3"'),
            ],
            '','','','row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // Taxes You Paid
    'taxesYouPaid' =>
    [
        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h5','Taxes You Paid'),
                    ],
                    '','','','col-md-2 text-start'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('p','5. State and local taxes.'),
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_checkbox('5a', '5a', 'class="form-check-input"', false),
                                                $formBuilder->new_label('5a', '5a. State and local income taxes or general sales taxes. You may include either income taxes or general sales taxes on line 5a, but not both. If you elect to include general sales taxes instead of income taxes, check this box', 'class="form-check-label"'),
                                            ],
                                            '',
                                            '',
                                            '',
                                            'form-check form-check-inline'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),        
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('5b', '', 'class="form-control form-control-sm" id="5b" placeholder="5b"'),
                                                $formBuilder->new_label('5b', '5b. State and local real estate taxes (see instructions)', 'for="5b"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),        
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('5c', '', 'class="form-control form-control-sm" id="5c" placeholder="5c"'),
                                                $formBuilder->new_label('5c', '5c. State and local personal property taxes', 'for="5c"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),        
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('5d', '', 'class="form-control form-control-sm" id="5d" placeholder="5d"'),
                                                $formBuilder->new_label('5d', '5d. Add lines 5a through 5c', 'for="5d"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),        
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('5e', '', 'class="form-control form-control-sm" id="5e" placeholder="5e"'),
                                                $formBuilder->new_label('5e', '5e. Enter the smaller of line 5d or $10,000 ($5,000 if married filing separately)', 'for="5e"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),        
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('6', '', 'class="form-control form-control-sm" id="6" placeholder="6"'),
                                                $formBuilder->new_label('6', '6. Other taxes. List type and amount:', 'for="6"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),        
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('7', '', 'class="form-control form-control-sm" id="7" placeholder="7"'),
                                                $formBuilder->new_label('7', '7. Add lines 5e and 6', 'for="7"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),        
                            ],
                            '','','','row mt-2'
                        ),
                    ],
                    '','','','col-md-10'
                ),
                'seperator' => $formBuilder->new_html('hr','', 'class="mt-3"'),
            ],
            '','','','row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // Interest You Paid
   'interest' =>
    [
        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h5','Interest You Paid'),
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('p','Caution: Your mortgage interest deduction may be limited. See instructions.'),
                            ],
                            '','','','row mt-2'
                        ),
                    ],
                    '','','','col-md-2 text-start'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_checkbox('8', '8', 'class="form-check-input"', false),
                                                $formBuilder->new_label('8', "Home mortgage interest and points. If you didn't use all of your homemortgage loan(s) to buy, build, or improve your home, see instructions and check this box", 'class="form-check-label"'),
                                            ],
                                            '',
                                            '',
                                            '',
                                            'form-check form-check-inline'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('8a', '', 'class="form-control form-control-sm" id="8a" placeholder="8a"'),
                                                $formBuilder->new_label('8a', '8a. Home mortgage interest and points reported to you on Form 1098. See instructions if limited', 'for="8a"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),        
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('8b', '', 'class="form-control form-control-sm" id="8b" placeholder="8b"'),
                                                $formBuilder->new_label('8b', "8b. Home mortgage interest not reported to you on Form 1098. See instructions if limited. If paid to the person from whom you bought thehome, see instructions and show that person's name, identifying no., and address", 'for="8b"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),        
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('8b', '', 'class="form-control form-control-sm" id="8b" placeholder="8b"'),
                                                $formBuilder->new_label('8b', "8b. Home mortgage interest not reported to you on Form 1098. See instructions if limited. If paid to the person from whom you bought thehome, see instructions and show that person's name, identifying no., and address", 'for="8b"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),        
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('8c', '', 'class="form-control form-control-sm" id="8c" placeholder="8c"'),
                                                $formBuilder->new_label('8c', "8c. Points not reported to you on Form 1098. See instructions for special rules", 'for="8c"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),        
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('8d', '', 'class="form-control form-control-sm" id="8d" placeholder="8d"'),
                                                $formBuilder->new_label('8d', "8d. Reserved for future use", 'for="8d"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),        
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('8e', '', 'class="form-control form-control-sm" id="8e" placeholder="8e"'),
                                                $formBuilder->new_label('8e', "8e. Add lines 8a through 8c", 'for="8e"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),        
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('9', '', 'class="form-control form-control-sm" id="9" placeholder="9"'),
                                                $formBuilder->new_label('9', "9. Investment interest. Attach Form 4952 if required. See instructions", 'for="9"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),        
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('10', '', 'class="form-control form-control-sm" id="10" placeholder="10"'),
                                                $formBuilder->new_label('10', "10. Add lines 8e and 9", 'for="10"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),        
                            ],
                            '','','','row mt-2'
                        ),
                    ],
                    '','','','col-md-10'
                ),
                'seperator' => $formBuilder->new_html('hr','', 'class="mt-3"'),
            ],
            '','','','row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // Gifts To Charity
    'giftsToCharity' =>
    [
        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('h5','Gifts To Charity'),
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_html('p','Caution: If you made a gift and got a benefit for it, see instructions'),
                            ],
                            '','','','row mt-2'
                        ),
                    ],
                    '','','','col-md-2 text-start'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('11', '', 'class="form-control form-control-sm" id="11" placeholder="11"'),
                                                $formBuilder->new_label('11', "11. Gifts by cash or check. If you made any gift of $250 or more, see instructions", 'for="11"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('12', '', 'class="form-control form-control-sm" id="12" placeholder="12"'),
                                                $formBuilder->new_label('12', "12. Other than by cash or check. If you made any gift of $250 or more, see instructions. You must attach Form 8283 if over $500", 'for="12"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('13', '', 'class="form-control form-control-sm" id="13" placeholder="13"'),
                                                $formBuilder->new_label('13', "13. Carryover from prior year", 'for="13"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('14', '', 'class="form-control form-control-sm" id="14" placeholder="14"'),
                                                $formBuilder->new_label('14', "14. Add lines 11 through 13", 'for="14"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),
                            ],
                            '','','','row mt-2'
                        ),
                    ],
                    '','','','col-md-10'
                ),
                'seperator' => $formBuilder->new_html('hr','', 'class="mt-3"'),
            ],
            '','','','row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // Casualty and Theft Losses
    'casualtyAndTheftLosses' =>
    [
        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h5','Casualty and Theft Losses'),
                    ],
                    '','','','col-md-2 text-start'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('15', '', 'class="form-control form-control-sm" id="15" placeholder="15"'),
                                                $formBuilder->new_label('15', "15. Casualty and theft loss(es) from a federally declared disaster (other than net qualified disaster losses). Attach Form 4684 and enter the amount from line 18 of that form. See instructions", 'for="15"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),
                            ],
                            '','','','row mt-2'
                        ),
                    ],
                    '','','','col-md-10'
                ),
                'seperator' => $formBuilder->new_html('hr','', 'class="mt-3"'),
            ],
            '','','','row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // Other Itemized Deductions
    'otherItemizedDeductions' =>
    [
        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h5','Other Itemized Deductions'),
                    ],
                    '','','','col-md-2 text-start'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('16', '', 'class="form-control form-control-sm" id="16" placeholder="16"'),
                                                $formBuilder->new_label('16', "16. Other—from list in instructions. List type and amount:", 'for="16"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),
                            ],
                            '','','','row mt-2'
                        ),
                    ],
                    '','','','col-md-10'
                ),
                'seperator' => $formBuilder->new_html('hr','', 'class="mt-3"'),
            ],
            '','','','row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],
    // Total Itemized Deductions
    'totalItemizedDeductions' =>
    [
        $formBuilder->new_div(
            [
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h5','Total Itemized Deductions'),
                    ],
                    '','','','col-md-2 text-start'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_div(
                                    [
                                        $formBuilder->new_div(
                                            [
                                                $formBuilder->new_input('17', '', 'class="form-control form-control-sm" id="17" placeholder="17"'),
                                                $formBuilder->new_label('17', "17. Add the amounts in the far right column for lines 4 through 16. Also, enter this amount on Form 1040 or 1040-SR, line 12", 'for="17"'),
                                            ],
                                            '','','','form-floating'
                                        ),
                                    ],
                                    '','','','col-md-12'
                                ),
                            ],
                            '','','','row mt-2'
                        ),
                        $formBuilder->new_div(
                            [
                                $formBuilder->new_checkbox('18', '18', 'class="form-check-input"', false),
                                $formBuilder->new_label('18', '18. If you elect to itemize deductions even though they are less than your standard deduction, check this box', 'class="form-check-label"'),
                            ],
                            '',
                            '',
                            '',
                            'form-check form-check-inline'
                        ),
                    ],
                    '','','','col-md-10'
                ),
                'seperator' => $formBuilder->new_html('hr','', 'class="mt-3"'),
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
                        $formBuilder->new_html('h7','For Paperwork Reduction Act Notice, see the Instructions for Form 1040.')
                    ],
                    '','','','col-auto'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h7','Cat. No. 17145C')
                    ],
                    '','','','col-auto'
                ),
                $formBuilder->new_div(
                    [
                        $formBuilder->new_html('h7','Schedule A (Form 1040) 2022','class="text-end"')
                    ],
                    '','','','col-auto'
                ),
            ],
            '','','','row d-flex justify-content-center mx-auto w-75 text-start'
        ),
    ],

        'tail' => $formBuilder->form_close(),
];