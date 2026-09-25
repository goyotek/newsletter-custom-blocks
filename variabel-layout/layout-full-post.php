<?php
/**
 * Full width text: title on top, image in the middle, text and button below, all centered.
 */
$content_width = $composer['content_width'];

$title_style = TNP_Composer::get_title_style($options, 'title', $composer);
$text_style = TNP_Composer::get_text_style($options, 'text', $composer);
?>
<style>
    .title-td {
        padding-bottom: 20px;
        padding-left: <?php echo (int) $options['text_padding_left'] ?>px;
        padding-right: <?php echo (int) $options['text_padding_right'] ?>px;
    }
    .title {
        <?php $title_style->echo_css() ?>
        line-height: normal;
        margin: 0;
        text-decoration: none;
    }
    .content {
        <?php $text_style->echo_css() ?>
        padding-left: <?php echo (int) $options['text_padding_left'] ?>px;
        padding-right: <?php echo (int) $options['text_padding_right'] ?>px;
        line-height: 1.5;
    }
    .button {
        padding: 15px 0;
    }
</style>
<?php

if ($media) {
    $media->set_width($content_width);
}
?>
<table border="0" cellpadding="0" align="center" cellspacing="0" width="100%" class="responsive">
    <tr>
        <td inline-class="title-td">
            <?php echo $title ?>
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
        <td align="<?php echo esc_attr($align_left) ?>" dir="<?php echo esc_attr($dir) ?>" inline-class="content">
            <?php echo $text ?>
        </td>
    </tr>
    <?php if ($show_button) { ?>
        <tr>
            <td align="center" inline-class="button">
                <?php echo variabel_layout_button($button_options, $composer, 'center') ?>
            </td>
        </tr>
    <?php } ?>
</table>
