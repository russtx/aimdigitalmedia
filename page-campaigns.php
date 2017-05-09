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
          <div class="mt40" style="max-width:555px; margin-left:auto; margin-right:auto;">
            <div class="package-header">
              <h1><?php the_field('product_title'); ?></h1>
            </div>
            <div class="package-block">
              <?php the_field('product_description'); ?>
            </div>
          </div>
				<div class="row">
          <?php if(have_rows('fast_facts')) : $i=0; while(have_rows('fast_facts')) : the_row(); ?>
						<?php if($i%2==0){ echo '<div class="clearfix"></div>'; } ?>
						<div class="col-sm-6 mt40">
              <div class="info-block mt40">
                <img src="<?php the_sub_field('fast_fact_image'); ?>" class="img-responsive center-block" alt="" />
                <h5 class="caption text-right"><?php the_sub_field('fast_fact_image_caption'); ?></h5>
                <div class="row fast-fact">
                  <div class="col-sm-6">
                    <img src="<?php the_sub_field('fast_fact_icon'); ?>" class="img-responsive center-block" alt="" />
                  </div>
                  <div class="col-sm-6 border-left">
                    <h4>Did You Know?</h4>
                    <p><?php the_sub_field('fast_fact_text'); ?></p>
                  </div>
                </div>
						  </div>
						</div>
					<?php $i++; endwhile; endif; ?>
				</div>
      <div style="margin-top:100px;">
      <?php if(get_field('show_why_try_section')): ?>
        <?php get_template_part('why-try-section'); ?>
      <?php endif; ?>
      </div>
      
      <?php if(get_field('show_featured_section')): ?>
        <?php get_template_part('featured-section'); ?>
      <?php endif; ?>
		</div>
	</div>
    
<?php get_footer(); ?>