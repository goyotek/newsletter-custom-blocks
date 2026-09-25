<?php
/**
 * One column, big image on top, title, text and button below.
 */
$content_width = $composer['content_width'];
?>
<?php if ($media) { ?>
    <?php $media->set_width($content_width); ?>
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom: 20px">
        <tr>
            <td align="center">
                <?php echo TNP_Composer::image($media) ?>
            </td>
        </tr>
    </table>
<?php } ?>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="responsive" style="margin: 0;">
    <tr>
        <td style="padding-left: <?php echo (int) $options['text_padding_left'] ?>px; padding-right: <?php echo (int) $options['text_padding_right'] ?>px">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="<?php echo esc_attr($align_left) ?>" style="padding: 0 0 5px 0;">
                        <div style="<?php echo $title_style ?>" dir="<?php echo esc_attr($dir) ?>" role="heading"><?php echo $title ?></div>
                    </td>
                </tr>
                <tr>
                    <td align="<?php echo esc_attr($align_left) ?>" style="padding: 10px 0 15px 0;">
                        <div style="<?php echo $text_style ?>" dir="<?php echo esc_attr($dir) ?>" role="paragraph"><?php echo $text ?></div>
                    </td>
                </tr>
                <?php if ($show_button) { ?>
                    <tr>
                        <td align="<?php echo esc_attr($align_left) ?>" style="padding: 15px 0;">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" align="<?php echo esc_attr($align_left) ?>" style="border-collapse: separate !important; line-height: 100%; width: auto;">
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
                <tr>
                    <td style="padding: 10px">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
