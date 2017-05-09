  <div class="main">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 mt40">
          <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile; endif; ?>
        </div>
        <div class="col-sm-4 mt40">
          <div class="sidebar">
            <?php get_template_part('custom-sidebar'); ?>
          </div>
        </div>
      </div>
      
      <?php if(get_field('show_why_try_section')): ?>
        <?php get_template_part('why-try-section'); ?>
      <?php endif; ?>
      
      <?php if(get_field('show_featured_section')): ?>
        <?php get_template_part('featured-section'); ?>
      <?php endif; ?>
    </div>
  </div>
