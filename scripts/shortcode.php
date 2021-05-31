<?php
/* Copyright (C)  2020-2021  Zhenglong Wu
 * Copyright (C)  2020-2021  itdevwu
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

add_action('init', 'katex_shortcode_init');
add_filter('no_texturize_shortcodes', 'katex_shortcode_exempt_from_wptexturize');


function katex_shortcode_init() {
    $option_enable_latex_shortcode = get_option('katex_enable_latex_shortcode', KATEX__OPTION_DEFAULT_ENABLE_LATEX_SHORTCODE);

    add_shortcode('katex', 'katex_display_inline_render');

    if ($option_enable_latex_shortcode) {
        add_shortcode('latex', 'katex_display_inline_render');
    }
}


function katex_display_inline_render($attributes, $content = null) {
    global $katex_resources_required;
    $katex_resources_required = true;

    $attributes = shortcode_atts(
        array(
            'display' => false
        ),
        $attributes,
        'latex'
    );

    // Truthy -> 'true', falsy -> 'false'
    $display = $attributes['display'] ? 'true' : 'false';

    $content = preg_replace("|<br\s*/?>|", "\n", $content);
    $encoded = htmlspecialchars(html_entity_decode($content));
    return sprintf('<span class="katex-eq" data-katex-display="%s">%s</span>', $display, $encoded);
}


function katex_shortcode_exempt_from_wptexturize($shortcodes) {
    $shortcodes[] = 'katex';
    $shortcodes[] = 'latex';
    return $shortcodes;
}
