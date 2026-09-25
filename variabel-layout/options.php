<?php
/* @var $options array It contains all the options of the current block, but usually there is no need to access it directly */
/* @var $fields NewsletterFields */

/**
 * This is a simple options panel for a Newsletter Composer Block.
 * $fields contains many useful methods to create controls in a easy way.
 */
?>

<?php
$fields->select('layout', __('Layout', 'newsletter'),
        [
            'one' => __('One column', 'newsletter'),
            'one-2' => __('One column variant', 'newsletter'),
            'two' => __('Two columns', 'newsletter'),
            'big-image' => __('One column, big image', 'newsletter'),
            'full-post' => __('Full post', 'newsletter')
        ]);
?>

<?php $fields->media('image', 'Image') ?>

<?php $fields->text('title', 'Title') ?>

<?php $fields->font('title_font', 'Title font', ['family_default' => true, 'size_default' => true, 'weight_default' => true]) ?>

<?php $fields->textarea('text', 'Text') ?>

<?php $fields->font('text_font', 'Text font', ['align' => true, 'family_default' => true, 'size_default' => true, 'weight_default' => true]) ?>

<?php $fields->text('button_text', 'Button Text') ?>

<?php $fields->url('button_link', 'Button Link') ?>

<?php $fields->color('button_background', 'Button Background Color') ?>

<?php $fields->color('button_color', 'Button Text Color') ?>

<?php $fields->number('button_padding_vertical', 'Button Padding Vertical (px)', ['default' => 10]) ?>

<?php $fields->number('button_padding_horizontal', 'Button Padding Horizontal (px)', ['default' => 25]) ?>

<?php $fields->font('button_font', 'Button Font', ['family_default' => true, 'size_default' => true, 'weight_default' => true, 'color_default' => false]) ?>

<?php $fields->padding('text_padding', 'Text padding', ['description' => 'Supported only by some layouts', 'show_top' => false, 'show_bottom' => false]) ?>

<?php
// Always add that at the bottom: it generates a set of options automatically processed by Newsletter
?>
<?php $fields->block_commons() ?>
