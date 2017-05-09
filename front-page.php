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
  <?php endif; ?>    <h2 style="text-align:center; font-style:italic; color:#053c5e; padding-top: 30px;">ADVERTISING <span style="color:#f02d3a;">In Motion</span></h2>
  <div class="embed-responsive embed-responsive-16by9" style="/*max-width:1400px ;*/ margin-left:auto; margin-right:auto;">
    <video controls autoplay loop>
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/images/AIM_Edit1_v1.mp4" type="video/mp4" />
    </video>
  </div>

    <div class="main">
      <?php $i = 1; if(have_rows('info_sections')) : while(have_rows('info_sections')) : the_row(); ?>
        <div class="section-row row<?php if($i%2==0){ echo ' text-right'; } ?>" style="background-image:url(<?php the_sub_field('background_image'); ?>); <?php the_sub_field('background_image_css'); ?>">
          <div class="col-sm-6<?php if($i%2==0){ echo ' col-sm-push-6'; } ?>">
            <?php if(get_sub_field('overlay_image')): ?>
              <div class="section-row-image">
                <img src="<?php the_sub_field('overlay_image'); ?>" class="img-responsive" alt="" />
              </div>
            <?php else: ?>
              <div class="section-row-image visible-xs-block" style="min-height:465px; background-image:url(<?php the_sub_field('background_image'); ?>); <?php the_sub_field('background_image_css'); ?>"></div>
            <?php endif; ?>
          </div>
          <div class="col-sm-6<?php if($i%2==0){ echo ' col-sm-pull-6'; } ?>">
            <div class="section-row-text">
              <h3><?php the_sub_field('info_section_subtitle'); ?></h3>
              <h1><?php the_sub_field('info_section_title'); ?></h1>
              <?php the_sub_field('info_section_text'); ?>
              <p class="btn-red">
                <a href="<?php the_sub_field('info_section_link'); ?>"><?php the_sub_field('info_section_link_text'); ?></a>
              </p>
            </div>
          </div>
        </div>
      <?php $i++; endwhile; endif; ?>
      <div class="container">
        <?php if(get_field('show_featured_section')): ?>
          <?php get_template_part('featured-section'); ?>
        <?php endif; ?>
      </div>
    </div>
<?php get_footer(); ?>
