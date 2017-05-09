<?php get_header(); ?>
  <?php 
    if(get_field('sidebar_layout')){
      get_template_part('sidebar-layout');
    }
    else{
      get_template_part('regular-layout');
    }
  ?>
<?php get_footer(); ?>