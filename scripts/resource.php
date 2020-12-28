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

define('KATEX_JS_VERSION', '0.12.0');


add_action('init', 'katex_resources_init');
add_action('loop_end', 'katex_resources_enqueue');
add_action('admin_footer', 'katex_resources_enqueue');
add_action('wp_footer', 'katex_enable');


function katex_resources_init() {
    $option_use_bootcdn = get_option('katex_use_bootcdn', KATEX__OPTION_DEFAULT_USE_BOOTCDN);

    if ($option_use_bootcdn) {
        wp_register_script(
            'katex',
            '//cdn.bootcdn.net/ajax/libs/KaTeX/' . KATEX_JS_VERSION . '/katex.min.js',
            array(), // No dependencies.
            false, // No versioning.
            true // In footer.
        );
        wp_register_style(
            'katex',
            '//cdn.bootcdn.net/ajax/libs/KaTeX/' . KATEX_JS_VERSION . '/katex.min.css'
        );
    } else {
        wp_register_script(
            'katex',
            KATEX__PLUGIN_URL . 'assets/katex-' . KATEX_JS_VERSION . '/katex.min.js',
            array(), // No dependencies.
            false, // No versioning.
            true // In footer.
        );
        wp_register_style(
            'katex',
            KATEX__PLUGIN_URL . 'assets/katex-' . KATEX_JS_VERSION . '/katex.min.css'
        );
    }


}


function katex_resources_enqueue() {
    global $katex_resources_required;

    if ($katex_resources_required) {
        wp_enqueue_script('katex');
        wp_enqueue_style('katex');
    }
}


function katex_enable() {
    global $katex_resources_required;

    if ($katex_resources_required) {
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const eles = document.querySelectorAll(".katex-eq");
                for(let idx=0; idx < eles.length; idx++) {
                    const ele = eles[idx];
                    try {
                        katex.render(
                            ele.textContent,
                            ele,
                            {
                                displayMode: ele.getAttribute("data-katex-display") === 'true',
                                throwOnError: false
                            }
                        );
                    } catch(n) {
                        ele.style.color="red";
                        ele.textContent = n.message;
                    }
                }
            });
        </script>
        <?php
    }
}
