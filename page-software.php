<?php get_header(); ?>
  <?php if(get_field('show_hero_section')): ?>
    <?php
      $hero_image = get_stylesheet_directory_uri() . '/images/hero-home.jpg';
      if(get_field('hero_image')){ $hero_image = get_field('hero_image'); }
    ?>
      <div class="hero" style="background-image:url(<?php echo $hero_image; ?>); <?php the_field('hero_image_css'); ?>">
        <div class="caption">
          <h1><?php the_field('hero_title'); ?></h1>
          <h2><?php the_field('hero_subtitle'); ?></h2>
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
        <div class="row">
          <div class="col-sm-5 border-right mt40">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/large-map-marker.jpg" class="img-responsive center-block" alt="" />
          </div>
          <div class="col-sm-6 col-sm-offset-1 mt40">
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
              <?php the_content(); ?>
            <?php endwhile; endif; ?>
          </div>
        </div>
      </div>
      <div class="container">
        <?php get_template_part('why-try-section'); ?>
        <div class="row mt60">
          <div class="col-sm-6 text-right mt40">
            <h3><?php the_field('feature_section_subtitle'); ?></h3>
            <h1><?php the_field('feature_section_title'); ?></h1>
            <?php the_field('feature_section_content'); ?>
          </div>
          <div class="col-sm-5 col-sm-offset-1 border-left mt40">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cell-phone.jpg" class="img-responsive center-block" alt="" />
            <h5 class="caption text-center"><?php the_field('cell_phone_image_caption'); ?></h5>
          </div>
        </div>
      </div>
      <div class="skyline">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/computer-map.png" class="img-responsive center-block" alt="" />
      </div>
      <!--<div class="section-row row">
        <div class="col-sm-6">
          <div class="section-row-image">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/stoplight.png" class="img-responsive" alt="" />
          </div>
        </div>
        <div class="col-sm-6">
          <div class="section-row-text">
            <h3><?php the_field('packages_section_subtitle'); ?></h3>
            <h1><?php the_field('packages_section_title'); ?></h1>
            <?php the_field('packages_section_content'); ?>
            <p class="btn-red" style="text-align:left;">
              <a href="<?php echo home_url('custom-campaign'); ?>">Customize Your Campaign</a>
            </p>
          </div>
        </div>
      </div> -->
    </div>

<?php get_footer(); ?>
