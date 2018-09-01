<?php if (has_post_thumbnail( $post->ID ) ): ?>
<section>
  <header class="single-hero-img">
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <img src="<?php echo $image[0]; ?>" class="img-fluid w-100"/>
  </header>
</section>
<?php endif; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-wrapper entry-wrapper-single' ); ?> >

  <div class="post-single-container container">
    <div class="row">
      <div class="col-md-8">
        <div class="post-single-date">
          <h5><?php echo get_the_date() ?></h5>
        </div>
        <div class="post-single-title">
          <h1 itemprop="headline"><?php the_title(); ?></h1>
        </div>
        <div class="post-single-subtitle">
          <p><?php the_subtitle(); ?></p>
        </div>
        <div class="post-single-content">
          <?php the_content(); ?>
        </div>
      </div>
      <div class="col-md-4">
          <div class="author-container">
            <?php $author_id = get_post_field( 'post_author', $recent['ID'] ); ?>
            <div class="avatar-title">
              <h5>L'autore</h5>
            </div>
            <div class="avatar-container">
              <img src="<?php echo esc_url( get_avatar_url( $author_id ) ); ?>" alt="<?php echo get_the_author_meta( 'display_name' , $author_id ); ?>">
            </div>
            <div class="author-name">
              <h3><?php echo get_the_author_meta( 'display_name' , $author_id ); ?></h3>
            </div>
            <div class="author-description">
              <p><?php echo get_the_author_meta( 'description' , $author_id ); ?></p>
            </div>
          </div>
      </div>
    </div>
  </div>

  <div class="entry-wrapper-inside container">

	  <header class="entry-header entry-header-single">
      <div class="row">
          <div class="entry-meta entry-meta-single entry-meta-top">
            <?php echo future_post_format() . future_post_author() . future_post_comments() . future_post_edit_link(); ?>
          </div>
        </div>
      </div>
    </header>

    <div class="<?php future_entry_content_single_post_class(); ?>" itemprop="text">
    </div>

    <footer class="entry-footer entry-footer-single">
      <?php echo future_link_pages(); ?>
    </footer>

  </div>

</article>
