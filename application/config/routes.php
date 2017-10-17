<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Guest';
$route['Guest'] = 'command';
$route['command'] = 'Command';

$route['404_override'] = 'Notfound';
$route['translate_uri_dashes'] = FALSE;