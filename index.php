<?php get_header(); ?>
<div class="main">
  <div class="container">
    <?php if(have_posts()) : while(have_posts()): the_post(); ?>
      <div class="blog-post">
        <h3 class="blog-date"><?php the_date(); ?></h3>
        <?php if(get_field('featured_image')): ?>
          <img src="<?php the_field('featured_image'); ?>" class="img-responsive" alt="" />
        <?php endif; ?>
        <h3 class="blog-title"><?php the_title(); ?></h3>
        <div class="blog-content">
          <?php the_excerpt(); ?>
        </div>
        <h3 class="read-more"><a href="<?php the_permalink(); ?>">Read More &gt;</a></h3>        
      </div>
    <?php endwhile; endif; ?>
  </div>
</div>
<?php get_footer(); ?>