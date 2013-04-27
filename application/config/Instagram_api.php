<?php

/*
|--------------------------------------------------------------------------
| Instagram
|--------------------------------------------------------------------------
|
| Instagram client details
|
*/

$config['instagram_client_name']	= 'nam-ig';
$config['instagram_client_id']		= 'c69db0b00eb043fa87b111ba9ee87174';
$config['instagram_client_secret']	= 'fce9aaa293604ac78a2303826348e88e';
$config['instagram_callback_url']	= '';
$config['instagram_website']		= '';
$config['instagram_description']	= '';

// There was issues with some servers not being able to retrieve the data through https
// If you have this problem set the following to FALSE
// See https://github.com/ianckc/CodeIgniter-Instagram-Library/issues/5 for a discussion on this
$config['instagram_ssl_verify']		= FALSE;