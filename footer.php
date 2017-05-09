    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-5">
            <div class="social">
              <a href="<?php the_field('facebook', 'option'); ?>" class="facebook"></a>
              <a href="<?php the_field('twitter', 'option'); ?>" class="twitter"></a>
              <a href="<?php the_field('google_plus', 'option'); ?>" class="google-plus"></a>
              <a href="<?php the_field('instagram', 'option'); ?>" class="instagram"></a>
            </div>
            <h3 class="text-center">Follow Us</h3>
          </div>
          <div class="col-sm-2">
            <hr class="hr-vertical" />
          </div>
          <div class="col-sm-5">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aim-digital-logo-white.png" class="img-responsive" alt="" style="margin-left:auto;" />
            <div class="footer-contact">
              <p><?php the_field('address_1', 'option'); ?><br /><?php the_field('address_2', 'option'); ?></p>
              <p>Phone: <?php the_field('phone_number', 'option'); ?><br />E-Mail: <?php the_field('contact_email', 'option'); ?></p>
            </div>
          </div>
        </div>
        <p class="childress">website created by <a href="http://childressagency.com">The Childress Agency</a></p>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>