<?php
/**
 * Plugin Name:       WP Options Page Demo
 * Description:       Plugin to test the WP Options Page library
 * Author:            Luiz Bills
 * Version:           1.0.0
 */

defined( 'ABSPATH' ) || die();

// load the library
require_once __DIR__ . '/vendor/autoload.php';

// load the addons
require_once __DIR__ . '/addons/tabs.php';
require_once __DIR__ . '/addons/rich_text_field.php';

// load the pages
require_once __DIR__ . '/pages/simple.php';
require_once __DIR__ . '/pages/advanced.php';
require_once __DIR__ . '/pages/with_tabs.php';
