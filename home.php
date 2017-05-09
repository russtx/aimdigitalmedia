<?php get_header(); ?>
    <div class="main">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 mt40">
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
              <div class="blog-post">
                <h3 class="blog-date"><?php the_date(); ?></h3>
                <?php 
                  $featured_image = get_stylesheet_directory_uri() . '/images/placeholder-image.jpg';
                  if(get_field('featured_image')){ $featured_image = get_field('featured_image'); }
                  global $post;
                  $post_slug = $post->post_name;
                ?>
                <img src="<?php echo $featured_image; ?>" class="img-responsive" alt="" />
                <h3 class="blog-title"><?php the_title(); ?></h3>
                <div class="blog-content">
                  <?php the_content(); ?>
                </div>
                <h3 class="read-more"><a href="#<?php echo $post_slug; ?>" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="<?php echo $post_slug; ?>">Read More <span class="glyphicon glyphicon-menu-down"></span></a></h3>
                <div class="share-this">
                  <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { 
                      ADDTOANY_SHARE_SAVE_KIT( array( 'use_current_page' => true ) );
                  } ?>
                </div>
                <h3 class="text-center">Share This</h3>
              </div>
            <?php endwhile; endif; ?>
          </div>
          <div class="col-sm-4 mt40">
            <div class="sidebar">
              <?php get_template_part('custom-sidebar'); ?>
            </div>
          </div>
        </div>
        <?php if(get_field('show_featured_section')): ?>
          <?php get_template_part('featured-section'); ?>
        <?php endif; ?>
      </div>
    </div>
<?php get_footer(); ?>