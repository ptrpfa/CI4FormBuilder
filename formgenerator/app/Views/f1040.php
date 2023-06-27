<h4 class="my-4 text-center"><?= esc($title) ?></h4>

<div class="row d-flex justify-content-center align-items-end mx-auto w-75 text-start">
    <div class="col col-auto">
        <h1>Form 1040</h1>
    </div>

    <div class="col col-auto">
        <div class="row">
            <h6>Department of the Treasury - Internal Revenue Service</h6>
        </div>
        <div class="row">
            <h2>U.S. Individual Income Tax Return</h2>
        </div>
    </div>
    <div class="col col-auto">
        <h2>2022</h2>
    </div>
    <div class="col col-auto">
        <h6>OMB No. 1545-0074</h6>
    </div>   
    <div class="col col-auto">
        <h6>IRS Use Only - Do not write or staple in this space.</h6>
    </div>   
    <hr class="mx-auto mt-2 w-80">
</div>

<!-- Maritial Status / Filing Status -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    
    <div class="col col-auto align-items-start mx-1">
        <div class="row align-items-start">
            <h5>Filing Status</h5>
        </div>
        <div class="row">
            <p>Check only one box.</p>
        </div>
    </div>

    <div class="col col-md-8">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Single
            </label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Married filing jointly
            </label>
        </div>


        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Married filing seperately (MFS)
            </label>
        </div>


        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Head of Household (HOH)
            </label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Qualifying surviving spouse (QSS)
            </label>
        </div>

        <div class="row w-auto">
            <p>If you checked the MFS box, enter the name of your spouse. If you checked the HOH or QSS box, enter the child's name if the qualifying person is a child but not your dependent:</p>
            <input class="form-control form-control-sm w-75" type="text" aria-label="child name">
        </div>
    </div>
    <hr class="mx-auto mt-3">
</div>
<!-- First name and middle initial, last name, Social Security Number -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col col-md-4">
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm" id="floatingInput" placeholder="Your First name and Middle initial">
            <label for="floatingInput">Your First name and Middle initial</label>
        </div>
    </div>
    <div class="col col-md-4">
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm" id="floatingInput" placeholder="Last Name">
            <label for="floatingInput">Last Name</label>
        </div>
    </div>
    <div class="col col-md-4">
    <div class="form-floating">
            <input type="text" class="form-control form-control-sm" id="floatingInput" placeholder="Your Social Security Number">
            <label for="floatingInput">Your Social Security Number</label>
        </div>
    </div>

    <hr class="mx-auto mt-3">
</div>
<!-- Spouse First name and middle initial, last name, Social Security Number -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="row">
        <div class="form-text">If Joint Return:</div>   
    </div>
    <div class="col col-md-4">
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm" id="floatingInput" placeholder="Spouse's First name and Middle initial">
            <label for="floatingInput">Spouse's First name and Middle initial</label>
        </div>
    </div>
    <div class="col col-md-4">
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm" id="floatingInput" placeholder="Last Name">
            <label for="floatingInput">Last Name</label>
        </div>
    </div>
    <div class="col col-md-4">
    <div class="form-floating">
            <input type="text" class="form-control form-control-sm" id="floatingInput" placeholder="Spouse's Social Security Number">
            <label for="floatingInput">Spouse's Social Security Number</label>
        </div>
    </div>
    <hr class="mx-auto mt-3">
