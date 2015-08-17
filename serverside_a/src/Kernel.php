<?php

namespace Game;

use Game\Controller\GameController;

class Kernel {

    /**
     * @var \Game\RendererInterface;
     */
    protected $renderer;

    /**
     * Handles a request.
     *
     * @param \Game\Request $request
     *
     * @return string
     *   The renderer markup.
     */
    public function handle(Request $request) {
        $this->bootEnvironment();

        // @todo add support for multiple controllers.
        $controller = new GameController($this->renderer, $request);
        if ($request->isPost()) {
            $page = $controller->buildPost($request->getPost());
        }
        else {
            $page = $controller->build();
        }

        if ($request->getGet('json')) {
            return $page;
        }

        return $this->renderer->doRender('page', ['content' => $page]);
    }

    protected function bootEnvironment() {
        $this->renderer = new Renderer();
    }
}