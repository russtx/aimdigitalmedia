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
  
  <?php 
    if(get_field('show_sidebar')){
      get_template_part('sidebar-layout');
    }
    else{
      get_template_part('regular-layout');
    }
  ?>
<?php get_footer(); ?>