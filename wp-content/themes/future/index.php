<?php get_header();	?>

<?php get_template_part( 'loop-meta' ); ?>

<div class="<?php future_cs_layout( array( 'cs_layout_bone' => 'content_sidebar_wrapper_class' ) ); ?>">
  <div class="container">
    <div class="row">
  
      <div class="<?php future_cs_layout( array( 'cs_layout_bone' => 'content_column_class' ) ); ?>">
        <main class="content" >	  
  	  
  	      <?php if ( have_posts() ) : ?>
        
            <?php while ( have_posts() ) : the_post(); ?>
          
              <?php get_template_part( 'content', get_post_format() ); ?>
          
            <?php endwhile; ?>
        
          <?php else : ?>
                    
            <?php get_template_part( 'loop-error' ); ?>
        
          <?php endif; ?>
        
          <?php future_loop_nav(); ?>
      
        </main>
      </div>
    
      <?php get_sidebar(); ?>

    </div>
  </div>
</div>
  
<?php get_footer(); ?>