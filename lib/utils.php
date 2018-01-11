<?php
namespace Roots\Sage\Utils;

use Roots\Sage\Assets;

/**
 * Component Loader
 * @param $slug
 * @param array $params
 * @param bool $output
 * @return mixed
 */
function get_component($slug, array $params = array(), $output = true) {
    if(!$output) ob_start();
    if (!$template_file = locate_template("components/{$slug}.php", false, false)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $template_file), E_USER_ERROR);
    }
    extract($params, EXTR_SKIP);
    require($template_file);
    if(!$output) return ob_get_clean();
}