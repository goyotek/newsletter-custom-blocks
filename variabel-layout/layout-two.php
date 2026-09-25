<?php
/**
 * Two columns: image on the left column, title, text and button on the right column.
 */
$total_width = $composer['content_width'];
$column_width = $total_width / 2 - 20;
$items = [];
?>
<?php if ($media) { ?>
    <?php ob_start(); ?>
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
            <td align="center" valign="middle">
                <?php
                $media->set_width($column_width);
                echo TNP_Composer::image($media, ['class' => 'fluid'])
                ?>
            </td>
        </tr>
    </table>
    <?php $items[] = ob_get_clean(); ?>
<?php } ?>
<?php ob_start(); ?>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr>
        <td align="center" style="padding: 15px 0 0 0;">
            <div style="<?php echo $title_style ?>" dir="<?php echo esc_attr($dir) ?>" role="heading"><?php echo $title ?></div>
        </td>
    </tr>
    <tr>
        <td align="center" style="padding: 5px 0 0 0;">
            <div style="<?php echo $text_style ?>" dir="<?php echo esc_attr($dir) ?>" role="paragraph"><?php echo $text ?></div>
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
<?php $items[] = ob_get_clean(); ?>
<?php echo TNP_Composer::grid($items, ['width' => $total_width, 'responsive' => true, 'padding' => 5]) ?>
