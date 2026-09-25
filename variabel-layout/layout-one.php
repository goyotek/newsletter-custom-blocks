<?php
/**
 * One column: image on the left, texts and button on the right.
 */
$total_width = $composer['content_width'];
$column_width = $total_width / 2 - 10;

$title_style = TNP_Composer::get_title_style($options, 'title', $composer, ['scale' => .8]);
$text_style = TNP_Composer::get_text_style($options, 'text', $composer);
?>
<style>
    .title-td {
        padding: 0 0 5px 0;
    }
    .title {
        <?php $title_style->echo_css() ?>
        line-height: normal !important;
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

$items = [];
?>
<?php if ($media) { ?>
    <?php ob_start(); ?>
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td style="padding-bottom: 20px;" width="100%">
                <?php
                $media->set_width($column_width);
                echo TNP_Composer::image($media, ['class' => 'fluid'])
                ?>
            </td>
        </tr>
    </table>
    <?php $items[] = ob_get_clean(); ?>
<?php } ?>
<?php ob_start() ?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td align="<?php echo esc_attr($align_left) ?>" inline-class="title-td">
            <?php echo $title ?>
        </td>
    </tr>
    <tr>
        <td align="<?php echo esc_attr($align_left) ?>" dir="<?php echo esc_attr($dir) ?>" inline-class="excerpt-td">
            <?php echo $text ?>
        </td>
    </tr>
    <?php if ($show_button) { ?>
        <tr>
            <td align="<?php echo esc_attr($align_left) ?>" inline-class="button">
                <?php echo variabel_layout_button($button_options, $composer, $align_left) ?>
            </td>
        </tr>
    <?php } ?>
</table>
<?php $items[] = ob_get_clean(); ?>
<?php echo TNP_Composer::grid($items, ['columns' => count($items), 'width' => $total_width]) ?>
