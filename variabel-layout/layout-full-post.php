<?php
/**
 * Full width text: title on top, image in the middle, text and button below, all centered.
 */
$content_width = $composer['content_width'];
?>
<?php if ($media) { ?>
    <?php $media->set_width($content_width); ?>
<?php } ?>
<table border="0" cellpadding="0" align="center" cellspacing="0" width="100%" class="responsive">
    <tr>
        <td align="center" style="padding: 0 0 20px 0;">
            <div style="<?php echo $title_style ?>" role="heading"><?php echo $title ?></div>
        </td>
    </tr>
    <?php if ($media) { ?>
        <tr>
            <td align="center">
                <?php echo TNP_Composer::image($media) ?>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td align="<?php echo esc_attr($align_left) ?>" dir="<?php echo esc_attr($dir) ?>" style="padding: 0 <?php echo (int) $options['text_padding_right'] ?>px 0 <?php echo (int) $options['text_padding_left'] ?>px;">
            <div style="<?php echo $text_style ?>" role="paragraph"><?php echo $text ?></div>
        </td>
    </tr>
    <?php if ($show_button) { ?>
        <tr>
            <td align="center" style="padding: 15px 0;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" align="center" style="border-collapse: separate !important; line-height: 100%; width: auto;">
                    <tbody>
                        <tr>
                            <td align="center" bgcolor="<?php echo esc_attr($button_background) ?>" role="presentation" style="border-collapse: separate !important; cursor: auto; mso-padding-alt: <?php echo (int) $options['button_padding_vertical'] ?>px <?php echo (int) $options['button_padding_horizontal'] ?>px; background: <?php echo esc_attr($button_background) ?>; border-radius: 0px;" valign="middle">
                                <a href="<?php echo esc_url($options['button_link']) ?>" style="<?php echo $button_style ?>" target="_blank"><?php echo esc_html($options['button_text']) ?></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    <?php } ?>
</table>
