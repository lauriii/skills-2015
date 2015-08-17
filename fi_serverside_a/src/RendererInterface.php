<?php

namespace Game;

interface RendererInterface {

    /**
     * Renders a view.
     *
     * @var string $hook
     * @var mixed[] $variables
     *  (optional)
     *
     * @return string
     *   The rendered HTML markup.
     */
    public function doRender($hook, array $variables = []);

}