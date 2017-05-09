<?php
add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'aimdigital_scripts', 100);
function aimdigital_scripts(){
  wp_register_script(
    'bootstrap-script', 
    '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', 
    array('jquery'), 
    '', 
    true
  );
  wp_register_script(
    'bootstrap-slider-js',
    get_template_directory_uri() . '/js/bootstrap-slider.min.js',
    array('jquery'),
    '',
    true
  );
  wp_register_script(
    'google-maps-api',
    '//maps.googleapis.com/maps/api/js?key=AIzaSyCcnmDH-cpi7cF_udLCh7hm9R3SoFb9wqk',
    array('jquery'),
    '',
    true
  );
  wp_register_script(
    'aimdigital-scripts', 
    get_template_directory_uri() . '/js/aimdigital-scripts.js', 
    array('jquery'), 
    '', 
    true
  );
  
  
  wp_enqueue_script('bootstrap-script');
  wp_enqueue_script('bootstrap-slider-js');
  if(is_page('contact')){
    wp_enqueue_script('google-maps-api');
  }
  wp_enqueue_script('aimdigital-scripts');  
}

add_action('wp_enqueue_scripts', 'aimdigital_styles');
function aimdigital_styles(){
  wp_register_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
  wp_register_style('google-font', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800italic');
  wp_register_style('bootstrap-slider-css', get_template_directory_uri(). '/css/bootstrap-slider.min.css');
  wp_register_style('aimdigital', get_template_directory_uri() . '/style.css');
  
  wp_enqueue_style('google-font');
  wp_enqueue_style('bootstrap-css');
  wp_enqueue_style('bootstrap-slider-css');
  wp_enqueue_style('aimdigital');
}

register_nav_menu( 'header-nav', 'Header Navigation' );

/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class wp_bootstrap_navwalker extends Walker_Nav_Menu {

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ( $args->has_children )
				$class_names .= ' dropdown';

			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				//$atts['href']   		= '#';
                                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
				//$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .' class="bold"><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .' class="bold">';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';

				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';

			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';

			if ( $container )
				$fb_output .= '</' . $container . '>';

			echo $fb_output;
		}
	}
}

add_shortcode('aimdigital_read_more', 'aimdigital_read_more');
function aimdigital_read_more($atts, $content=null){
  global $post;
  if(!is_single()){
    return '<div class="collapse" id="' . $post->post_name . '">' . $content . '</div>';
  }
  else{
    return $content;
  }
}

if(function_exists('acf_add_options_page')){
  acf_add_options_page(array(
    'page_title' => 'AIM Digital General Settings',
    'menu_title' => 'AIM Digital General Settings',
    'menu_slug' => 'aim-digital-general-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
  
  //acf_add_options_page(array(
  //  'page_title' => 'Why Try Section Settings',
  //  'menu_title' => 'Why Try Section Settings',
  //  'menu_slug' => 'why-try-section-settings',
  //  'capability' => 'edit_posts',
  //  'redirect' => false
  //));
}

require_once('woo-functions.php');

// crm
add_action('init', 'cai_create_post_type');
function cai_create_post_type(){
  $clients_labels = array(
    'name' => 'Clients',
    'singular_name' => 'Client',
    'menu_name' => 'Clients',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Client',
    'search_items' => 'Search Clients',
    'edit_item' => 'Edit Client',
    'new_item' => 'New Client',
    'view_item' => 'View Clients',
    'not_found' => 'No Clients Found'
  );
  $clients_args = array(
    'labels' => $clients_labels,
    'capabilities' => array(
      'edit_others_posts'     => 'edit_others_clients',
      'delete_others_posts'   => 'delete_others_clients',
      'delete_private_posts'  => 'delete_private_clients',
      'edit_private_posts'    => 'edit_private_clients',
      'read_private_posts'    => 'read_private_clients',
      'edit_published_posts'  => 'edit_published_clients',
      'publish_posts'         => 'publish_clients',
      'delete_published_posts'=> 'delete_published_clients',
      'edit_posts'            => 'edit_clients',
      'delete_posts'          => 'delete_clients',
      'edit_post'             => 'edit_client',
      'read_post'             => 'read_client',
      'delete_post'           => 'delete_client',
    ),
    'map_meta_cap' => true,
    'show_in_menu' => true,
    'show_ui' => true,
    'public' => false,
    'menu_position' => 5,
    'query_var' => 'clients',
    'supports' => array('title', 'author', 'editor', 'custom_fields')
  );
    
  register_post_type('clients', $clients_args);  
}

add_filter('manage_clients_posts_columns', 'cai_set_clients_columns');
function cai_set_clients_columns($columns){
  return array(
    'cb' => '<input type="checkbox" />',
    'title' => __('Client'),
    'website' => __('Website'),
    'author' => __('Sales Associate')
  );
}

add_action('manage_clients_posts_custom_column', 'cai_manage_clients_columns', 10, 2);
function cai_manage_clients_columns($column, $post_id){
  switch($column){
    case 'website':
      $website = get_field('website_url', $post_id);
      echo $website;
    break;
  }
}

add_filter('manage_edit-clients_sortable_columns', 'cai_manage_sortable_columns');  
function cai_manage_sortable_columns($columns){
  $columns['author'] = 'author';
  return $columns;
}

add_filter('gettext', 'cai_change_title_text');
function cai_change_title_text($input){
  global $post_type;
  if($input == 'Enter title here'){
    if($post_type == 'clients'){
      return 'Enter Company Name';
    }
  }
  if($input == 'Author'){
    if($post_type == 'clients'){
      return 'Sales Associate';
    }
  }
  return $input;
}

add_action('after_switch_theme', 'cai_add_new_roles');
function cai_add_new_roles(){
  //This gives these roles author capabilities allowing them to show up
  // in dropdown menu for changing brand manager
  $sales_manager = get_role('sales_manager');
  $sales_manager->add_cap('level_1');
  
  $brand_manager = get_role('sales_associate');
  $brand_manager->add_cap('level_1');
}

add_filter('acf/load_value/key=field_573347c27343b', 'cai_default_client_added_date', 10, 3);
function cai_default_client_added_date($value, $post_id, $field){
  if($value == '' || $value == null){
    //$value = apply_filters(date('Ymd'), $value);
    $value = date('m/d/Y');
  }
  return $value;
}

add_filter('acf/load_field/key=field_573347c27343b', 'cai_disable_client_added_date');
function cai_disable_client_added_date($field){
  $field['readonly'] = true;
  $field['disabled'] = false;
  return $field;
}

add_action('acf/init', 'aim_acf_init');
function aim_acf_init(){
  acf_update_setting('google_api_key', 'AIzaSyCcnmDH-cpi7cF_udLCh7hm9R3SoFb9wqk');
}