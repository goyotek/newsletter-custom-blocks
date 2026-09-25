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

// Renders the CTA button using the block own options (padding, colors, font) since the TNP_Composer::button()
// helper uses its own fixed padding. Declared once, block.php can be included more times per email rendering.
if (!function_exists('variabel_layout_button')) {

    function variabel_layout_button($options, $composer, $align = 'center') {
        if (empty($options['button_text'])) {
            return '';
        }

        $background = empty($options['button_background']) ? $composer['button_background_color'] : $options['button_background'];
        $font_family = empty($options['button_font_family']) ? $composer['button_font_family'] : $options['button_font_family'];
        $font_size = empty($options['button_font_size']) ? $composer['button_font_size'] : $options['button_font_size'];
        $font_weight = empty($options['button_font_weight']) ? $composer['button_font_weight'] : $options['button_font_weight'];
        $font_color = !empty($options['button_font_color']) ? $options['button_font_color'] : $options['button_color'];
        $font_color = !empty($font_color) ? $font_color : $composer['button_font_color'];

        $padding_vertical = (int) $options['button_padding_vertical'];
        $padding_horizontal = (int) $options['button_padding_horizontal'];

        $b = '<table border="0" cellpadding="0" cellspacing="0" role="presentation" align="' . esc_attr($align) . '" style="border-collapse: separate !important; line-height: 100%; width: auto;">';
        $b .= '<tbody><tr>';
        $b .= '<td align="center" bgcolor="' . esc_attr($background) . '" role="presentation" style="border-collapse: separate !important; cursor: auto; mso-padding-alt: ' . $padding_vertical . 'px ' . $padding_horizontal . 'px; background: ' . esc_attr($background) . '; border-radius: 0px;" valign="middle">';
        $b .= '<a href="' . esc_url($options['button_link']) . '"';
        $b .= ' style="display: inline-block; color: ' . esc_attr($font_color) . '; font-family: ' . esc_attr($font_family) . '; font-size: ' . esc_attr($font_size) . 'px; font-weight: ' . esc_attr($font_weight) . '; line-height: 120%; margin: 0; text-decoration: none; text-transform: none; padding: ' . $padding_vertical . 'px ' . $padding_horizontal . 'px; mso-padding-alt: 0px; border-radius: 0px; width: auto;"';
        $b .= ' target="_blank">';
        $b .= esc_html($options['button_text']);
        $b .= '</a>';
        $b .= '</td></tr></tbody></table>';

        return $b;
    }
}

$button_options = $options;

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
