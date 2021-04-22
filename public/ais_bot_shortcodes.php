<?php

class AI_search_shortcode
{
    function __construct()
    {

        add_action('init', function () {
            add_shortcode('wpartificial-search', array($this, 'ai_search_code_display'));
        });
        add_filter('use_block_editor_for_post', '__return_false');

    }

    function ai_search_code_display($atts = [], $content = null)
    {
        $a = shortcode_atts(array(
            'id' => '1',
            'name' => 'Artificial Intelligence Search'
        ), $atts);


//        print_r('<pre>');
//        print_r($a);
//        print_r('------------------------------------------------');
//        print_r($atts);
        $search = ob_start();
        ?>
        <div class="sb-ai_search_pro" data-aisb-name="wpartificial_search" data-aisb-id="<?=$a['id'];?>">
            <div class="sb-ai-search-box">
                <label class="sb-ai-left-menu">	&#x2630; <img src="<?=plugin_dir_url( __FILE__  ).'images/magnifier.svg';?>" style="display:none; width: 20px"></label>
                <input id="ai_search_box3" type="text" class="ai_search_input_1" placeholder="What are you looking for?">
                <button class="sb-ai-right-btn"> Search
                </button>
            </div>

            <div class="ais-search-config">
                <div class="ais-checkbox" data-action="ais_se" data-value="true">
                    <i class="ais-check ais-active">&nbsp;</i> Use Search Engine
                </div>
                <div class="ais-checkbox" data-action="ais_se2" data-value="false">
                    <i class="ais-check">&nbsp;</i> Use Search Engine2
                </div>
                <div class="ais-checkbox" data-action="ais_se3" data-value="true">
                    <i class="ais-check ais-active">&nbsp;</i> Use Search Engine3
                </div>
            </div>

            <div class="ais-light-box">
                <div class="ais-menu-container">
                    <button class="ais-lefty ais_pagi" id="left-button"> &#x00AB; </button>
                    <div class="ais-menus"></div>
                    <button class="ais-righty ais_pagi" id="right-button"> &#x00BB; </button>
                </div>
                <div class="ais-shopping-cart"><img style="width: 20px" src="<?=plugin_dir_url( __FILE__  ).'images/shopping-cart-solid.svg';?>"/><sup
                            class="ais-cart-count">0</sup></div>
                <div class="ais-setting-box ais-grid" data-style="grid">
                    <img style="width: 20px" src="<?=plugin_dir_url( __FILE__  ).'images/list.svg';?>"/>
                </div>
            </div>

            <div class="ai_search_display scrollbar">
                <div class="ais-search-result"></div>
            </div>
        </div>
        <?php
        return ob_get_clean();
        //return 'This is from Shortcode Display';
    }

}

$ai_search_shortcodes = new AI_search_shortcode();
