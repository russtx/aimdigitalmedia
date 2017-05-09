<?php
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action('woocommerce_before_main_content', 'aimdigital_wrapper_start', 10);
function aimdigital_wrapper_start(){
  echo '<div class="main"><div class="container">';
}

remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_after_main_content', 'aimdigital_wrapper_end', 10);
function aimdigital_wrapper_end(){
  echo '</div></div>';
}

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

add_filter('woocommerce_subscriptions_product_price_string', 'change_one_time_payment');
add_filter('woocommerce_subscription_price_string', 'change_one_time_payment');
function change_one_time_payment($pricestring){
    $newstring = str_replace('Free! ', '', $pricestring);
    $newstring = str_replace('$0.00', 'test', $newstring);
    //$newstring = str_replace('/', '', $newstring);
    $contract_length = '';
    if(strpos($newstring, '6 months') > 1){
      $contract_length = 'for 6-month contract';
    }
    else if(strpos($newstring, '12 months') > 1){
      $contract_length = 'for 12-month contract';
    }
    $newstring = str_replace('/ month for 6 months and a ', '', $newstring);
    $newstring = str_replace('/ month for 12 months and a ', '', $newstring);
    $newstring = str_replace('sign-up fee', $contract_length, $newstring);
  return $newstring;
}

add_filter('woocommerce_cart_item_subtotal', 'remove_zero');
function remove_zero($pricestring){
  $string = '&#36;0.00';
  $pricestring = str_replace($string, '', $pricestring);
  return $pricestring;
}

add_filter('woocommerce_billing_fields', 'format_woocommerce_billing_fields');
function format_woocommerce_billing_fields($fields){
  foreach($fields as &$field){
    $field['input_class'][] = 'form-control';
    $field['label_class'][] = 'sr-only';
  }
  $fields['billing_country']['input_class'] = array('');
  
  $fields['billing_first_name']['placeholder'] = 'FIRST NAME';
  $fields['billing_first_name']['class'] = array('form-row form-row-wide validate-required');
  
  $fields['billing_last_name']['placeholder'] = 'LAST NAME';
  $fields['billing_last_name']['class'] = array('form-row form-row-wide validate-required');
  
  $fields['billing_company']['placeholder'] = 'COMPANY';
  
  $fields['billing_email']['placeholder'] = 'E-MAIL ADDRESS';
  $fields['billing_email']['class'] = array('form-row form-row-wide validate-required validate-email');
  
  $fields['billing_phone']['placeholder'] = 'PHONE';
  $fields['billing_phone']['class'] = array('form-row form-row-wide validate-required validate-phone');
  
  $fields['billing_address_1']['placeholder'] = 'STREET ADDRESS';
  $fields['billing_address_2']['placeholder'] = 'STREET ADDRESS 2';
  $fields['billing_city']['placeholder'] = 'CITY';

  $fields['billing_state']['input_class'] = array('');
  $fields['billing_state']['class'][] = 'col-sm-6';
  
  $fields['billing_postcode']['class'][] = 'col-sm-6';
  $fields['billing_postcode']['placeholder'] = 'ZIP';
  
  return $fields;
}

add_filter('woocommerce_shipping_fields', 'format_woocommerce_shipping_fields');
function format_woocommerce_shipping_fields($fields){
  foreach($fields as &$field){
    $field['input_class'][] = 'form-control';
    $field['label_class'][] = 'sr-only';
  }
  
  $fields['shipping_state']['input_class'] = array('');
  $fields['shipping_country']['input_class'] = array('');
  
  $fields['shipping_first_name']['placeholder'] = 'FIRST NAME';
  $fields['shipping_first_name']['class'] = array('form-row form-row-wide validate-required');
  
  $fields['shipping_last_name']['placeholder'] = 'LAST NAME';
  $fields['shipping_last_name']['class'] = array('form-row form-row-wide validate-required');
  
  $fields['shipping_address_1']['placeholder'] = 'STREET ADDRESS';
  $fields['shipping_address_2']['placeholder'] = 'STREET ADDRESS 2';
  $fields['shipping_city']['placeholder'] = 'CITY';
  $fields['shipping_state']['class'][] = 'col-sm-6';
  $fields['shipping_postcode']['placeholder'] = 'ZIP';
  $fields['shipping_postcode']['class'][] = 'col-sm-6';
  
  return $fields;
}

add_filter('woocommerce_checkout_fields', 'format_woocommerce_checkout_fields');
function format_woocommerce_checkout_fields($fields){
  $fields['order']['order_comments']['class'][] = 'form-group';
  $fields['order']['order_comments']['input_class'][] = 'form-control';
  $fields['order']['order_comments']['label_class'][] = 'sr-only';
  
  $fields['account']['account_password']['input_class'][] = 'form-control';
  $fields['account']['account_password']['label_class'][] = 'sr-only';
  
  return $fields;
}

add_action('woocommerce_after_order_notes', 'how_hear_field');
function how_hear_field($checkout){
  echo '<div id="how-hear-about" class="form-group">';
  
  woocommerce_form_field('how_hear_about', array(
    'type' => 'select',
    'class' => array('control-label'),
    'label' => __('How did you hear about us?'),
    'input_class' => array('form-control'),
    'options' => array('sales-rep' => 'Sales Representative (Enter name below)', 'internet-search' => 'Internet Search', 'other' => 'Other (Please specify)'),
    ), $checkout->get_value('how_hear_about'));
  echo '</div>';
  
  echo '<div id="sales-rep" class="form-group more-info">';
  woocommerce_form_field('sales_rep', array(
    'type' => 'text',
    'class' => array('control-label'),
    'label' => __('Enter the name of your sales representative here'),
    'input_class' => array('form-control'),
    ), $checkout->get_value('sales_rep'));
  echo '</div>';
  
  echo '<div id="other" class="form-group more-info">';
  woocommerce_form_field('hear_about_other', array(
    'type' => 'text',
    'class' => array('control-label'),
    'label' => __('Please specify'),
    'input_class' => array('form-control'),
    ), $checkout->get_value('hear_about_other'));
  echo '</div>';
}

add_action('woocommerce_checkout_update_order_meta', 'hear_about_update_order_meta');
function hear_about_update_order_meta($order_id){
  if(!empty($_POST['how_hear_about'])){
    update_post_meta($order_id, 'How Heard About', sanitize_text_field($_POST['how_hear_about']));
  }
  if(!empty($_POST['sales_rep'])){
    update_post_meta($order_id, 'Sales Representative', sanitize_text_field($_POST['sales_rep']));
  }
  if(!empty($_POST['hear_about_other'])){
    update_post_meta($order_id, 'Other', sanitize_text_field($_POST['hear_about_other']));
  }
}

add_action('woocommerce_admin_order_data_after_billing_address', 'how_hear_about_admin_display', 10, 1);
function how_hear_about_admin_display($order){
  echo '<p><strong>' . __('How Heard About') . ':</strong> ' . get_post_meta($order->id, 'How Heard About', true) . '</p>';
  echo '<p><strong>' . __('Sales Representative') . ':</strong> ' . get_post_meta($order->id, 'Sales Representative', true) . '</p>';
  echo '<p><strong>' . __('Other') . ':</strong> ' .get_post_meta($order->id, 'Other', true) . '</p>';
}
