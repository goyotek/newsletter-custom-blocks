<?php
/*
  Plugin Name: Newsletter - Custom Blocks
  Description: Custom blocks for the Newsletter composer
  Version: 1.0.0
  Author: Gregor Kleczkowski
  Disclaimer: Use at your own risk. No warranty expressed or implied is provided.
  Text Domain: newsletter-custom-blocks
  License: GPLv2 or later
  Requires PHP: 5.6
  Requires at least: 5.0.0
*/

// Please, register this action not limited to the admin side, since the block needs to be available even
// on frontend. 
// The action is fired only when Newsletter needs the blocks so there is no overhead.

add_action('newsletter_register_blocks', function () {
    // Register blocks
    TNP_Composer::register_block(__DIR__ . '/dummy');
    TNP_Composer::register_block(__DIR__ . '/img-txt-cta');
    TNP_Composer::register_block(__DIR__ . '/img-txt');
    TNP_Composer::register_block(__DIR__ . '/variabel-layout');
});


