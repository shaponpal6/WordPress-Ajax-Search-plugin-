<?php


class ais_intro
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
        ?>
        <div class="wrap">
            <div id="welcome-panel" class="welcome-panel">
                <div class="welcome-panel-content">
                    <h2>Thank You for connecting Artificial Intelligence Search</h2>
                    <p class="about-description">We’ve assembled some links to get you started:</p>
                    <div class="welcome-panel-column-container">
                        <div class="welcome-panel-column">
                            <h3>Get Started</h3>
                            <a class="button button-primary button-hero load-customize hide-if-no-customize"
                               href="http://localhost/wpartificial/wp-admin/customize.php">Customize Your Site</a>
                            <a class="button button-primary button-hero hide-if-customize"
                               href="http://localhost/wpartificial/wp-admin/themes.php">Customize Your Site</a>
                            <p class="hide-if-no-customize">or, <a
                                        href="http://localhost/wpartificial/wp-admin/customize.php?autofocus[panel]=themes">change
                                    your theme completely</a></p>
                        </div>
                        <div class="welcome-panel-column">
                            <h3>Next Steps</h3>
                            <ul>
                                <li><a href="http://localhost/wpartificial/wp-admin/post-new.php"
                                       class="welcome-icon welcome-write-blog">Write your first blog post</a></li>
                                <li><a href="http://localhost/wpartificial/wp-admin/post-new.php?post_type=page"
                                       class="welcome-icon welcome-add-page">Add an About page</a></li>
                                <li>
                                    <a href="http://localhost/wpartificial/wp-admin/customize.php?autofocus[section]=static_front_page"
                                       class="welcome-icon welcome-setup-home">Set up your homepage</a></li>
                                <li><a href="http://localhost/wpartificial/" class="welcome-icon welcome-view-site">View
                                        your site</a></li>
                            </ul>
                        </div>
                        <div class="welcome-panel-column welcome-panel-last">
                            <h3>More Actions</h3>
                            <ul>
                                <li>
                                    <div class="welcome-icon welcome-widgets-menus">
                                        Manage <a href="http://localhost/wpartificial/wp-admin/widgets.php">widgets</a>
                                        or <a href="http://localhost/wpartificial/wp-admin/nav-menus.php">menus</a>
                                    </div>
                                </li>
                                <li><a href="http://localhost/wpartificial/wp-admin/options-discussion.php"
                                       class="welcome-icon welcome-comments">Turn comments on or off</a></li>
                                <li><a href="https://codex.wordpress.org/First_Steps_With_WordPress"
                                       class="welcome-icon welcome-learn-more">Learn more about getting started</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <?php
    }

}