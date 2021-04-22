<section id="ais_actions" class="wrap">
    <h1 class="wp-heading-inline">Add New Action</h1>
    <div id="titlewrap">
        <label class="screen-reader-text" id="title-prompt-text" for="title">Add title</label>
        <input type="text" name="post_title" style="width: 100%;" value="" id="title" spellcheck="true" autocomplete="off">
    </div>
<?php

$post_id = 51;
$post = get_post( $post_id, OBJECT, 'edit' );

$content = $post->post_content;
$editor_id = 'editpost';

wp_editor( $content, $editor_id );


?>
    <p class="submit">
        <input type="button" name="wpdocs-save-settings" id="wpdocs-button-id" class="button button-primary" value="Save Action">
    </p>
</section>
