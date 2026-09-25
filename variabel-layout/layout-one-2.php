<?php
/**
 * One column variant: title on top, image floated on the left, text and button on the right.
 */
$total_width = $composer['content_width'];
$column_width = $total_width / 2 - 20;
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td align="<?php echo esc_attr($align_left) ?>" style="padding: 0 0 10px 0;" dir="<?php echo esc_attr($dir) ?>">
            <div style="<?php echo $title_style ?>" role="heading"><?php echo $title ?></div>
        </td>
    </tr>
    <tr>
        <td valign="top" style="padding: 20px 0 25px 0;">
            <?php if ($media) { ?>
                <?php $media->set_width($column_width); ?>
                <table width="<?php echo esc_attr($column_width) ?>" cellpadding="0" cellspacing="0" border="0" align="left" style="margin: 0;" class="responsive">
                    <tr>
                        <td class="pb-1">
                            <?php echo TNP_Composer::image($media, ['class' => 'fluid']) ?>
                        </td>
                    </tr>
                </table>
            <?php } ?>
            <table width="<?php echo $media ? esc_attr($column_width) : '100%' ?>" cellpadding="0" cellspacing="0" border="0" style="margin: 0;" class="responsive" align="right">
                <tr>
                    <td>
                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin: 0;">
                            <tr>
                                <td align="<?php echo esc_attr($align_left) ?>" dir="<?php echo esc_attr($dir) ?>" style="padding: 0 0 15px 0;">
                                    <div style="<?php echo $text_style ?>" role="paragraph"><?php echo $text ?></div>
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
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
