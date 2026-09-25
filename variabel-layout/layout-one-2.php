<?php
/**
 * One column variant: title on top, image floated on the left, text and button on the right.
 */
$total_width = $composer['content_width'];
$column_width = $total_width / 2 - 20;

$title_style = TNP_Composer::get_title_style($options, 'title', $composer);
$text_style = TNP_Composer::get_text_style($options, 'text', $composer);
?>
<style>
    .title-td {
        padding: 0 0 10px 0;
    }
    .title {
        <?php $title_style->echo_css() ?>
        line-height: normal;
        text-decoration: none;
    }
    .excerpt-td {
        padding: 0 0 15px 0;
    }
    .excerpt {
        <?php $text_style->echo_css() ?>
        line-height: 1.5;
        text-decoration: none;
    }
    .button {
        padding: 15px 0;
    }
</style>
<?php
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td align="<?php echo esc_attr($align_left) ?>" inline-class="title-td" dir="<?php echo esc_attr($dir) ?>">
            <div inline-class="title" dir="<?php echo esc_attr($dir) ?>" role="heading"><?php echo $title ?></div>
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
                                <td align="<?php echo esc_attr($align_left) ?>" dir="<?php echo esc_attr($dir) ?>" inline-class="excerpt-td">
                                    <div inline-class="excerpt" dir="<?php echo esc_attr($dir) ?>" role="paragraph"><?php echo $text ?></div>
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
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
