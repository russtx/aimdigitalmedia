        <div class="row">
          <div class="col-sm-5 mt40">
          <a class="twitter-timeline" href="https://twitter.com/Aim_Advertising" data-widget-id="712458499884711936" data-chrome="nofooter">Tweets by @Aim_Advertising</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          </div>
          <div class="col-sm-2 hidden-xs mt40">
            <hr class="hr-vertical" />
          </div>
          <div class="col-sm-5 mt40">
            <div class="featured-content">
              <?php $franchises_page_id = 38; ?>
              <img src="<?php the_field('franchises_featured_section_image', $franchises_page_id); ?>" class="img-responsive center-block" alt="" />
              <h3><?php the_field('franchises_featured_section_subtitle', $franchises_page_id); ?></h3>
              <h3 class="primary-color"><?php the_field('franchises_featured_section_title', $franchises_page_id); ?></h3>
              <div class="content">
                <?php the_field('franchises_featured_section_text', $franchises_page_id); ?>
                <hr />
                <h3><a href="<?php echo home_url('franchises'); ?>">Learn More &gt;</a></h3>
              </div>
            </div>
          </div>
        </div>
