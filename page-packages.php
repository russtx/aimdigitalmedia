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
      <?php $premium_package_id = 159; ?>
        <div class="row">
          <div class="col-sm-6 mt60">
            <div class="package-block">
              <div class="package-header">
                <h1><?php echo get_the_title($premium_package_id); ?></h1>
                <h3 class="per-month"><?php the_field('number_of_ads_per_month', $premium_package_id); ?> Ads<span>Per Month</span></h3>
              </div>
              <div class="package-body">
                <?php if(have_rows('product_details_list', $premium_package_id)): ?>
                  <ul class="list-group row">
                    <?php while(have_rows('product_details_list', $premium_package_id)) : the_row(); ?>
                      <li class="list-group-item col-sm-6"><span><?php the_sub_field('product_detail'); ?></span></li>
                    <?php endwhile; ?>
                  </ul>
                <?php endif; ?>
              </div>
              <div class="package-footer">
                <h3>$<?php echo get_post_meta($premium_package_id, '_subscription_price', true); ?> / Per Month</h3>
                <p><?php the_field('package_short_description', $premium_package_id); ?></p>
              </div>  
            </div>
            <p class="btn-red">
              <a href="<?php echo home_url('product/premium'); ?>">Select Package</a>
            </p>
          </div>
          <div class="col-sm-6 mt60">
            <div class="best-deal">
              <img src="<?php the_field('product_featured_image', $premium_package_id); ?>" class="img-responsive center-block" alt="" />
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/best-deal-callout.png" class="best-deal-callout" alt="Best Deal!" />
            </div>
            <h5 class="caption text-right"><?php the_field('product_featured_image_caption', $premium_package_id); ?></h5>
            <div class="row fast-fact">
              <div class="col-sm-6">
                <img src="<?php the_field('fast_fact_icon', $premium_package_id); ?>" class="img-responsive center-block" alt="" />
              </div>
              <div class="col-sm-6 border-left">
                <h4>Did You Know?</h4>
                <p><?php the_field('fast_fact_text', $premium_package_id); ?></p>
              </div>
            </div>
          </div>
        </div>
      <?php $plus_package_id = 154; ?>
        <div class="row">
          <div class="col-sm-6 mt60">
            <div class="package-block">
              <div class="package-header">
                <h1><?php echo get_the_title($plus_package_id); ?></h1>
                <h3 class="per-month"><?php the_field('number_of_ads_per_month', $plus_package_id); ?> Ads<span>Per Month</span></h3>
              </div>
              <div class="package-body">
                <?php if(have_rows('product_details_list', $plus_package_id)): ?>
                  <ul class="list-group row">
                    <?php while(have_rows('product_details_list', $plus_package_id)) : the_row(); ?>
                      <li class="list-group-item col-sm-6"><span><?php the_sub_field('product_detail'); ?></span></li>
                    <?php endwhile; ?>
                  </ul>
                <?php endif; ?>
              </div>
              <div class="package-footer">
                <h3>$<?php echo get_post_meta($plus_package_id, '_subscription_price', true); ?> / Per Month</h3>
                <p><?php the_field('package_short_description', $plus_package_id); ?></p>
              </div>  
            </div>
            <p class="btn-red">
              <a href="<?php echo home_url('product/plus'); ?>">Select Package</a>
            </p>            
          </div>
          <div class="col-sm-6 mt60">
            <img src="<?php the_field('product_featured_image', $plus_package_id); ?>" class="img-responsive center-block" alt="" />
            <h5 class="caption text-right"><?php the_field('product_featured_image_caption', $plus_package_id); ?></h5>
            <div class="row fast-fact">
              <div class="col-sm-6">
                <img src="<?php the_field('fast_fact_icon', $plus_package_id); ?>" class="img-responsive center-block" alt="" />
              </div>
              <div class="col-sm-6 border-left">
                <h4>Did You Know?</h4>
                <p><?php the_field('fast_fact_text', $plus_package_id); ?></p>
              </div>
            </div>
          </div>
        </div>
      <?php $value_package_id = 147; ?>
        <div class="row">
          <div class="col-sm-6 mt60">
            <div class="package-block">
              <div class="package-header">
                <h1><?php echo get_the_title($value_package_id); ?></h1>
                <h3 class="per-month"><?php the_field('number_of_ads_per_month', $value_package_id); ?> Ads<span>Per Month</span></h3>
              </div>
              <div class="package-body">
                <?php if(have_rows('product_details_list', $value_package_id)): ?>
                  <ul class="list-group row">
                    <?php while(have_rows('product_details_list', $value_package_id)) : the_row(); ?>
                      <li class="list-group-item col-sm-6"><span><?php the_sub_field('product_detail'); ?></span></li>
                    <?php endwhile; ?>
                  </ul>
                <?php endif; ?>
              </div>
              <div class="package-footer">
                <h3>$<?php echo get_post_meta($value_package_id, '_subscription_price', true); ?> / Per Month</h3>
                <p><?php the_field('package_short_description', $value_package_id); ?></p>
              </div>  
            </div>
            <p class="btn-red">
              <a href="<?php echo home_url('product/value'); ?>">Select Package</a>
            </p>            
          </div>
          <div class="col-sm-6 mt60">
            <img src="<?php the_field('product_featured_image', $value_package_id); ?>" class="img-responsive center-block" alt="" />
            <h5 class="caption text-right"><?php the_field('product_featured_image_caption', $value_package_id); ?></h5>
            <div class="row fast-fact">
              <div class="col-sm-6">
                <img src="<?php the_field('fast_fact_icon', $value_package_id); ?>" class="img-responsive center-block" alt="" />
              </div>
              <div class="col-sm-6 border-left">
                <h4>Did You Know?</h4>
                <p><?php the_field('fast_fact_text', $value_package_id); ?></p>
              </div>
            </div>
          </div>
        </div>
      <?php $basic_package_id = 144; ?>
        <div class="row">
          <div class="col-sm-6 mt60">
            <div class="package-block">
              <div class="package-header">
                <h1><?php echo get_the_title($basic_package_id); ?></h1>
                <h3 class="per-month"><?php the_field('number_of_ads_per_month', $basic_package_id); ?> Ads<span>Per Month</span></h3>
              </div>
              <div class="package-body">
                <?php if(have_rows('product_details_list', $basic_package_id)): ?>
                  <ul class="list-group row">
                    <?php while(have_rows('product_details_list', $basic_package_id)) : the_row(); ?>
                      <li class="list-group-item col-sm-6"><span><?php the_sub_field('product_detail'); ?></span></li>
                    <?php endwhile; ?>
                  </ul>
                <?php endif; ?>
              </div>
              <div class="package-footer">
                <h3>$<?php echo get_post_meta($basic_package_id, '_subscription_price', true); ?> / Per Month</h3>
                <?php //$prod_meta = get_post_meta($basic_package_id); var_dump($prod_meta); ?>
                <p><?php the_field('package_short_description', $basic_package_id); ?></p>
              </div>  
            </div>
            <p class="btn-red">
              <a href="<?php echo home_url('product/basic'); ?>">Select Package</a>
            </p>            
          </div>
          <div class="col-sm-6 mt60">
            <img src="<?php the_field('product_featured_image', $basic_package_id); ?>" class="img-responsive center-block" alt="" />
            <h5 class="caption text-right"><?php the_field('product_featured_image_caption', $basic_package_id); ?></h5>
            <div class="row fast-fact">
              <div class="col-sm-6">
                <img src="<?php the_field('fast_fact_icon', $basic_package_id); ?>" class="img-responsive center-block" alt="" />
              </div>
              <div class="col-sm-6 border-left">
                <h4>Did You Know?</h4>
                <p><?php the_field('fast_fact_text', $basic_package_id); ?></p>
              </div>
            </div>
          </div>
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