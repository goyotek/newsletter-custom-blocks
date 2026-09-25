<?php
/**
 * Two columns: image on the left column, title, text and button on the right column.
 */
$total_width = $composer['content_width'];
$column_width = $total_width / 2 - 20;

$title_style = TNP_Composer::get_title_style($options, 'title', $composer, ['scale' => .8]);
$text_style = TNP_Composer::get_text_style($options, 'text', $composer);

$items = [];
?>
<style>
    .title-td {
        padding: 15px 0 0 0;
    }
    .title {
        <?php $title_style->echo_css() ?>
        line-height: 1.3;
        text-decoration: none;
    }
    .excerpt-td {
        padding: 5px 0 0 0;
    }
    .excerpt {
        <?php $text_style->echo_css() ?>
        line-height: 1.4;
        text-decoration: none;
    }
    .button {
        padding: 15px 0;
    }
    .column-left {
        padding-right: 10px;
        padding-bottom: 20px;
    }
    .column-right {
        padding-left: 10px;
        padding-bottom: 20px;
    }
</style>
<?php

if ($media) {
    ob_start();
    ?>
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
    <?php
    $items[] = ob_get_clean();
}

ob_start();
?>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr>
        <td align="center" inline-class="title-td">
            <div inline-class="title" dir="<?php echo esc_attr($dir) ?>" role="heading"><?php echo $title ?></div>
        </td>
    </tr>
    <tr>
        <td align="center" inline-class="excerpt-td">
            <div inline-class="excerpt" dir="<?php echo esc_attr($dir) ?>" role="paragraph"><?php echo $text ?></div>
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
<?php
$items[] = ob_get_clean();

echo TNP_Composer::grid($items, ['width' => $total_width, 'responsive' => true, 'padding' => 5]);
