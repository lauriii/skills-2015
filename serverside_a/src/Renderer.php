<?php

namespace Game;

class Renderer implements RendererInterface {

    /**
     * {@inheritdoc}
     */
    public function doRender($hook, array $variables = []) {
        global $app_dir;
        extract($variables);
        ob_start();
        include $app_dir . '/resources/templates/' . $hook . '.tpl.php';
        return ob_get_clean();
    }
}