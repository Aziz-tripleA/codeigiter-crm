<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------
// Paypal IPN Class
// ------------------------------------------------------------------------
// Use PayPal on Sandbox or Live
$ci =& get_instance();
$paypal_setup = $ci->db->select('*')->from('payment_account_setup')->get()->row();


$config['sandbox'] = @$paypal_setup->status; // FALSE for live environment
// PayPal Business Email ID
$config['business'] = @$paypal_setup->paypal_email;
// If (and where) to log ipn to file
$config['paypal_lib_ipn_log_file'] = BASEPATH . 'logs/paypal_ipn.log';
$config['paypal_lib_ipn_log'] = TRUE;

// Where are the buttons located at 
$config['paypal_lib_button_path'] = 'buttons';
// What is the default currency?
$config['paypal_lib_currency_code'] = 'USD';




?>
