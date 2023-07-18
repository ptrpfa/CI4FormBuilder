<h4 class="my-4 text-center"><?= esc($title) ?></h4>

<!-- Header -->
<div class="row d-flex justify-content-center align-items-end mx-auto w-75 text-start">
    <div class="col-md-2">
        <div class="row">
            <h5>SCHEDULE B</h5>
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
            <h3>Interest and Ordinary Dividends</h3>
        </div>
        <div class="row">
            <h7>Go to www.irs.gov/ScheduleB for instructions and the latest information.</h7>
        </div>
        <div class="row">
            <h7>Attach to Form 1040 or 1040-SR</h7>
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
<!-- Part I: Interest -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <div class="row">
            <h5>Part I: Interest</h5>
        </div>
        <div class="row">
            <p>(See instructions and the Instructions for Form 1040, line 2b.)</p>
        </div>
        <div class="row">
            <p>Note: If you received a Form 1099-INT, Form 1099-OID, or substitute statement from a brokerage firm, list the firm's name as the payer and enter the total interest shown on that form. </p>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="mb-3">
                <label for="1" class="form-label">1. List name of payer. If any interest is from a seller-financed mortgage and thebuyer used the property as a personal residence, see the instructions and list thisinterest first. Also, show that buyer's social security number and address:</label>
                <textarea class="form-control" id="1" rows="14"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-floating">
                <input type="text" class="form-control form-control-sm mb-1" id="2" placeholder="2">
                <label for="2">2. Add the amounts on line 1</label>
            </div>
        </div>
        <div class="row">
            <div class="form-floating">
                <input type="text" class="form-control form-control-sm mb-1" id="3" placeholder="3">
                <label for="3">3. Excludable interest on series EE and I U.S. savings bonds issued after 1989. Attach Form 8815 </label>
            </div>
        </div>
        <div class="row">
            <div class="form-floating">
                <input type="text" class="form-control form-control-sm mb-1" id="4" placeholder="4">
                <label for="4">4.  Subtract line 3 from line 2. Enter the result here and on Form 1040 or 1040-SR, line 2b</label>
            </div>
            <div class="form-text">Note: If line 4 is over $1,500, you must complete Part III.</div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Part II: Ordinary Dividends -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <div class="row">
            <h5>Part II: Ordinary Dividends</h5>
        </div>
        <div class="row">
            <p>(See instructions and the Instructions for Form 1040, line 3b.)</p>
        </div>
        <div class="row">
            <p>Note: If you received a Form 1099-DIV or substitute statement from a brokerage firm, list the firm's name as the payer and enter the ordinary dividends shown on that form. </p>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="mb-3">
                <label for="5" class="form-label">5. List name of payer</label>
                <textarea class="form-control" id="5" rows="14"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-floating">
                <input type="text" class="form-control form-control-sm mb-1" id="6" placeholder="6">
                <label for="6">6. Add the amounts on line 5. Enter the total here and on Form 1040 or 1040-SR, line 3b</label>
            </div>
            <div class="form-text">If line 6 is over $1,500, you must complete Part III. </div>
        </div>
    </div>
    <hr class="mt-3">
</div>
<!-- Part III Foreign Accounts and Trusts -->
<div class="row d-flex justify-content-center mx-auto w-75 text-start">
    <div class="col-md-2">
        <div class="row">
            <h5>Part III: Foreign Accounts and Trusts</h5>
        </div>
        <div class="row">
            <p>Caution: If required, failure to file FinCEN Form 114 may result in substantial penalties. Additionally, you may be required to file Form 8938, Statement of Specified Foreign Financial Assets. See instructions.</p>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row">
            <p>You must complete this part if you (a) had over $1,500 of taxable interest or ordinary dividends; (b) had a foreign account; or (c) received a distribution from, or were a grantor of, or a transferor to, a foreign trust.</p>
        </div>
        <hr class="mt-3">
        <div class="row">
            <p>7a. At any time during 2022, did you have a financial interest in or signature authority over a financialaccount (such as a bank account, securities account, or brokerage account) located in a foreigncountry? See instructions </p>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="yes" id="7aYes">
                <label class="form-check-label" for="7aYes">
                    Yes
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="no" id="7aNo">
                <label class="form-check-label" for="7aNo">
                    No
                </label>
            </div>
        </div>
        <div class="row">
            <p>If “Yes,” are you required to file FinCEN Form 114, Report of Foreign Bank and FinancialAccounts (FBAR), to report that financial interest or signature authority? See FinCEN Form 114 and its instructions for filing requirements and exceptions to those requirements </p>
        </div>
        <div class="row">
            <div class="form-floating">
                <input type="text" class="form-control form-control-sm mb-1" id="7b" placeholder="7b">
                <label for="7b">7b. If you are required to file FinCEN Form 114, list the name(s) of the foreign country(-ies) where the financial account(s) are located:</label>
            </div>
        </div>
        <div class="row">
            <p>8. During 2022, did you receive a distribution from, or were you the grantor of, or transferor to, a foreign trust? If “Yes,” you may have to file Form 3520. See instructions</p>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="yes" id="8Yes">
                <label class="form-check-label" for="8Yes">
                    Yes
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="no" id="8No">
                <label class="form-check-label" for="8No">
                    No
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
        <h7>Cat. No. 17146N</h7>
    </div>
    <div class="col-auto">
        <h7>Schedule A (Form 1040) 2022</h7>
    </div>
</div>