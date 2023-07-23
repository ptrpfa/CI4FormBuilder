<h4 class="my-4 text-center"><?= esc($title) ?></h4>

<!-- Header -->
<div class="row d-flex justify-content-center align-items-end mx-auto w-75 text-start">
    <div class="col-md-2">
        <div class="row">
            <h5>SCHEDULE A</h5>
        </div>
        <div class="row">
            <h5>Form 1040</h5>
        </div>
        <div class="row">
            <h7>Department of the Treasury Internal Revenue Service</h7>
        </div>
    </div>

    <div class="col-md-8 text-center">
        <div class="row">
            <h3>Itemized Deductions</h3>
        </div>
        <div class="row">
            <h7>Go to www.irs.gov/ScheduleA for instructions and the latest information.</h7>
        </div>
        <div class="row">
            <h7>Attach to Form 1040 or 1040-SR</h7>
        </div>
        <div class="row">
            <h7>Caution: If you are claiming a net qualified disaster loss on Form 4684, see the instructions for line 16.</h7>
        </div>
    </div>
    <div class="col-md-2 text-center">
        <div class="row">
            <h7>OMB No. 1545-0074</h7>
        </div>
        <div class="row">
            <h2>2022</h2>
        </div> 
    </div>
    <hr class="mx-auto mt-2 w-80">
</div>
<!-- Name -->
<div class="row d-flex justify-content-center align-items-end mx-auto w-75 text-start">
    <div class="col-md-10">
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm mb-1" id="name" placeholder="name">
            <label for="name">Name(s) shown on return</label>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm mb-1" id="ssn" placeholder="ssn">
            <label for="ssn">Your Social Security Number</label>
        </div>
    </div>
    <hr class="mx-auto mt-2 w-80">
</div>
<!-- Medical and Dental Expenses -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <h5>Medical and Dental Expenses</h5>
    </div>
    <div class="col-md-10">
        <div class="row">
            <p>Caution: Do not include expenses reimbursed or paid by others.</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="1" placeholder="1">
                    <label for="1">1. Medical and dental expenses (see instructions)</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="2" placeholder="2">
                    <label for="2">2. Enter amount from Form 1040 or 1040-SR, line 11</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="3" placeholder="3">
                    <label for="3">3. Multiply line 2 by 7.5% (0.075)</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="4" placeholder="4">
                    <label for="4">4. Subtract line 3 from line 1. If line 3 is more than line 1, enter -0-</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Taxes You Paid -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <h5>Taxes You Paid</h5>
    </div>
    <div class="col-md-10">
        <div class="row">
            <p>5. State and local taxes.</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-check form-check-inline form-check-reverse">
                    <input class="form-check-input" type="checkbox" value="" id="5a">
                    <label class="form-check-label" for="5a">
                        5a. State and local income taxes or general sales taxes. You may include either income taxes or general sales taxes on line 5a, but not both. If you elect to include general sales taxes instead of income taxes, check this box
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="5b" placeholder="5b">
                    <label for="5b">5b.  State and local real estate taxes (see instructions)</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="5c" placeholder="5c">
                    <label for="5c">5c. State and local personal property taxes</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="5d" placeholder="5d">
                    <label for="5d">5d. Add lines 5a through 5c</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="5e" placeholder="5e">
                    <label for="5e">5e. Enter the smaller of line 5d or $10,000 ($5,000 if married filing separately)</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="6" placeholder="6">
                    <label for="6">6. Other taxes. List type and amount:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="7" placeholder="7">
                    <label for="7">7. Add lines 5e and 6</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">

</div>
<!-- Interest You Paid -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <div class="row">
            <h5>Interest You Paid</h5>
        </div>
        <div class="row">
            <p>Caution: Your mortgage interest deduction may be limited. See instructions.</p>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="form-check form-check-inline form-check-reverse">
                    <input class="form-check-input" type="checkbox" value="" id="8">
                    <label class="form-check-label" for="8">
                        8. Home mortgage interest and points. If you didn't use all of your homemortgage loan(s) to buy, build, or improve your home, see instructions and check this box
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="8a" placeholder="8a">
                    <label for="8a">8a. Home mortgage interest and points reported to you on Form 1098. See instructions if limited</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="8b" placeholder="8b">
                    <label for="8b">8b. Home mortgage interest not reported to you on Form 1098. See instructions if limited. If paid to the person from whom you bought thehome, see instructions and show that person's name, identifying no., and address</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="8c" placeholder="8c">
                    <label for="8c">8c. Points not reported to you on Form 1098. See instructions for special rules</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="8d" placeholder="8d">
                    <label for="8d">8d. Reserved for future use</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="8e" placeholder="8e">
                    <label for="8e">8e. Add lines 8a through 8c</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="9" placeholder="9">
                    <label for="9">9. Investment interest. Attach Form 4952 if required. See instructions</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="10" placeholder="10">
                    <label for="10">10.  Add lines 8e and 9</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Gifts to Charity -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <div class="row">
            <h5>Gifts to Charity</h5>
        </div>
        <div class="row">
            <p>Caution: If you made a gift and got a benefit for it, see instructions</p>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="11" placeholder="11">
                    <label for="11">11. Gifts by cash or check. If you made any gift of $250 or more, see instructions</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="12" placeholder="12">
                    <label for="12">Other than by cash or check. If you made any gift of $250 or more, see instructions. You must attach Form 8283 if over $500</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="13" placeholder="13">
                    <label for="13">13.  Carryover from prior year</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="14" placeholder="14">
                    <label for="14">14.  Add lines 11 through 13</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">

</div>
<!-- Casualty and Theft Losses -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <h5>Casualty and Theft Losses</h5>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="15" placeholder="15">
                    <label for="15">15. Casualty and theft loss(es) from a federally declared disaster (other than net qualified disaster losses). Attach Form 4684 and enter the amount from line 18 of that form. See instructions</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Other Itemized deductions -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <h5>Other Itemized Deductions</h5>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="16" placeholder="16">
                    <label for="16">16. Other—from list in instructions. List type and amount:</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Total Itemized Deductions -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <h5>Total Itemized Deductions</h5>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="17" placeholder="17">
                    <label for="17">17. Add the amounts in the far right column for lines 4 through 16. Also, enter this amount on Form 1040 or 1040-SR, line 12</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" id="18">
                <label class="form-check-label" for="18">
                    18. If you elect to itemize deductions even though they are less than your standard deduction, check this box
                </label>
            </div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Footer -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-auto">
        <h7>For Paperwork Reduction Act Notice, see the Instructions for Form 1040.</h7>
    </div>
    <div class="col-auto">
        <h7>Cat. No. 17145C</h7>
    </div>
    <div class="col-auto">
        <h7>Schedule A (Form 1040) 2022</h7>
    </div>
</div>
