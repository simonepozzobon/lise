<?php
/**
 * Template Name: Magazine Home
 *
 * @package WordPress
 * @subpackage future-child
 * @since Future Child 1.0
 */


// prendo i posts recenti
$args = array(
    'numberposts' => 2,
    'offset' => 0,
	'orderby' => 'post_date',
	'order' => 'DESC',
	'post_type' => 'post',
	'post_status' => 'publish',
	'suppress_filters' => true
);
$recent_posts = wp_get_recent_posts( $args, ARRAY_A );

$posts_args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1
);

$query = new WP_Query($posts_args);


get_header(); ?>

<div class="container">
    <div class="row bg-light jumbo">
        <div class="col-12 w-100">
            <div class="big-title">
                <h1>Ultimi Articoli</h1>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <?php if (count($recent_posts) > 1) {
                    foreach ($recent_posts as $recent) {
                        ?>
                        <div class="col-md-6 feat-post">
                            <div class="row feat-header">
                                <div class="col-md-4 avatar-wrapper">
                                    <?php $author_id = get_post_field( 'post_author', $recent['ID'] ); ?>
                                    <div class="avatar-container">
                                        <img src="<?php echo esc_url( get_avatar_url( $author_id ) ); ?>" alt="<?php echo get_the_author_meta( 'display_name' , $author_id ); ?>">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h1 class="feat-title"><?php echo $recent['post_title']; ?></h1>
                                    <h5 class="author-name">di <span><?php echo get_the_author_meta( 'display_name' , $author_id ); ?></span></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 feat-date">
                                    <?php echo date( 'j F Y', strtotime( $recent['post_date'] ) ); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="#" class="feat-subtitle"><h3><?php echo get_post_meta( $recent['ID'], 'wps_subtitle', true ); ?></h3></a>
                                </div>
                            </div>
                        </div>

                <?php    }
                } ?>
            </div>
        </div>
    </div>
    <div class="row post-loop">
        <?php if ( $query->have_posts() ) : ?>

            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                <div class="col-md-6">
                    <div class="post">
                        <div class="row">
                            <div class="col post-title">
                                <a href="#"><h1><?php the_title(); ?></h1></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col post-subtitle">
                                <h3><?php the_subtitle(); ?></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col post-author">
                                di <span><?php echo get_the_author_meta( 'display_name' ); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col post-date">
                                <?php the_time('j F Y') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col post-cat">
                                <?php the_category(', '); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>

        <?php else : ?>

            <div class="col-12 jumbo">
                <p class="text-center">Spiacente, nessun articolo corrisponde ai criteri di ricerca.</p>
            </div>

        <?php endif; ?>
    </div>


</div>


<?php get_footer(); ?>