</div>
<!-- Home Address -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-10">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="floatingInput" placeholder="Home address">
                    <label for="floatingInput">Home address (number and street). If you have a P.O. box, see instructions.</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="floatingInputApt" placeholder="apt no">
                    <label for="floatingInputApt">Apt no.</label>
                </div>
            </div>
        </div>
        <hr class="mt-3">
        <!-- City Town / Post Office , State, ZIP code -->
        <div class="row">
            <div class="col-md-8">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="floatingInput" placeholder="city">
                    <label for="floatingInput">City, town, or post office.</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="floatingInputApt" placeholder="state">
                    <label for="floatingInputApt">State</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="floatingInputApt" placeholder="zip">
                    <label for="floatingInputApt">ZIP Code</label>
                </div>
            </div>
        </div>
        <hr class="mt-3">
        <!-- Foreign Country Name / State / Postal Code -->
        <div class="row">
            <div class="form-text">If you have a foreign address, also complete spaces below:</div>   
        </div>
        
        <div class="row">
            <div class="col-md-5">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="floatingInput" placeholder="foreign country">
                    <label for="floatingInput">Foreign Country Name</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="floatingInputApt" placeholder="Foreign province/state/county">
                    <label for="floatingInputApt">Foreign province/state/county</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="floatingInputApt" placeholder="Foreign postal code">
                    <label for="floatingInputApt">Foreign postal code</label>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Card for Presidential Election Campaign -->
    <div class="col-md-3">
        <div class="card py-3">
            <div class="card-body">
                <h6 class="card-title">Presidential Election Campaign</h6>
                <p class="card-text">Check here if you, or your filing jointly, want $3 to go to this fund. Checking a box below will not change your tax or refund. </p>
                <div class="form-check form-check-inline pt-3">
                    <input class="form-check-input" type="checkbox" value="" id="you">
                    <label class="form-check-label" for="you">
                        You
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="spouse">
                    <label class="form-check-label" for="spouse">
                        Spouse
                    </label>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Digital assets -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <h5>Digital Assets</h5>
    </div>
    <div class="col-md-8">
        <p>At any time during 2022, did you: (a) receive (as a reward, award, or payment for property or services); or (b) sell, exchange, gift, or otherwise dispose of a digital asset (or a financial interest in a digital asset)? (See instructions.)</p>
    </div>
    <div class="col-md-2">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" id="yes">
            <label class="form-check-label" for="yes">
                Yes
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" id="no">
            <label class="form-check-label" for="no">
                No
            </label>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Standard Deduction -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <h5>Standard Deduction</h5>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="form-text">Someone can claim:</div> 
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" id="dependent">
            <label class="form-check-label" for="dependent">
                You as a dependent
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" id="spouse dependent">
            <label class="form-check-label" for="spouse dependent">
                Your spouse as a dependent
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" id="Spouse itemizes">
            <label class="form-check-label" for="spouse itemizes">
                Spouse itemizes on a separate return or you were a dual-status alien
            </label>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Age/Blindness -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <h5>Age/Blindness</h5>
    </div>
    <div class="col-md-5">
        <div class="form-text">You:</div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" id="you born">
            <label class="form-check-label" for="you born">
                were born before January 2, 1958
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" id="you blind">
            <label class="form-check-label" for="you blind">
                Are blind
            </label>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-text">Spouse:</div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" id="spouse born">
            <label class="form-check-label" for="spouse born">
                was born before January 2, 1958
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" id="spouse blind">
            <label class="form-check-label" for="spouse blind">
                Is blind
            </label>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Dependents -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <div class="row">
            <h5>Dependents</h5>
        </div>
        <div class="row">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" id="four dependents">
                <label class="form-check-label" for="four dependents">
                    If more than four dependents, see instructions and check here 
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="form-text">(see instructions):</div>
        </div>
        <div class="input-group pb-1">
            <input type="text" aria-label="First name" class="form-control" placeholder="First name">
            <input type="text" aria-label="Last name" class="form-control" placeholder="Last name">
            <input type="text" aria-label="SSN" class="form-control" placeholder="Social Security Number">
            <input type="text" aria-label="relationship" class="form-control" placeholder="Relationship to you">
            <div class="form-check form-check-reverse mx-2">
                <input class="form-check-input" type="checkbox" value="" id="child tax credit">
                <label class="form-check-label" for="child tax credit">
                    Child tax credit
                </label>
            </div>
            <div class="form-check form-check-reverse mx-2">
                <input class="form-check-input" type="checkbox" value="" id="credit other">
                <label class="form-check-label" for="credit other">
                    Credit for other dependents
                </label>
            </div>
        </div>
        <div class="input-group pb-1">
            <input type="text" aria-label="First name" class="form-control" placeholder="First name">
            <input type="text" aria-label="Last name" class="form-control" placeholder="Last name">
            <input type="text" aria-label="SSN" class="form-control" placeholder="Social Security Number">
            <input type="text" aria-label="relationship" class="form-control" placeholder="Relationship to you">
            <div class="form-check form-check-reverse mx-2">
                <input class="form-check-input" type="checkbox" value="" id="child tax credit">
                <label class="form-check-label" for="child tax credit">
                    Child tax credit
                </label>
            </div>
            <div class="form-check form-check-reverse mx-2">
                <input class="form-check-input" type="checkbox" value="" id="credit other">
                <label class="form-check-label" for="credit other">
                    Credit for other dependents
                </label>
            </div>
        </div>
        <div class="input-group pb-1">
            <input type="text" aria-label="First name" class="form-control" placeholder="First name">
            <input type="text" aria-label="Last name" class="form-control" placeholder="Last name">
            <input type="text" aria-label="SSN" class="form-control" placeholder="Social Security Number">
            <input type="text" aria-label="relationship" class="form-control" placeholder="Relationship to you">
            <div class="form-check form-check-reverse mx-2">
                <input class="form-check-input" type="checkbox" value="" id="child tax credit">
                <label class="form-check-label" for="child tax credit">
                    Child tax credit
                </label>
            </div>
            <div class="form-check form-check-reverse mx-2">
                <input class="form-check-input" type="checkbox" value="" id="credit other">
                <label class="form-check-label" for="credit other">
                    Credit for other dependents
                </label>
            </div>
        </div>
        <div class="input-group">
            <input type="text" aria-label="First name" class="form-control" placeholder="First name">
            <input type="text" aria-label="Last name" class="form-control" placeholder="Last name">
            <input type="text" aria-label="SSN" class="form-control" placeholder="Social Security Number">
            <input type="text" aria-label="relationship" class="form-control" placeholder="Relationship to you">
            <div class="form-check form-check-reverse mx-2">
                <input class="form-check-input" type="checkbox" value="" id="child tax credit">
                <label class="form-check-label" for="child tax credit">
                    Child tax credit
                </label>
            </div>
            <div class="form-check form-check-reverse mx-2">
                <input class="form-check-input" type="checkbox" value="" id="credit other">
                <label class="form-check-label" for="credit other">
                    Credit for other dependents
                </label>
            </div>
        </div>
    </div>
