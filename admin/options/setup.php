<div id="msform" class="aisb-setting" data-action="aisb_setup">
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="ais_step_no ais_ok">Account Setup</li>
        <li class="ais_step_no ">Social Profiles</li>
        <li class="ais_step_no ">Personal Details</li>
    </ul>
    <!--    <div class="ais-loader"></div>-->
    <!-- fieldsets -->
    <fieldset class="ais_setup_step ">
        <h2 class="fs-title">Artificial Intelligence Search bot</h2>
        <h3 class="fs-subtitle">Initialize Default Configuration</h3>
        <div class="s-row">
            <label for="botName">Search bot Name</label>
            <div class="s-action">
                <input type="text" id="botName" class="main__input ais-item" data-key="botName" data-action="text" data-value="" placeholder="">
            </div>
        </div>
        <div class="s-row">
            <label for="sKey">Secret Key</label>
            <div class="s-action">
                <input type="text" id="sKey" class="main__input ais-item" data-key="sKey" data-action="text" data-value="" placeholder="Secret Key">
            </div>
        </div>
        <div class="s-row">
            <label for="licence_key">Licence Key</label>
            <div class="s-action">
                <input type="text" id="licence_key" class="main__input ais-item" data-key="licence_key" data-action="text" data-value="" placeholder="Licence Key">
            </div>
        </div>
        <div class="s-row">
            <div class="s-action">
                <input type="checkbox" id="ais_terms" class="ais-item" data-key="ais_terms_condition" data-action="checkbox">
                <label for="ais_terms"> Accept Terms and Conditions <a href="">more</a></label>
            </div>
        </div>
        <input type="button" name="next" data-step="1" class="ais_sutup_btn next action-button" value="Next" />
    </fieldset>
    <fieldset class="ais_setup_step">
        <h2 class="fs-title">Active Custom Action</h2>
        <h3 class="fs-subtitle">Create Action Table</h3>
        <div class="s-row">
            <label for="domain">Site Url</label>
            <div class="s-action">
                <input type="text" id="domain" class="main__input ais-item" data-key="domain" data-action="text" data-value="" placeholder="">
            </div>
        </div>
        <div class="s-row">
            <label for="dir">Image Source Directory</label>
            <div class="s-action">
                <input type="text" id="dir" class="main__input ais-item" data-key="dir" data-action="text" data-value="" placeholder="">
            </div>
        </div>
        <div class="s-row">
            <div class="s-action">
                <input type="checkbox" id="use_action_table" class="ais-item" data-key="use_action_table" data-action="checkbox">
                <label for="use_action_table"> Create Action Table <a href="">more</a></label>
            </div>
        </div>
        <input type="button" name="previous" data-step="0" class="ais_sutup_btn_prev previous action-button" value="Previous" />
        <input type="button" name="next" data-step="2" class="ais_sutup_btn next action-button" value="Next" />
    </fieldset>
    <fieldset class="ais_setup_step">
        <h2 class="fs-title">Finish and Run App</h2>
        <h3 class="fs-subtitle">Use Default Configuration and Run Search Bot</h3>
        <div class="s-row">
            <div class="s-action">
                <input type="checkbox" id="use_cache" class="ais-item" data-key="use_cache" data-action="checkbox">
                <label for="use_cache"> Cache some prrimary data and Settings. [Recommanded]<a href="">more</a></label>
            </div>
        </div>
        <input type="button" name="previous" data-step="1" class="ais_sutup_btn_prev previous action-button" value="Previous" />
        <input type="submit" name="submit" data-step="3" class="ais_sutup_btn submit action-button" value="Finish & Run" />
    </fieldset>
</div>