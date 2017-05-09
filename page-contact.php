<?php get_header(); ?>
  <?php if(get_field('show_hero_section')): ?>
    <?php
      $hero_image = get_stylesheet_directory_uri() . '/images/hero-home.jpg';
      if(get_field('hero_image')){ $hero_image = get_field('hero_image'); }
    ?>
    <div class="hero" style="background-image:url(<?php echo $hero_image; ?>); <?php the_field('hero_image_css'); ?>">
      <div class="caption">
        <h1><?php the_field('hero_title'); ?></h1>
        <h2 class="background-hr"><?php the_field('hero_subtitle'); ?></h2>
        <?php if(get_field('hero_link')): ?>
          <p class="btn-red">
            <a href="<?php the_field('hero_link'); ?>"><?php the_field('hero_link_text'); ?></a>
          </p>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
    <div class="main">
      <div class="container">
        <div class="col-sm-6">
          <h3>WE'RE ALL EARS</h3>
          <h1>Contact Us</h1>
          <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile; endif; ?>
        </div>
        <div class="col-sm-6">
          <?php 
            $location = get_field('location');
            if(!empty($location)): ?>
              <div class="acf-map">
                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
              </div>
            <?php endif; ?>
          <hr />
          <div class="social social-red">
            <a href="<?php the_field('facebook', 'option'); ?>" class="facebook"></a>
            <a href="<?php the_field('twitter', 'option'); ?>" class="twitter"></a>
            <a href="<?php the_field('google_plus', 'option'); ?>" class="google-plus"></a>
            <a href="<?php the_field('instagram', 'option'); ?>" class="instagram"></a>
          </div>
          <h2 class="text-center">Follow Us</h2>
        </div>
      </div>
    </div>

<?php get_footer(); ?>