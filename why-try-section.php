        <h3 class="text-center" style="margin-top:60px;">WHY TRY</h3>
        <h1 class="text-center">Mobile, Digital Ads?</h1>
        <div class="row">
          <div class="col-sm-4">
            <div class="small-info-block">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/easy-management-icon.png" class="img-responsive center-block" alt="" />
              <h3>Easy Management</h3>
              <?php if(is_page('software')): ?>
                <?php the_field('easy_management_content'); ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="small-info-block">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/targeted-campaigns-icon.png" class="img-responsive center-block" alt="" />
              <h3>Targeted Campaigns</h3>
              <?php if(is_page('software')): ?>
                <?php the_field('targeted_campaigns_content'); ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="small-info-block">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flexible-contracts-icon.png" class="img-responsive center-block" alt="" />
              <h3>Flexible Campaigns</h3>
              <?php if(is_page('software')): ?>
                <?php the_field('flexible_campaigns_content'); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php if(!is_page('software')): ?>
          <p class="btn-red">
            <a href="<?php echo home_url('software'); ?>">Learn More</a>
          </p>
        <?php endif; ?>