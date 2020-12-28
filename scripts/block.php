<?php
/* Copyright (C)  2020  Zhenglong Wu
 * Copyright (C)  2020  itdevwu
 * 
 * This file is part of KaTeX-CN.
 * 
 * KaTeX-CN is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * KaTeX-CN is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with KaTeX-CN. If not, see <http://www.gnu.org/licenses/>.
 */

add_action('init', 'katex_block_init');


function katex_block_init() {
    wp_register_script(
        'katex-gutenberg-block',
        plugins_url('assets/block-editor.js', dirname(__FILE__)),
        array('wp-blocks', 'wp-element')
    );
    wp_register_style(
        'katex-gutenberg-block',
        plugins_url('assets/block-editor.css', dirname(__FILE__)),
        array('wp-edit-blocks')
    );

    register_block_type('katex/display-block', array(
        'editor_script' => 'katex-gutenberg-block',
        'editor_style' => 'katex-gutenberg-block',
        'render_callback' => 'katex_display_block_render',
    ));
}


function katex_display_block_render($attributes, $content = null) {
    global $katex_resources_required;
    $katex_resources_required = true;

    return $content;
}
