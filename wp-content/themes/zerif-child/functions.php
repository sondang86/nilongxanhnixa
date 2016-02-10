<?php
    function theme_enqueue_styles() {

        $parent_style = 'parent-style';

        wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style',
            get_stylesheet_directory_uri() . '/style.css',
            array( $parent_style )
        );
    }
    add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
    
    /*Add Google captcha field to Comment form*/
    add_filter('comment_form','add_google_captcha');

    function add_google_captcha() {
        echo '<div class="g-recaptcha" data-sitekey="6Le50RcTAAAAAFqKdnbDt0qDWYcA5lCQKJ4M5_BN"></div>';
 
    }

    /*End of Google captcha*/

?>