<hr class="mt-3">
</div>
<!-- Income -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <div class="row">
            <h5>Income</h5>
        </div>
        <div class="row">
            <p>Attach Form(s) W-2 here. Also attach Forms W-2G and 1099-R if tax was withheld. If you did not get a Form W-2, see instructions.</p>
        </div>
    </div>
    <div class="col-md-10">
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1a">
            <label for="floatingInput">1a. Total amount from Form(s) W-2, box 1 (see instructions)</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1b">
            <label for="floatingInput">1b. Household employee wages not reported on Form(s) W-2</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1c">
            <label for="floatingInput">1c. Tip income not reported on line 1a (see instructions)</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1d">
            <label for="floatingInput">1d. Medicaid waiver payments not reported on Form(s) W-2 (see instructions)</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1e">
            <label for="floatingInput">1e. Taxable dependent care benefits from Form 2441, line 26</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1f">
            <label for="floatingInput">1f. Employer-provided adoption benefits from Form 8839, line 29</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1g">
            <label for="floatingInput">1g. Wages from Form 8919, line 6</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1h">
            <label for="floatingInput">1h. Other earned income (see instructions)</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1i">
            <label for="floatingInput">1i. Nontaxable combat pay election (see instructions)</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control form-control-sm mb-1" id="floatingInput" placeholder="1z">
            <label for="floatingInput">1z. Add lines 1a through 1h</label>
        </div>
    </div>
