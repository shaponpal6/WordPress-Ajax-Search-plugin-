<?php


class Ais_bot_settings
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'acb_configuration_page'));
        add_action('admin_init', array($this, 'acb_admin_init'));
    }

    /**
     * Add options page
     */
    public function acb_configuration_page()
    {
        add_menu_page(
            __('AI Search', 'textdomain'),
            'AI Search',
            'manage_options',
            'ais_search_bot',
            array($this, 'ais_intro_page'),
            'dashicons-smiley',
            26
        );
        // This page will be under "Settings"
//        add_options_page(
//            'Admin Settings',
//            'Chatbot Configuration',
//            'manage_options',
//            'my-setting-admin',
//            array($this, 'create_admin_page')
//        );
        add_submenu_page(
            'ais_search_bot',
            __('Bot Configuration', 'textdomain'),
            __('Bot Configuration', 'textdomain'),
            'manage_options',
            'ais_settings',
            array($this, 'bot_config_page')
        );
        add_submenu_page(
            'ais_search_bot',
            __('Search Instance', 'textdomain'),
            __('Search Instance', 'textdomain'),
            'manage_options',
            'ais_search_instance',
            array($this, 'ais_create_search')
        );
        add_submenu_page(
            'ais_search_bot',
            __('Manage Options', 'textdomain'),
            __('Manage Options', 'textdomain'),
            'manage_options',
            'ais_manage_options',
            array($this, 'manage_options_page')
        );
        add_submenu_page(
            'ais_search_bot',
            __('Manage Actions', 'textdomain'),
            __('Manage Actions', 'textdomain'),
            'manage_options',
            'ais_actions',
            array($this, 'ais_actions')
        );
//        add_submenu_page(
//            'ais_search_bot',
//            __('Manage Actions', 'textdomain'),
//            __('Manage Actions', 'textdomain'),
//            'manage_options',
//            'ais_manage_action',
//            array($this, 'manage_action')
//        );
        add_submenu_page(
            'ais_search_bot',
            __('Documentation', 'textdomain'),
            __('Documentation', 'textdomain'),
            'manage_options',
            'ais_docs',
            array($this, 'ais_docs_page')
        );
        add_submenu_page(
            'ais_search_bot',
            __('Help & Support', 'textdomain'),
            __('Help & Support', 'textdomain'),
            'manage_options',
            'ais_support',
            array($this, 'help_support')
        );
    }

    /**
     * Register and add settings
     */
    public function acb_admin_init()
    {
        $opts = array(
                'config'=>array(['ais_site_url', 'acb_google_email','Google Email Address*','acb_google_email'])
        );
        $tab = isset($_GET['tab'])?$_GET['tab']:'';
        register_setting(
            'acb_config_group', // Option group
            'acb_config_options', // Option name
            array($this, 'sanitize') // Sanitize
        );

        add_settings_section(
            'acb_config_section_id', // ID
            'AI Search Settings', // Title
            array($this, 'print_section_info'), // Callback
            'acb_admin_setting' // Page
        );

        if ($tab =='' || $tab == 'config') {


            add_settings_field(
                'ais_file_path', // ID
                'Image Upload Path', // Title
                array($this, 'ais_file_path'), // Callback
                'acb_admin_setting', // Page
                'acb_config_section_id' // Section
            );
            add_settings_field(
                'acb_licence_Key',
                'Licence Key*',
                array($this, 'acb_licence_Key'),
                'acb_admin_setting',
                'acb_config_section_id'
            );



//            add_settings_field(
//                'acb_google_email', // ID
//                'Google Email Address*', // Title
//                array($this, 'acb_google_email'), // Callback
//                'acb_admin_setting', // Page
//                'acb_config_section_id' // Section
//            );
//
//            add_settings_field('acb_serviceAccountKey',
//                'Google Service Account Key*',
//                array($this, 'acb_service_account_key'),
//                'acb_admin_setting',
//                'acb_config_section_id'
//            );
        }
        if ($tab !='' && $tab == 'licence') {
            add_settings_field('acb_serviceAccountKey',
                'Product Licence Key',
                array($this, 'acb_service_account_key'),
                'acb_admin_setting',
                'acb_config_section_id'
            );
        }
    }

    /**
     * Options page callback
     */
    function ais_intro_page(){
        return new ais_intro();
    }

    /**
     * Options page callback
     */

    function ais_actions_page(){
        return new ais_actionsController();
    }

    /**
     * Options page callback
     */

    function ais_docs_page(){
        // Set class property
        $this->options = get_option('acb_config_options');
        ?>
        <div class="wrap">
            <h1>Documentation</h1>
            <?php settings_errors(); ?>
            <!--  Show Manage option Page here-->
            <?php require_once 'options/documentation.php';?>
        </div>
        <?php
    }

    /**
     * Options page callback
     */
    public function bot_config_page()
    {
         // Set class property
         $this->options = get_option('acb_config_options');
         ?>
         <div class="wrap">
             <h1>Artificial Intelligence Search Bot Configuration</h1>
             <?php settings_errors(); ?>
             <!--  Show Manage option Page here-->
             <?php require_once 'options/setup.php';?>
         </div>
         <?php
    }
    /**
     * Options page callback
     */
    public function ais_create_search()
    {
         // Set class property
         $this->options = get_option('acb_config_options');
         ?>
         <div class="wrap">
             <h1>Create Search Instance</h1>
             <?php settings_errors(); ?>
             <!--  Show Manage option Page here-->
             <?php require_once 'options/instances.php';?>
         </div>
         <?php
    }


    /**
     * Options page callback
     */
    public function manage_options_page()
    {
        // Set class property
        $this->options = get_option('acb_config_options');
        ?>
        <div class="wrap">
            <h1>Manage Search Instance</h1>
            <?php settings_errors(); ?>
            <!--  Show Manage option Page here-->
            <?php require_once 'options/index.php';?>
        </div>
        <?php
    }

    /**
     * Not Use Here
     */
    public function manage_action()
    {
        // Set class property
        $this->options = get_option('acb_config_options');
        ?>
        <div class="wrap">
            <h1>Custom Actions</h1>
            <?php settings_errors(); ?>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields('acb_config_group');
                do_settings_sections('acb_admin_setting');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Options page callback
     */
    public function ais_actions()
    {
        // Set class property
        $this->options = get_option('acb_config_options');
        ?>
        <div class="wrap">
            <h1>Custom Actions</h1>
            <?php settings_errors(); ?>
            <!--  Show Manage option Page here-->
            <?php require_once 'options/actions.php';?>
        </div>
        <?php
    }

    /**
     * Options page callback
     */
    public function help_support()
    {
        // Set class property
        $this->options = get_option('acb_config_options');
        ?>
        <div class="wrap">
            <h1>Help & Supports</h1>
            <?php settings_errors(); ?>
            <!--  Show Manage option Page here-->
            <?php require_once 'options/supports.php';?>
        </div>
        <?php
    }



    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     * @return array
     */
    public function sanitize($input)
    {
        $upload_dir = wp_upload_dir();
        $new_input = array();

//        if (isset($input['acb_google_email']))
//            $new_input['acb_google_email'] = sanitize_email($input['acb_google_email']);

        if (isset($input['ais_file_path']))
            $new_input['ais_file_path'] = strlen($input['ais_file_path'])>5?$input['ais_file_path']:$upload_dir['baseurl'];

        if (isset($input['acb_serviceAccountKey']))
            $new_input['acb_serviceAccountKey'] = sanitize_text_field($input['acb_serviceAccountKey']);

        if (isset($input['acb_licence_Key']))
            $new_input['acb_licence_Key'] = sanitize_text_field($input['acb_licence_Key']);

        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        print '<nav class="nav-tab-wrapper woo-nav-tab-wrapper">
                    <a href="http://localhost/wpartificial/wp-admin/admin.php?page=ais_settings&tab=config" class="nav-tab ">Configruation</a>
                    <a href="http://localhost/wpartificial/wp-admin/admin.php?page=ais_settings&tab=licence" class="nav-tab ">Licence</a>
                    <a href="http://localhost/wpartificial/wp-admin/admin.php?page=ais_settings" class="nav-tab ">Tab 1</a>
                    <a href="http://localhost/wpartificial/wp-admin/admin.php?page=ais_settings" class="nav-tab ">Tab 1</a>
                    <a href="http://localhost/wpartificial/wp-admin/admin.php?page=ais_settings" class="nav-tab ">Tab 1</a>
                </nav>';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function ais_site_url()
    {
        printf(
            '<input type="url" placeholder="" class="regular-text ltr" id="ais_site_url" name="acb_config_options[ais_site_url]" value="%s" />',
            isset($this->options['ais_site_url']) ? esc_attr($this->options['ais_site_url']) : ''
        );
    }





    /**
     * Get the settings option array and print one of its values
     */
    public function acb_google_email()
    {
        printf(
            '<input type="text" placeholder="...@gmail.com" class="regular-text ltr" id="acb_google_email" name="acb_config_options[acb_google_email]" value="%s" />',
            isset($this->options['acb_google_email']) ? esc_attr($this->options['acb_google_email']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function ais_file_path()
    {
         $upload_dir = wp_upload_dir();
        printf(
            '<input type="url" placeholder="" class="regular-text ltr" id="ais_file_path" name="acb_config_options[ais_file_path]" value="%s" />',
            isset($this->options['ais_file_path']) ? esc_attr($this->options['ais_file_path']) : $upload_dir['baseurl']
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function acb_licence_key()
    {
        printf(
            '<input class="regular-text ltr" type="text" id="acb_licence_Key" name="acb_config_options[acb_licence_Key]" value="%s" />',
            isset( $this->options['acb_licence_Key'] ) ? esc_attr( $this->options['acb_licence_Key']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function acb_service_account_key()
    {
        printf(
            '<textarea id="acb_serviceAccountKey" name="acb_config_options[acb_serviceAccountKey]" class="large-text code" rows="3" cols="60">%s</textarea>',
            isset($this->options['acb_serviceAccountKey']) ? esc_attr($this->options['acb_serviceAccountKey']) : ''
        );

//        printf(
//            '<input type="text" id="acb_serviceAccountKey" name="acb_config_options[acb_serviceAccountKey]" value="%s" />',
//            isset( $this->options['acb_serviceAccountKey'] ) ? esc_attr( $this->options['acb_serviceAccountKey']) : ''
//        );
    }


}

if (is_admin())
    $my_settings_page = new Ais_bot_settings();