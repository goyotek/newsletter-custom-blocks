<?php
/*
 * Name: Variabel Layout
 * Section: content
 * Description: A block with an image, title, text and a CTA button rendered with selectable layouts
 */

/* @var $options array */
/* @var $composer array */
/* @var $context array */
/* @var $dir string */
/* @var $align_left string */

$defaults = array(
    'layout' => 'one',
    'image' => array(),
    'title' => 'Your stunning title',
    'title_font_family' => '',
    'title_font_size' => '',
    'title_font_weight' => '',
    'title_font_color' => '',
    'text' => 'Your nice text to describe whatever you want to describe.',
    'text_font_family' => '',
    'text_font_size' => '',
    'text_font_weight' => '',
    'text_font_color' => '',
    'text_font_align' => '',
    'button_text' => 'Click Here',
    'button_link' => '#',
    'button_background' => '#b31e55',
    'button_color' => '#f3f6f4',
    'button_padding_vertical' => 10,
    'button_padding_horizontal' => 25,
    'button_font_family' => '',
    'button_font_size' => '',
    'button_font_weight' => '',
    'button_font_color' => '',
    'text_padding_left' => 0,
    'text_padding_right' => 0,
    'block_padding_left' => 15,
    'block_padding_right' => 15,
    'block_padding_top' => 15,
    'block_padding_bottom' => 15,
    'block_background' => '',
);

$options = array_merge($defaults, $options);

$title = wp_kses_post($options['title']);
$text = wp_kses_post($options['text']);

$show_button = !empty($options['button_text']);

// The $media is an object containing the image URL and the size to specify in the HTML tag. The image is resized at
// 2x to be sharp on mobile devices. Layouts shrink it with set_width() when a smaller image is needed.
$media = null;
if (!empty($options['image']['id'])) {
    $media = tnp_resize_2x($options['image']['id'], [$composer['content_width'], 0]);
}

// Fully inline styles generated from the block options, with the newsletter global styles as
// fallback, so nothing depends on <style> blocks or class to style conversion.
$title_style = 'font-family: ' . esc_attr(!empty($options['title_font_family']) ? $options['title_font_family'] : $composer['title_font_family']) . ';'
        . ' font-size: ' . esc_attr(!empty($options['title_font_size']) ? $options['title_font_size'] : $composer['title_font_size']) . 'px;'
        . ' font-weight: ' . esc_attr(!empty($options['title_font_weight']) ? $options['title_font_weight'] : $composer['title_font_weight']) . ';'
        . ' color: ' . esc_attr(!empty($options['title_font_color']) ? $options['title_font_color'] : $composer['title_font_color']) . ';'
        . ' line-height: 130%; margin: 0;';

$text_style = 'font-family: ' . esc_attr(!empty($options['text_font_family']) ? $options['text_font_family'] : $composer['text_font_family']) . ';'
        . ' font-size: ' . esc_attr(!empty($options['text_font_size']) ? $options['text_font_size'] : $composer['text_font_size']) . 'px;'
        . ' font-weight: ' . esc_attr(!empty($options['text_font_weight']) ? $options['text_font_weight'] : $composer['text_font_weight']) . ';'
        . ' color: ' . esc_attr(!empty($options['text_font_color']) ? $options['text_font_color'] : $composer['text_font_color']) . ';'
        . ' line-height: 150%; margin: 0;';

if (!empty($options['text_font_align'])) {
    $text_style .= ' text-align: ' . esc_attr($options['text_font_align']) . ';';
}

$button_style = 'display: inline-block;'
        . ' color: ' . esc_attr(!empty($options['button_color']) ? $options['button_color'] : $composer['button_font_color']) . ';'
        . ' font-family: ' . esc_attr(!empty($options['button_font_family']) ? $options['button_font_family'] : $composer['button_font_family']) . ';'
        . ' font-size: ' . esc_attr(!empty($options['button_font_size']) ? $options['button_font_size'] : $composer['button_font_size']) . 'px;'
        . ' font-weight: ' . esc_attr(!empty($options['button_font_weight']) ? $options['button_font_weight'] : $composer['button_font_weight']) . ';'
        . ' line-height: 120%; margin: 0; text-decoration: none; text-transform: none;'
        . ' padding: ' . (int) $options['button_padding_vertical'] . 'px ' . (int) $options['button_padding_horizontal'] . 'px;'
        . ' mso-padding-alt: 0px; border-radius: 0px;';

$button_background = !empty($options['button_background']) ? $options['button_background'] : $composer['button_background_color'];

if ($options['layout'] == 'one') {
    include __DIR__ . '/layout-one.php';
} else if ($options['layout'] == 'one-2') {
    include __DIR__ . '/layout-one-2.php';
} else if ($options['layout'] == 'two') {
    include __DIR__ . '/layout-two.php';
} else if ($options['layout'] == 'full-post') {
    include __DIR__ . '/layout-full-post.php';
} else {
    include __DIR__ . '/layout-big-image.php';
}
