<?php
/*
 * Plugin Name: KaTeX-CN
 * Plugin URI: https://github.com/itdevwu/KaTex-CN
 * Description: 针对中国大陆优化并提供中文设置的高速 KaTeX 数学公式插件
 * Version: 0.0.1
 * Author: itdevwu
 * Author URI: https://www.itdevwu.com
 * License: GPL v3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */
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

define('KATEX__PLUGIN_DIR', plugin_dir_path(__FILE__));
define('KATEX__PLUGIN_URL', plugin_dir_url(__FILE__));

define('KATEX__OPTION_DEFAULT_USE_BOOTCDN', true);
define('KATEX__OPTION_DEFAULT_ENABLE_LATEX_SHORTCODE', true);


$katex_resources_required = false;


if (is_admin() && !wp_doing_ajax()) {
    $katex_resources_required = true;
    require_once(KATEX__PLUGIN_DIR . 'scripts/admin.php');
}

if (!wp_doing_ajax()) {
    require_once(KATEX__PLUGIN_DIR . 'scripts/block.php');
    require_once(KATEX__PLUGIN_DIR . 'scripts/shortcode.php');
    require_once(KATEX__PLUGIN_DIR . 'scripts/resource.php');
}


register_uninstall_hook(__FILE__, 'katex_uninstall');

function katex_uninstall() {
    delete_option('katex_use_bootcdn');
    delete_option('katex_enable_latex_shortcode');
}
