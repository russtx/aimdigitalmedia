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
        <div class="market-research">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/market-research-icon.png" class="img-responsive center-block" alt="Market Research" />
          <h3><?php the_field('market_research_title'); ?></h3>
          <?php the_field('market_research_content'); ?>
          <?php if(get_field('market_research_pdf')): ?>
            <p class="btn-red">
              <a href="<?php the_field('market_research_pdf'); ?>">Download PDF</a>
            </p>
          <?php endif; ?>
        </div>
      </div>
      <div class="container container-sm-height">
        <div class="row row-sm-height mt40">
          <div class="col-sm-5 col-sm-height mt60">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fast-fact-speedometer-lg.png" class="img-responsive center-block" alt="" />
          </div>
          <div class="col-sm-1 col-sm-height border-left"></div>
          <div class="col-sm-6 col-sm-height mt60">
            <h3 class="dyk">Did You Know?</h3>
            <?php the_field('fast_fact_speedometer'); ?>
          </div>
        </div>
      </div>
      <div class="container container-sm-height">
        <div class="row row-sm-height mt40">
          <div class="col-sm-5 col-sm-push-7 col-sm-height mt60">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fast-fact-person-car-lg.png" class="img-responsive center-block" alt="" />
          </div>
          <div class="col-sm-1 col-sm-push-1 col-sm-height border-right"></div>
          <div class="col-sm-6 col-sm-pull-6 col-sm-height text-right mt60">
            <h3 class="dyk">Did You Know?</h3>
            <?php the_field('fast_fact_person_car'); ?>
          </div>
        </div>
      </div>
      <div class="container container-sm-height">
        <div class="row row-sm-height mt40">
          <div class="col-sm-5 col-sm-height mt60">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fast-fact-people-target-lg.png" class="img-responsive center-block" alt="" />
          </div>
          <div class="col-sm-1 col-sm-height border-left"></div>
          <div class="col-sm-6 col-sm-height mt60">
            <h3 class="dyk">Did You Know?</h3>
            <?php the_field('fast_fact_people_target'); ?>
          </div>
        </div>
      </div>
      <div class="container container-sm-height">
        <div class="row row-sm-height mt40">
          <div class="col-sm-5 col-sm-push-7 col-sm-height mt60">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fast-fact-gps-lg.png" class="img-responsive center-block" alt="" />
          </div>
          <div class="col-sm-1 col-sm-push-1 col-sm-height border-right"></div>
          <div class="col-sm-6 col-sm-pull-6 col-sm-height text-right mt60">
            <h3 class="dyk">Did You Know?</h3>
            <?php the_field('fast_fact_gps'); ?>
          </div>
        </div>
      </div>
      <div class="container">
        <hr class="hr-shadow" />
        <?php if(get_field('show_why_try_section')): ?>
          <?php get_template_part('why-try-section'); ?>
        <?php endif; ?>
        
        <?php if(get_field('show_featured_section')): ?>
          <?php get_template_part('featured-section'); ?>
        <?php endif; ?>
      </div>
    </div>
<?php get_footer(); ?>