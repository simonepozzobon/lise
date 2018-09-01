<?php

add_image_size('post-slide size', 1920, 720);

add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style' );
function enqueue_parent_theme_style() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'custom', get_template_directory_uri().'-child/css/custom.css', array(), null, 'all' );
}

add_action( 'custom_footer', 'custom_footer_tail' );
function custom_footer_tail() {

/** Theme Data & Settings */
$future_theme_data = future_theme_data();
$future_options = future_get_settings();

/** Footer Copyright Logic */
$future_copyright_code = __( '&copy; Copyright', 'future' ) . date( ' Y ' ) . ' – <a href="'. esc_url( home_url( '/' ) ) .'">LISE – Laboratorio Italiano Storia Economica</a>';
?>
<div class="footer-tail-sidebars widget-inverse">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if ( ! dynamic_sidebar( 'future-footer-tail-sidebar' ) ): ?>
              	    <section class="widget widget_text">
                        <div class="widget-inside">
                            <div class="textwidget"><?php echo $future_copyright_code; ?></div>
                        </div>
              	    </section>
          	    <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
}
