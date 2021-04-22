<?php


class ais_docs
{

    public function __construct()
    {
        $this->page();
    }

    /**
     * Options page callback
     */
    public function page()
    {
        // Set class property
        $this->options = get_option('acb_config_options');
        ?>
        <div class="wrap">
            <h1>AI Search</h1>
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
     * Sanitize each setting field as needed
     * @param array $input Contains all settings fields as array keys
     * @return array
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

    /**
     * Get the settings option array and print one of its values
     */
    public function acb_licence_key()
    {
        printf(
            '<input class="regular-text ltr" type="text" id="acb_licence_Key" name="acb_config_options[acb_licence_Key]" value="%s" />',
            isset($this->options['acb_licence_Key']) ? esc_attr($this->options['acb_licence_Key']) : ''
        );
    }
}