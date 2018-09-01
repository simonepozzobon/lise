<?php if (has_post_thumbnail( $post->ID ) ): ?>
<section>
  <header class="single-hero-img">
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-slide' ); ?>
    <img src="<?php echo $image[0]; ?>" class="img-fluid w-100"/>
  </header>
</section>
<?php endif; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-wrapper entry-wrapper-single' ); ?> >
  <div class="post-single-container container">
    <div class="row no-gutters">
      <div class="col-md-8">
        <div class="post-single-heading">
          <div class="post-single-date">
            <h5><?php echo get_the_date() ?></h5>
          </div>
          <div class="post-single-title">
            <h1 itemprop="headline"><?php the_title(); ?></h1>
          </div>
          <div class="post-single-subtitle">
            <p><?php the_subtitle(); ?></p>
          </div>
          <div class="post-single-social">
            <div class="social">
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo 'http:' . get_permalink(); ?>" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </div>
            <div class="social">
              <a href="https://twitter.com/home?status=<?php echo 'http:' . get_permalink(); ?>" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </div>
            <div class="social">
              <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo 'http:' . get_permalink(); ?>&title=Lise%20Roma" target="_blank">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
            <div class="social">
              <a href="https://plus.google.com/share?url=<?php echo 'http:' . get_permalink(); ?>&title=Lise%20Roma" target="_blank">
                <i class="fab fa-google-plus-g"></i>
              </a>
            </div>
            <div class="social">
              <a href="https://api.whatsapp.com/send?text=<?php echo 'http:' . get_permalink(); ?>&title=Lise%20Roma" target="_blank">
                <i class="fab fa-whatsapp"></i>
              </a>
            </div>
            <div class="social">
              <a href="mailto:?subject=Volevo condividere con te questo contenuto&amp;body=Link <?php echo 'http:' . get_permalink(); ?>." target="_blank">
                <i class="fas fa-envelope"></i>
              </a>
            </div>
          </div>
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
</article>
