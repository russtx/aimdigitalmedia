<div class="main">
  <div class="container">
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; endif; ?>
    
    <?php if(get_field('show_why_try_section')): ?>
      <?php get_template_part('why-try-section'); ?>
    <?php endif; ?>
    
    <?php if(get_field('show_featured_section')): ?>
      <?php get_template_part('featured-section'); ?>
    <?php endif; ?>
  </div>
</div>
