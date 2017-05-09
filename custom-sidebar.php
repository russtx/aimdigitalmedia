<?php 
  $blog_page_id = 19;
  if(is_home() || is_archive()){
    $sidebar_widgets = get_field('sidebar_settings', $blog_page_id);
  }
  else{
    $sidebar_widgets = get_field('sidebar_settings');
  }

  if($sidebar_widgets): ?>
    <?php if(in_array('blog-categories', $sidebar_widgets)): ?>
      <div class="subpages">
        <h3>Blog Categories</h3>
        <ul>
          <?php
            //$current_cat = get_category(get_query_var('cat'));
            $all_cats = get_categories();
            foreach($all_cats as $cat){
              $active = '';
              if(is_archive() && get_category(get_query_var('cat'))->name == $cat->name){ $active = ' class="active"'; }
              echo '<li' . $active . '><a href="' . esc_url(get_category_link($cat->term_id)) . '">' . $cat->name . '</a></li>';
            }
          ?>
        </ul>
      </div>
    <?php endif; ?>
    <?php if(in_array('franchises', $sidebar_widgets)): ?>
      <div class="subpages">
        <h3>AIM Digital Franchises</h3>
        <ul>
          <li<?php if(is_page('franchise-requirements')){ echo ' class="active"'; }?>><a href="<?php echo home_url('franchise-requirements'); ?>">Requirements</a></li>
          <li<?php if(is_page('franchise-faqs')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('franchise-faqs'); ?>">FAQs</a></li>
          <li<?php if(is_page('contact')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('contact'); ?>">Contact</a></li>
        <ul>
      </div>
    <?php endif; ?>
    <?php if(in_array('contact-info', $sidebar_widgets)): ?>
      <div class="sidebar-contact">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aim-digital-logo.png" class="img-responsive" alt="Contact Us" />
        <p><?php the_field('address_1', 'option'); ?><br /><?php the_field('address_2', 'option'); ?></p>
        <p>Phone: <?php the_field('phone_number', 'option'); ?><br />E-Mail: <?php the_field('contact_email', 'option'); ?></p>
      </div>
    <?php endif; ?>
    <?php if(in_array('software-plug', $sidebar_widgets)): ?>
      <div class="software-plug">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/monitor-small.png" class="img-responsive" alt="Our Software" />
        <p>Learn how our software is innovating the outdoor advertising industry.</p>
        <h3><a href="<?php echo home_url('software'); ?>">Learn More &gt;</a></h3>
      </div>
    <?php endif; ?>
<?php endif; ?>