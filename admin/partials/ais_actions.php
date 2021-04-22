<?php


class ais_actions

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
        add_action('admin_init', array($this, 'acb_action_init'));
        $this->create_admin_page();
    }

    /**
     * Register and add settings
     */
    public function acb_action_init()
    {
        $tab = isset($_GET['tab'])?$_GET['tab']:'';
        register_setting(
            'ais_action_group', // Option group
            'ais_action_options', // Option name
            array($this, 'sanitize') // Sanitize
        );

        add_settings_section(
            'ais_action_section_id', // ID
            'Actions Page', // Title
            array($this, 'print_section_info'), // Callback
            'ais_actions' // Page
        );

        if ($tab =='' || $tab == 'config') {

            add_settings_field(
                'acb_google_email', // ID
                'Google Email Address*', // Title
                array($this, 'acb_google_email'), // Callback
                'ais_actions', // Page
                'ais_action_section_id' // Section
            );

            add_settings_field(
                'acb_serviceAccountKey',
                'Google Service Account Key*',
                array($this, 'acb_service_account_key'),
                'ais_actions',
                'ais_action_section_id'
            );
        }
        if ($tab !='' && $tab == 'licence') {
            add_settings_field(
                'acb_licence_Key',
                'Licence Key*',
                array($this, 'acb_licence_Key'),
                'ais_actions',
                'ais_action_section_id'
            );
        }
    }


    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option('ais_action_options');
        ?>
        <div class="wrap">
            <h1>AI Search</h1>
            <?php settings_errors(); ?>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields('ais_action_group');
                do_settings_sections('ais_actions');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }



    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input)
    {
        $new_input = array();
        if (isset($input['acb_google_email']))
            $new_input['acb_google_email'] = sanitize_email($input['acb_google_email']);

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
<a href="http://localhost/wpartificial/wp-admin/admin.php?page=ais_actionsController&tab=config" class="nav-tab ">Configruation2</a>
<a href="http://localhost/wpartificial/wp-admin/admin.php?page=ais_actionsController&tab=licence" class="nav-tab ">Licence3</a>
<a href="http://localhost/wpartificial/wp-admin/admin.php?page=ais_actionsController" class="nav-tab ">Tab 12</a>
<a href="http://localhost/wpartificial/wp-admin/admin.php?page=ais_actionsController" class="nav-tab ">Tab 13</a>
<a href="http://localhost/wpartificial/wp-admin/admin.php?page=ais_actionsController" class="nav-tab ">Tab 14</a>
</nav>';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function acb_google_email()
    {
        printf(
            '<input type="text" placeholder="...@gmail.com" class="regular-text ltr" id="acb_google_email" name="ais_action_options[acb_google_email]" value="%s" />',
            isset($this->options['acb_google_email']) ? esc_attr($this->options['acb_google_email']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function acb_service_account_key()
    {
        printf(
            '<textarea id="acb_serviceAccountKey" name="ais_action_options[acb_serviceAccountKey]" class="large-text code" rows="3" cols="60">%s</textarea>',
            isset($this->options['acb_serviceAccountKey']) ? esc_attr($this->options['acb_serviceAccountKey']) : ''
        );

//        printf(
//            '<input type="text" id="acb_serviceAccountKey" name="ais_action_options[acb_serviceAccountKey]" value="%s" />',
//            isset( $this->options['acb_serviceAccountKey'] ) ? esc_attr( $this->options['acb_serviceAccountKey']) : ''
//        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function acb_licence_key()
    {
        printf(
            '<input class="regular-text ltr" type="text" id="acb_licence_Key" name="ais_action_options[acb_licence_Key]" value="%s" />',
            isset( $this->options['acb_licence_Key'] ) ? esc_attr( $this->options['acb_licence_Key']) : ''
        );
    }
}