</div>
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <p>Attach Sch. B if required</p>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="2a" placeholder="2a">
                    <label for="2a">2a. Tax-exempt interest</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="2b" placeholder="2b">
                    <label for="2b">2b. Taxable interest</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="3a" placeholder="3a">
                    <label for="3a">3a. Qualified dividends</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="3b" placeholder="3b">
                    <label for="3b">3b. Ordinary dividends</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="4a" placeholder="4a">
                    <label for="4a">4a. IRA distributions</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="4b" placeholder="4b">
                    <label for="4b">4b. Taxable amount</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="5a" placeholder="5a">
                    <label for="5a">5a. Pensions and annuities</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="5b" placeholder="5b">
                    <label for="5b">5b. Taxable amount</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="6a" placeholder="6a">
                    <label for="6a">6a. Social security benefits</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="6b" placeholder="6b">
                    <label for="6b">6b. Taxable amount</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check form-check-reverse">
                    <input class="form-check-input" type="checkbox" value="" id="6c">
                    <label class="form-check-label" for="6c">
                        6c. If you elect to use the lump-sum election method, check here
                    </label>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-10">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="7" placeholder="7">
                    <label for="7">7. Capital gain or (loss). Attach Schedule D if required.</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check form-check-reverse">
                    <input class="form-check-input" type="checkbox" value="" id="7">
                    <label class="form-check-label" for="7">
                        If not required, check here
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="8" placeholder="8">
                    <label for="8">8. Other income from Schedule 1, line 10</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="9" placeholder="9">
                    <label for="9">9. Other income from Schedule 1, line 10</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="10" placeholder="10">
                    <label for="10">10. Other income from Schedule 1, line 10</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="11" placeholder="11">
                    <label for="11">11. Other income from Schedule 1, line 10</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <h6>12. Standard Deduction for</h6> 
        <ul class="list-group">
            <li class="list-group-item">Single or Married filing separately, $12,950 jointly or Qualifying surviving spouse, $25,900</li>
            <li class="list-group-item">Head of household, $19,400</li>
            <li class="list-group-item">If you checked any box under Standard Deduction, see instructions</li>
        </ul>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="12" placeholder="12">
                    <label for="12">12. Standard deduction or itemized deductions (from Schedule A)</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="13" placeholder="13">
                    <label for="13">13. Qualified business income deduction from Form 8995 or Form 8995-A</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="14" placeholder="14">
                    <label for="14">14. Add lines 12 and 13</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="15" placeholder="15">
                    <label for="15">15. Subtract line 14 from line 11. If zero or less, enter -0-. This is your taxable income</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Tax and Credits -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <h5>Tax and Credits</h5>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="16" placeholder="16">
                    <label for="16">16. Tax (see instructions). Check if any from Form(s):</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        8814
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        4972
                    </label>
                </div>
                <div class="d-flex justify-content-start">
                    <div class="form-check form-check-inline text-center">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <input class="form-control form-control-sm" type="text" placeholder="Others" aria-label="others">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="17" placeholder="17">
                    <label for="17">17. Amount from Schedule 2, line 3</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="18" placeholder="18">
                    <label for="18">18. Add lines 16 and 17</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="19" placeholder="19">
                    <label for="19">19. Child tax credit or credit for other dependents from Schedule 8812</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="20" placeholder="20">
                    <label for="20">20. Amount from Schedule 3, line 8</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="21" placeholder="21">
                    <label for="21">21. Add lines 19 and 20</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="22" placeholder="22">
                    <label for="22">22. Subtract line 21 from line 18. If zero or less, enter -0-</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="23" placeholder="23">
                    <label for="23">23. Other taxes, including self-employment tax, from Schedule 2, line 21</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="24" placeholder="24">
                    <label for="24">24. Add lines 22 and 23. This is your total tax</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Payments -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <h5>Payments</h5>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="form-text">Federal income tax withheld from:</div>   
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="25a" placeholder="25a">
                    <label for="25a">25a. Form(s) W-2</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="25b" placeholder="25b">
                    <label for="25b">25b. Form(s) 1099</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="25c" placeholder="25c">
                    <label for="25c">25c. Other forms (see instructions)</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="25d" placeholder="25d">
                    <label for="25d">25d. Add lines 25a through 25c</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="26" placeholder="26">
                    <label for="26">26. 2022 estimated tax payments and amount applied from 2021 return</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="row">
            <h6>27. Earned income credit (EIC)</h6>
        </div>
        <div class="row">
        <p>If you have a qualifying child, attach Sch. EIC</p>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="27" placeholder="27">
                    <label for="27">27. Earned income credit (EIC)</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="28" placeholder="28">
                    <label for="28">28. Additional child tax credit from Schedule 8812</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="29" placeholder="29">
                    <label for="29">29. American opportunity credit from Form 8863, line 8</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="30" placeholder="30">
                    <label for="30">30. Reserved for future use</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="31" placeholder="31">
                    <label for="31">31. Amount from Schedule 3, line 15</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="32" placeholder="32">
                    <label for="32">32. Add lines 27, 28, 29, and 31. These are your total other payments and refundable credits</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="33" placeholder="33">
                    <label for="33">33. Add lines 25d, 26, and 32. These are your total payments</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Refund -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <div class="row">
            <h5>Refund</h5>
        </div>
        <div class="row">
            <p>Direct deposit? See instructions.</p>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="34" placeholder="34">
                    <label for="34">34. If line 33 is more than line 24, subtract line 24 from line 33. This is the amount you overpaid</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="35a" placeholder="35a">
                    <label for="35a">35a. Amount of line 34 you want refunded to you.</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end">
                    <div class="form-check form-check-reverse">
                        <input class="form-check-input" type="checkbox" value="" id="35a">
                        <label class="form-check-label" for="35a">
                            If Form 8888 is attached, check here
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="35b" placeholder="35b">
                    <label for="35b">35b. Routing Number</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Checking
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Savings
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="35d" placeholder="35d">
                    <label for="35d">35d. Account Number</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="36" placeholder="36">
                    <label for="36">36. Amount of line 34 you want applied to your 2023 estimated tax</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Amount You Owe -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <h5>Amount You Owe</h5>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="form-text">For details on how to pay, go to www.irs.gov/Payments or see instructions</div>
            <div class="form-floating">
                <input type="text" class="form-control form-control-sm mb-1" id="37" placeholder="37">
                <label for="37">37. Subtract line 33 from line 24. This is the amount you owe</label>
            </div>
        </div>
        <div class="row">
            <div class="form-floating">
                <input type="text" class="form-control form-control-sm mb-1" id="38" placeholder="38">
                <label for="38">38. Estimated tax penalty (see instructions)</label>
            </div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Third Party Designee -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <h5>Third Party Designee</h5>        
    </div>
    <div class="col-md-10">
        <div class="row">
            <p>Do you want to allow another person to discuss this return with the IRS? See instructions</p>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Yes. Complete below
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    No
                </label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="designee" placeholder="designee">
                    <label for="designee">Designee's Name</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="PhoneNumber" placeholder="PhoneNumber">
                    <label for="PhoneNumber">Phone Number</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="pin" placeholder="pin">
                    <label for="pin">Personal Identification Number (PIN)</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Sign Here -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <div class="row">
            <h5>Sign Here</h5>
        </div>
        <div class="row">
            <p>Joint return? See instructions. Keep a copy for your records.</p>
        </div>
    </div>
    <div class="col-md-10">
        <div class="form-text">Under penalties of perjury, I declare that I have examined this return and accompanying schedules and statements, and to the best of my knowledge and belief, they are true, correct, and complete. Declaration of preparer (other than taxpayer) is based on all information of which preparer has any knowledge.</div>
        <div class="row mt-3">
            <div class="col-md-5">
                <div class="form-text">Upload your signature below:</div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="Date" placeholder="Date">
                    <label for="Date">Date</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="yourOccupation" placeholder="Your Occupation">
                    <label for="yourOccupation">Your Occupation</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <div class="form-text">f the IRS sent you an Identity Protection PIN, enter it here</div>
                    <input type="text" class="form-control form-control-sm mb-1" id="idenProtectPin" placeholder="">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-5">
                <div class="form-text">Spouse signature. If a joint return, both must sign.</div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="Date" placeholder="Date">
                    <label for="Date">Date</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="spouseOccupation" placeholder="Spouse Occupation">
                    <label for="spouseOccupation">Spouse Occupation</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <div class="form-text">f the IRS sent you an Identity Protection PIN, enter it here</div>
                    <input type="text" class="form-control form-control-sm mb-1" id="idenProtectPin" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-sm mb-1" id="phoneNumber" placeholder="Phone Number">
                        <label for="phoneNumber">Phone Number</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-sm mb-1" id="email" placeholder="Email Address">
                        <label for="email">Email Address</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Paid Preparer Use Only -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <h5>Paid Preparer Use Only
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="prepName" placeholder="Preparer's Name">
                    <label for="prepName">Preparer's Name</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="prepSign" placeholder="Preparer's Signature">
                    <label for="prepSign">Preparer's Signature</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="date" placeholder="Date">
                    <label for="date">Date</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="ptin" placeholder="PTIN">
                    <label for="ptin">PTIN</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Check if Self-Employed
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="firmName" placeholder="Firm's name">
                    <label for="firmName">Firm's Name</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="phoneNumber" placeholder="Phone No.">
                    <label for="phoneNumber">Phone No.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="firmAddress" placeholder="Firm's Address">
                    <label for="firmAddress">Firm's Address</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm mb-1" id="firmEIN" placeholder="Firm's EIN">
                    <label for="firmEIN">Firm's EIN</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- footer -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-9">
        <h6>Go to www.irs.gov/Form1040 for instructions and the latest information.</h6>
    </div>
    <div class="col-md-3">
        <h6>Form 1040 (2022)</h6>
    </div>
</div>
