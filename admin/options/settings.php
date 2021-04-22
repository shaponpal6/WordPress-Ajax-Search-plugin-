<div class="aisb-setting" data-action="aisb_adminjs">

<header class="aisb-header">
    <h1>Hello Assistance</h1>
    <div class="ais-create-instance"><input type="text" id="ais-create-instance">
        <button class="ais-create-instance-btn">save</button>
    </div>
</header>
<div class='container'>
    <div class="ais-create-search-bot">
        <ul class="ais-instance">
            <li><a href="http://localhost/ai-search/admin/settings.php?aisb=100">Hello Assistance</a></li>
        </ul>
    </div>
    <div class="ais-main-container">

        <!-- Left side Action-->
        <ul id="cb-settings-actions" class='sidebar'>
            <div class='sidebar__header'>
                <!--<img alt='' class='sidebar__avatar' src='https://unsplash.it/30/?image=209'>-->
                <img alt='' class='sidebar__avatar' src=''>
                <p>AI Search Configuration</p>
            </div>
            <li class='sidebar__menu-item sidebar__menu-item--active' data-id="#aisBotConfig">
                <i class='fa fa-users'></i>
                Bot Configuration
                <div class='sidebar__label'>
                    <i class='fa fa-plus'></i>
                </div>
            </li>
            <li class='sidebar__menu-item' data-id="#aisSearchOptions">
                <i class='fa fa-users'></i>
                Search Options
                <div class='sidebar__label'>
                    <i class='fa fa-plus'></i>
                </div>
            </li>
            <li class='sidebar__menu-item' data-id="#aisTemplateOptions">
                <i class='fa fa-users'></i>
                Template Options
                <div class='sidebar__label'>
                    <i class='fa fa-plus'></i>
                </div>
            </li>
            <li class='sidebar__menu-item' data-id="#aisLayoutOptions">
                <i class='fa fa-bar-chart'></i>
                Layout Options
            </li>
            <li class='sidebar__menu-item' data-id="#aisWooCommerceConfig">
                <i class='fa fa-plus'></i>
                WooCommerce Config
            </li>
            <li class='sidebar__menu-item' data-id="#aisPagination">
                <i class='fa fa-suitcase'></i>
                Pagination
            </li>
            <li class='sidebar__menu-item' data-id="#aisDynamicMenu">
                <i class='fa fa-cog'></i>
                Dynamic Menu
            </li>
            <li class='sidebar__menu-item'>
                <i class='fa fa-envelope-o'></i>
                Help
                <div class='sidebar__badge'>
                    33
                </div>
            </li>
            <li class='sidebar__menu-item'>
                <i class='fa fa-user-plus'></i>
                Referals
            </li>
        </ul>

        <!-- Center Activity-->
        <div class='main' id="aisb_action" data-action="100">
            <div class='main__header'>
                <h2 id="cb-title"> Settings</h2>
            </div>
            <div class='main__content'>
                <!--<div class='main__avatar'>-->
                <!--<div class='main__avatar&#45;&#45;overlay'>-->
                <!--John Doe-->
                <!--</div>-->
                <!--</div>-->
                <div class='main__settings-form ais-settings-group'>
                    <input type="hidden" class="ais-item" id="aisb_id" data-key="aisb_id" data-action="text">

                    <!--Bot Configuration-->
                    <div id="aisBotConfig" class="cb-setting active">
                        <!-- Domain -->
                        <div class="s-row">
                            <label>Site Url</label>
                            <div class="s-action">
                                <input type="text" value="" class="main__input ais-item" data-key="domain" data-action="text" data-value="" placeholder="">
                            </div>
                        </div>

                        <!-- Upload File Path -->
                        <div class="s-row">
                            <label>Upload File Path</label>
                            <div class="s-action">
                                <input type="text" value="" class="main__input ais-item" data-key="path" data-action="text" data-value="" placeholder="">
                            </div>
                        </div>

                        <!-- Plugin Directory -->
                        <div class="s-row">
                            <label>Plugin Directory</label>
                            <div class="s-action">
                                <input type="text" value="" class="main__input ais-item" data-key="plugin_dir" data-action="text" data-value="" placeholder="">
                            </div>
                        </div>
                        <div >
                            <input type="text" value="" class="ais-item" data-key="key1" data-action="text" data-value="">
                        </div>
                        <div >
                            Check box: <input type="checkbox" value="" class="ais-item" data-key="key2" data-action="checkbox" data-value="">
                        </div>
                        <div >
                            <select class="ais-item" data-key="key3" data-action="select">
                                <option value="1">test1</option>
                                <option value="2">test2</option>
                                <option value="3">test3</option>
                            </select>
                        </div>
                        <div class="ais-item" id="ais_radio" data-key="key4" data-action="radio">
                            <label for="gender">Gender: </label>
                            <input type="radio" name="genderS" value="1" checked> Male
                            <input type="radio" name="genderS" value="2" > Female<br><br>
                            <input type="radio" name="genderS" value="3" > Female<br><br>
                            <input type="radio" name="genderS" value="4" > Female<br><br>
                        </div>
                        <section class="setting-block">
                            <!--<h4 class="s-header">Form Configuration</h4>-->
                            <!--Item Purchase Code:-->
                            <div class="s-row">
                                <label>Item Purchase Code:</label>
                                <div class="s-action">
                                    <input class='main__input' id="cb_ipc" placeholder='Item Licence Code' type="text">
                                    <p>Get your Licence Key <a target="_blank"
                                                               href="http://api.wpartificial.com/">here</a></p>
                                    <button id='cb_active_licence'>Active</button>
                                    <span id='create'></span>
                                </div>
                            </div>

                        </section>
                    </div>
                    <!--Bot Configuration-->

                    <!--Search Options Configuration-->
                    <div id="aisSearchOptions" class="cb-setting">
                        <!-- Domain -->
                        <div class="s-row">
                            <label>Use Search Engine</label>
                            <div class="s-action">
                                <input type="checkbox" value="" class="main__input ais-item" data-key="ais_se" data-action="checkbox" data-value="">
                                <p>A Lightweight Full Text Search Engine <a>more..</a></p>
                            </div>
                        </div>

                        <!-- Search In Title -->
                        <div class="s-row">
                            <label>Search In Title</label>
                            <div class="s-action">
                                <input type="checkbox" value="" class="main__input ais-item" data-key="ais_title" data-action="checkbox" data-value="">
                            </div>
                        </div>

                        <!-- Search In Content -->
                        <div class="s-row">
                            <label>Search In Content</label>
                            <div class="s-action">
                                <input type="checkbox" value="" class="main__input ais-item" data-key="ais_content" data-action="checkbox" data-value="">
                            </div>
                        </div>

                        <!-- Search In Excerpt -->
                        <div class="s-row">
                            <label>Search In Title</label>
                            <div class="s-action">
                                <input type="checkbox" value="" class="main__input ais-item" data-key="ais_excerpt" data-action="checkbox" data-value="">
                            </div>
                        </div>

                    </div>
                    <!--Search Options Configuration-->

                    <!--Template Options Configuration-->
                    <div id="aisTemplateOptions" class="cb-setting">
                        <!-- Show Image in Template-->
                        <div class="s-row">
                            <label>Show Image in Template</label>
                            <div class="s-action">
                                <input type="checkbox" class="main__input ais-item" data-key="showImage" data-action="checkbox" data-value="">
                            </div>
                        </div>

                        <!-- Show Title over Image in Template-->
                        <div class="s-row">
                            <label>Show Title over Image</label>
                            <div class="s-action">
                                <input type="checkbox" class="main__input ais-item" data-key="titleOverImage" data-action="checkbox" data-value="">
                            </div>
                        </div>

                        <!-- Show body Content in Template-->
                        <div class="s-row">
                            <label>Show Body Content in Template</label>
                            <div class="s-action">
                                <input type="checkbox" class="main__input ais-item" data-key="bodyContent" data-action="checkbox" data-value="">
                            </div>
                        </div>

                        <!-- Show Title in Template-->
                        <div class="s-row">
                            <label>Show Title in Template</label>
                            <div class="s-action">
                                <input type="checkbox" class="main__input ais-item" data-key="showTitle" data-action="checkbox" data-value="">
                            </div>
                        </div>

                        <!-- Show Title max Words -->
                        <div class="s-row">
                            <label>Show Title max Words</label>
                            <div class="s-action">
                                <input type="text" class="main__input ais-item" data-key="showTitleWord" data-action="text" data-value="">
                            </div>
                        </div>

                        <!-- SAllow Content in Template -->
                        <div class="s-row">
                            <label>Allow Content in Template</label>
                            <div class="s-action">
                                <input type="checkbox" class="main__input ais-item" data-key="showContent" data-action="checkbox" data-value="">
                            </div>
                        </div>

                        <!-- Show Content max Words -->
                        <div class="s-row">
                            <label>Show Content max Words</label>
                            <div class="s-action">
                                <input type="text" class="main__input ais-item" data-key="showContentWord" data-action="text" data-value="">
                            </div>
                        </div>

                    </div>
                    <!--Template Options Configuration-->

                    <!--Layout Options Configuration -->
                    <div id="aisLayoutOptions" class="cb-setting">
                        <section class="setting-block">
                            <!-- Show Content max Words -->
                            <div class="s-row">
                                <label>Default Layout</label>
                                <div class="s-action">
                                    <select class="main__input ais-item" data-key="result_view" data-action="select">
                                        <option value="ais_grid" selected="selected">Grid View</option>
                                        <option value="ais_list">List View</option>
                                    </select>
                                </div>
                            </div>

                            <!-- set template -->
                            <div class="s-row">
                                <label>Template</label>
                                <div class="s-action ais-item" id="ais_template" data-key="ais_template" data-action="radio">
                                    <input type="radio" name="ais_template" value="1" checked> Standard Template <br><br>
                                    <input type="radio" name="ais_template" value="2" > Widget Template<br><br>
                                    <input type="radio" name="ais_template" value="3" > Small Template<br><br>
                                    <input type="radio" name="ais_template" value="4" > Medium Template<br><br>
                                </div>
                            </div>

                            <!-- set Theme -->
                            <div class="s-row">
                                <label>Theme</label>
                                <div class="s-action ais-item" id="ais_theme" data-key="ais_theme" data-action="radio">
                                    <input type="radio" name="ais_theme" value="1" checked> Light Theme<br><br>
                                    <input type="radio" name="ais_theme" value="2" > Dark Theme<br><br>
                                    <input type="radio" name="ais_theme" value="3" > Blue Theme<br><br>
                                    <input type="radio" name="ais_theme" value="4" > Green Theme<br><br>
                                </div>
                            </div>


                        </section>
                    </div>
                    <!--Layout Options Configuration -->

                    <!--Filter Config -->
                    <div id="aisWooCommerceConfig" class="cb-setting">
                        <section class="setting-block">
                            <!-- Enable wooCommerce -->
                            <div class="s-row">
                                <label>Enable wooCommerce</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="wooCommerce" data-action="checkbox" data-value="">
                                </div>
                            </div>

                            <!-- Enable Cart Template -->
                            <div class="s-row">
                                <label>Enable Cart Template</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="showCartTemplate" data-action="checkbox" data-value="">
                                </div>
                            </div>

                            <!-- Show Add to Cart -->
                            <div class="s-row">
                                <label>Show Add to Cart</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="addToCart" data-action="checkbox" data-value="">
                                </div>
                            </div>

                            <!-- Show Cart -->
                            <div class="s-row">
                                <label>Show Cart</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="cart" data-action="checkbox" data-value="">
                                </div>
                            </div>

                            <!-- Show Price -->
                            <div class="s-row">
                                <label>Show Price</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="price" data-action="checkbox" data-value="">
                                </div>
                            </div>
                            <!-- woocommerce currency -->
                            <div class="s-row">
                                <label for="ais_woo_currency">wooCommerce Currency</label>
                                <div class="s-action">
                                    <input type="text" id="ais_woo_currency" class="main__input ais-item" data-key="woo_currency" data-action="text" data-value="">
                                </div>
                            </div>
                        </section>
                    </div>
                    <!--Filter Config -->

                    <!-- Pagination -->
                    <div id="aisPagination" class="cb-setting">
                        <section class="setting-block">
                            <!-- Enable Pagination -->
                            <div class="s-row">
                                <label>Enable Pagination</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="pagination" data-action="checkbox" data-value="">
                                </div>
                            </div>
                            <!-- Enable Pagination -->

                            <!-- Pagination items -->
                            <div class="s-row">
                                <label>Pagination items</label>
                                <div class="s-action">
                                    <input type="text" class="main__input ais-item" data-key="minItem" data-action="text" data-value="">
                                </div>
                            </div>

                            <!-- Pagination Menu Position -->
                            <div class="s-row">
                                <label>Pagination Menu Position</label>
                                <div class="s-action">
                                    <select class="main__input ais-item" data-key="position" data-action="select">
                                        <option value="afterend" selected="selected">After End Result</option>
                                        <option value="beforebegin">Before End Result</option>
                                    </select>
                                </div>
                            </div>

                        </section>
                    </div>
                    <!--Pagination-->

                    <!--Dynamic Menu-->
                    <div id="aisDynamicMenu" class="cb-setting">
                        <section class="setting-block">
                            <!-- Enable Top Config Section -->
                            <div class="s-row">
                                <label>Enable Top Config Section</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="showConfigSection" data-action="checkbox" data-value="">
                                </div>
                            </div>

                            <!-- Enable Dynamic Menu -->
                            <div class="s-row">
                                <label>Enable Dynamic Menu</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="showPostTypeMenu" data-action="checkbox" data-value="">
                                </div>
                            </div>

                            <!-- Enable Cart -->
                            <div class="s-row">
                                <label>Enable Cart</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="showCart" data-action="checkbox" data-value="">
                                </div>
                            </div>

                            <!-- Enable Layout Changer -->
                            <div class="s-row">
                                <label>Enable Layout Changer</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="showLayoutSelector" data-action="checkbox" data-value="">
                                </div>
                            </div>
                        </section>
                    </div>
                    <!--Dynamic Menu-->

                    <!--Help-->
                    <div id="aisHelp" class="cb-setting">
                        <section class="setting-block">
                            Help
                        </section>
                    </div>
                    <!--Help-->



                    <!-- ******************************************************* -->
                    <!-- ************** Artificial Intelligence **************** -->
                    <!-- ******************************************************* -->

                    <!--ai Search Bot-->
                    <div id="aiSearchBot" class="cb-setting">
                        <section class="setting-block">

                            <!-- Enable Ai Search Feature -->
                            <div class="s-row">
                                <label>Enable Ai Search Feature</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="enableAiSearchBot" data-action="checkbox" data-value="">
                                </div>
                            </div>
                            <!-- Enable Ai Search Feature -->

                        </section>
                    </div>
                    <!--ai Search Bot-->

                    <!--aiWooCommerce-->
                    <div id="aiWooCommerce" class="cb-setting">
                        <section class="setting-block">

                            <!-- Enable aiWooCommerceBot -->
                            <div class="s-row">
                                <label>Enable WooCommerce Bot</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="aiWooCommerceBot" data-action="checkbox" data-value="">
                                </div>
                            </div>
                            <!-- Enable aiWooCommerceBot -->

                        </section>
                    </div>
                    <!--aiWooCommerce-->

                    <!--aiPostsAction-->
                    <div id="aiPostsAction" class="cb-setting">
                        <section class="setting-block">

                            <!-- Enable aiPostsBot -->
                            <div class="s-row">
                                <label>Enable Posts Bot</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="aiPostsBot" data-action="checkbox" data-value="">
                                </div>
                            </div>
                            <!-- Enable aiPostsBot -->

                        </section>
                    </div>
                    <!--aiPostsAction-->

                    <!--aiPagesAction-->
                    <div id="aiPagesAction" class="cb-setting">
                        <section class="setting-block">

                            <!-- Enable aiPagesBot -->
                            <div class="s-row"aiPagesBot>
                                <label>Enable Pages Bot</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="aiPagesBot" data-action="checkbox" data-value="">
                                </div>
                            </div>
                            <!-- Enable aiPagesBot -->

                        </section>
                    </div>
                    <!--aiPagesAction-->

                    <!--aiTagsAction-->
                    <div id="aiTagsAction" class="cb-setting">
                        <section class="setting-block">

                            <!-- Enable aiTagsBot -->
                            <div class="s-row">
                                <label>Enable aiTagsBot</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="aiTagsBot" data-action="checkbox" data-value="">
                                </div>
                            </div>
                            <!-- Enable aiTagsBot -->

                        </section>
                    </div>
                    <!--aiTagsAction-->

                    <!--aiKnowledgeBase-->
                    <div id="aiKnowledgeBase" class="cb-setting">
                        <section class="setting-block">

                            <!-- Enable aiKnowledgeBot -->
                            <div class="s-row">
                                <label>Enable aiKnowledgeBot</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="aiKnowledgeBot" data-action="checkbox" data-value="">
                                </div>
                            </div>
                            <!-- Enable aiKnowledgeBot -->

                        </section>
                    </div>
                    <!--aiKnowledgeBase-->

                    <!--aiCustomBot-->
                    <div id="aiKnowledgeBase" class="cb-setting">
                        <section class="setting-block">

                            <!-- Enable aiCustomBot -->
                            <div class="s-row">
                                <label>Enable Custom Bot</label>
                                <div class="s-action">
                                    <input type="checkbox" class="main__input ais-item" data-key="aiCustomBot" data-action="checkbox" data-value="">
                                </div>
                            </div>
                            <!-- Enable aiCustomBot -->

                        </section>
                    </div>
                    <!--aiCustomBot-->

                    <div id="setting-2" class="cb-setting" action='#' method='post'>
                        <label class='main__input-label'>Your name22:</label>
                        <input class='main__input' placeholder='John Doe' type='text'>
                        <label class='main__input-label'>Your e-mail:</label>
                        <input class='main__input' placeholder='johndoe@gmail.com' type='text'>
                        <label class='main__input-label'>Your e-mail for notifications:</label>
                        <input class='main__input' placeholder='johndoe@gmail.com' type='text'>
                    </div>
                    <div id="setting-3" class="cb-setting" action='#' method='post'>
                        <label class='main__input-label'>Your name33:</label>
                        <input class='main__input' placeholder='John Doe' type='text'>
                        <label class='main__input-label'>Your e-mail:</label>
                        <input class='main__input' placeholder='johndoe@gmail.com' type='text'>
                        <label class='main__input-label'>Your e-mail for notifications:</label>
                        <input class='main__input' placeholder='johndoe@gmail.com' type='text'>
                    </div>

                    <!-- Save Button-->
                    <button id="ais-save-action-btn">Save All</button>

                </div>
            </div>
        </div>

        <!-- Right side Action-->
        <ul id="cb-settings-actions2" class='sidebar'>
            <div class='sidebar__header'>
                <!--<img alt='' class='sidebar__avatar' src='https://unsplash.it/30/?image=209'>-->
                <img alt='' class='sidebar__avatar' src=''>
                <p>Artificial Intelligence Actions</p>
            </div>
            <li class='sidebar__menu-item' data-id="#aiSearchBot">
                <i class='fa fa-users'></i>
                AI Search Bot
                <div class='sidebar__label'>
                    <i class='fa fa-plus'></i>
                </div>
            </li>
            <li class='sidebar__menu-item' data-id="#aiWooCommerce">
                <i class='fa fa-users'></i>
                WooCommerce
                <div class='sidebar__label'>
                    <i class='fa fa-plus'></i>
                </div>
            </li>
            <li class='sidebar__menu-item' data-id="#aiPostsAction">
                <i class='fa fa-users'></i>
                Posts Action
                <div class='sidebar__label'>
                    <i class='fa fa-plus'></i>
                </div>
            </li>
            <li class='sidebar__menu-item' data-id="#aiPagesAction">
                <i class='fa fa-bar-chart'></i>
                Page Action
            </li>
            <li class='sidebar__menu-item' data-id="#aiTagsAction">
                <i class='fa fa-plus'></i>
                Tags Action
            </li>
            <li class='sidebar__menu-item' data-id="#aiKnowledgeBase">
                <i class='fa fa-suitcase'></i>
                KnowledgeBase
            </li>
            <li class='sidebar__menu-item' data-id="#aiSetting">
                <i class='fa fa-cog'></i>
                Custom Actions
            </li>
            <li class='sidebar__menu-item'>
                <i class='fa fa-envelope-o'></i>
                Help
                <div class='sidebar__badge'>
                    3
                </div>
            </li>
            <li class='sidebar__menu-item'>
                <i class='fa fa-user-plus'></i>
                New Action
            </li>
        </ul>
    </div>
</div>

<a href="http://localhost/minify/js_minify.php" target="_blank"> JS Minify</a> ||
<a href="http://localhost/minify/css_minify.php" target="_blank"> JS Minify</a>



<!--<script src="js/libs/jquery-3.4.1.min.js"></script>-->
<!--<script src="js/common.js"></script>-->
<!--<script src="js/aisb_adminjs.js"></script>-->
<!--<script src="js/config.js"></script>-->

<!--<script src="js/ais-admin.min.js"></script>-->

</div>