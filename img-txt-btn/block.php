<?php
/*
 * Name: Image Text CTA
 * Section: content
 * Description: A block with an image, title, text, and a CTA button in a single container
 */

/* @var $options array */

// On future releases of Newsletter, default options will be part of the options.php
// file, it is the best place to have them. By now, be patience.

// The "block_*" options are reserved and could be processed directly by Newsletter. For example the
// "block_background" and "block_padding_*" are used to generate the wrapper of the block content.

$default_options = array(
    'title' => 'Your stunning title',
    'text' => 'Your nice text to describe whatever you want to describe.',
    'button_text' => 'Click Here',
    'button_link' => '#',
    'button_background' => '#b31e55',
    'button_color' => '#f3f6f4',
    'button_padding_vertical' => 10,
    'button_padding_horizontal' => 25,

    'block_padding_left' => 0,
    'block_padding_right' => 0,
    'block_padding_top' => 0,
    'block_padding_bottom' => 15,
    'block_background' => '', // Leave empty to use the block background set on the newsletter settings
);

$options = array_merge($default_options, $options);

// Generate title and text styles using TNP_Composer methods
$title_style = TNP_Composer::get_title_style($options, 'title', $composer);
$text_style = TNP_Composer::get_text_style($options, 'text', $composer);

$button_style = 'display: inline-block;'
        . ' color: ' . esc_attr(!empty($options['button_color']) ? $options['button_color'] : $composer['button_font_color']) . ';'
        . ' font-family: ' . esc_attr(!empty($options['button_font_family']) ? $options['button_font_family'] : $composer['button_font_family']) . ';'
        . ' font-size: ' . esc_attr(!empty($options['button_font_size']) ? $options['button_font_size'] : $composer['button_font_size']) . 'px;'
        . ' font-weight: ' . esc_attr(!empty($options['button_font_weight']) ? $options['button_font_weight'] : $composer['button_font_weight']) . ';'
        . ' line-height: 120%; margin: 0; text-decoration: none; text-transform: none;'
        . ' padding: ' . (int) $options['button_padding_vertical'] . 'px ' . (int) $options['button_padding_horizontal'] . 'px;'
        . ' mso-padding-alt: 0px; border-radius: 0px;';

// Image preparation (again, that is a bit tricky...)

$media = null;
if (!empty($options['image']['id'])) {
    // The $media is an object containing the image URL and the size to specify in the HTML tag. The image is resized at
    // 2x to be sharp on mobile devices.
    $media = tnp_resize_2x($options['image']['id'], [$composer['width'], 0]);
    // Should never happen but... it happens
    if (!$media) {
        // Do something...
    }
}

// $options is processed with the wp_kses(...) so there is no need to escape it and that
// allow a richer content with safe HTML tags.

?>

<?php
// Here we define a single block style with classes that are then transformed in inline styles. Style for fonts can be easily generated with
// the object created above. The style block is REMOVED on rendering.
?>
<style>
    .title {
        <?php $title_style->echo_css() ?>
    }
    
    .text {
        <?php $text_style->echo_css() ?>
        padding: 10px 15px 10px 15px;
    }
</style>

<?php
// The attribute "inline-class" is then replaced with a "style" attribute with all rules of the referenced class. 
?>

<!-- Single container for the entire block -->
<table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="border-collapse: collapse; width: 100%; background-color: <?php echo esc_attr($options['block_background']); ?>; padding: <?php echo esc_attr($options['block_padding_top']); ?>px <?php echo esc_attr($options['block_padding_right']); ?>px <?php echo esc_attr($options['block_padding_bottom']); ?>px <?php echo esc_attr($options['block_padding_left']); ?>px;">
    <tbody>
        <tr>
            <td align="center" style="padding: 0;">
                <!-- Image -->
                <?php if ($media) echo TNP_Composer::image($media) ?>

                <!-- Title -->
                <h2 inline-class="title" style="margin-bottom: 20px;"><?php echo $options['title'] ?></h2>

                <!-- Text -->
                <p inline-class="text" style="margin-bottom: 20px;"><?php echo $options['text'] ?></p>

                <!-- Button -->
                <?php if (!empty($options['button_text'])): ?>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" align="center" style="border-collapse: separate !important; line-height: 100%; width: auto; margin-top: 20px;">
                        <tbody>
                            <tr>
                                <td align="center" bgcolor="<?php echo esc_attr($options['button_background']); ?>" role="presentation" style="cursor: auto; mso-padding-alt: <?php echo esc_attr($options['button_padding_vertical']); ?>px <?php echo esc_attr($options['button_padding_horizontal']); ?>px; background: <?php echo esc_attr($options['button_background']); ?>; border-radius: 0px;" valign="middle">
                                    <a href="<?php echo esc_url($options['button_link']); ?>"
                                       style="<?php echo $button_style ?>"
                                       target="_blank">
                                        <?php echo esc_html($options['button_text']); ?>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>
            </td>
        </tr>
    </tbody>
</table>
