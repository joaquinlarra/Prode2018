<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
|
| https://www.mercadopago.com.ar/developers/es/solutions/payments/basic-checkout/receive-payments/
|
*/
// Custom Checkout
$config['app_id'] = ''; // not used by the Library
$config['public_key'] = '';  // not used by the Library
$config['access_token'] = '';
$config['use_access_token'] = FALSE; // TRUE or FALSE
// Basic Checkout
$config['client_id'] = '7673799325680074';
$config['client_secret'] = 'dTV2Stqw0mPnF5Eat1j3o2duuP01qtD5';
// Sandbox
$config['sandbox_mode'] = TRUE; // TRUE or FALSE
/* End of file mercadopago.php */
/* Location: ./application/config/mercadopago.php */