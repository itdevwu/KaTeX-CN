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

add_action('admin_menu', 'katex_add_admin_menu');
add_action('admin_init', 'katex_settings_init');


function katex_add_admin_menu() {
    add_options_page('KaTeX', 'KaTeX', 'manage_options', 'katex', 'katex_options_page');
}


function katex_settings_init() {
    register_setting(
        'pluginPage',
        'katex_use_bootcdn'
    );

    register_setting(
        'pluginPage',
        'katex_enable_latex_shortcode'
    );

    add_settings_section(
        'katex_pluginPage_section',
        __('主页', 'katex'),
        'katex_settings_section_callback',
        'pluginPage'
    );

    add_settings_field(
        'katex_bootcdn_setting',
        __('使用BootCDN加载', 'katex'),
        'katex_bootcdn_setting_render',
          'pluginPage',
          'katex_pluginPage_section'
     );

    add_settings_field(
        'katex_latex_shortcode_setting',
        __('启用[latex]代码', 'katex'),
        'katex_latex_shortcode_setting_render',
        'pluginPage',
        'katex_pluginPage_section'
    );
}


function katex_bootcdn_setting_render() {
    $option_katex_use_bootcdn = get_option('katex_use_bootcdn', KATEX__OPTION_DEFAULT_USE_BOOTCDN);
    ?>
    <input
        type='checkbox'
        name='katex_use_bootcdn'
        <?php checked($option_katex_use_bootcdn, 1); ?>
        value='1'>
    <?php
    echo __('使用<a href="https://www.bootcdn.cn/" target="_blank">BootCDN</a>以更快加载Katex', 'katex');
}


function katex_latex_shortcode_setting_render() {
    $option_katex_enable_latex_shortcode = get_option('katex_enable_latex_shortcode', KATEX__OPTION_DEFAULT_ENABLE_LATEX_SHORTCODE);
    ?>
    <input
        type='checkbox'
        name='katex_enable_latex_shortcode'
        <?php checked($option_katex_enable_latex_shortcode, 1); ?>
        value='1'>
    <?php
    echo __('为了保证与其他插件的兼容性，您可以使用[katex]代码的同时使用[latex]代码', 'katex');

}


function katex_settings_section_callback() {
     echo __('', 'katex');
}


function katex_options_page() {
     ?>
    <div class="wrap">
        <h1>KaTeX-CN</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'pluginPage' );
            do_settings_sections( 'pluginPage' );
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
