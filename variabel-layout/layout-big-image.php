<?php
/**
 * One column, big image on top, title, text and button below.
 */
$content_width = $composer['content_width'];

$title_style = TNP_Composer::get_title_style($options, 'title', $composer);
$text_style = TNP_Composer::get_text_style($options, 'text', $composer);
?>
<style>
    .title-td {
        padding: 0 0 5px 0;
    }
    .title {
        <?php $title_style->echo_css() ?>
        line-height: normal!important;
        text-decoration: none;
    }
    .excerpt-td {
        padding: 10px 0 15px 0;
    }
    .excerpt {
        <?php $text_style->echo_css() ?>
        line-height: 1.5 !important;
        text-decoration: none;
    }
    .button {
        padding: 15px 0;
    }
</style>
<?php

if ($media) {
    $media->set_width($content_width);
    ?>
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom: 20px">
        <tr>
            <td align="center">
                <?php echo TNP_Composer::image($media) ?>
            </td>
        </tr>
    </table>
    <?php
}
?>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="responsive" style="margin: 0;">
    <tr>
        <td style="padding-left: <?php echo (int) $options['text_padding_left'] ?>px; padding-right: <?php echo (int) $options['text_padding_right'] ?>px">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td align="<?php echo esc_attr($align_left) ?>" inline-class="title-td">
                        <div inline-class="title" dir="<?php echo esc_attr($dir) ?>" role="heading"><?php echo $title ?></div>
                    </td>
                </tr>
                <tr>
                    <td align="<?php echo esc_attr($align_left) ?>" inline-class="excerpt-td" dir="<?php echo esc_attr($dir) ?>">
                        <div inline-class="excerpt" dir="<?php echo esc_attr($dir) ?>" role="paragraph"><?php echo $text ?></div>
                    </td>
                </tr>
                <?php if ($show_button) { ?>
                    <tr>
                        <td align="<?php echo esc_attr($align_left) ?>" inline-class="button">
                            <?php echo variabel_layout_button($button_options, $composer, 'center') ?>
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
