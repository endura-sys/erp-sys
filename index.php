<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 */
/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */

/** Loads the WordPress Environment and Template */
// header('Location: /template/dashboard.php');
require __DIR__ . '/template/dashboard.php';
