<?php

namespace Game\Controller;

use Game\RendererInterface;
use Game\Request;
use Game\TicTacToe\Manager;

class GameController {

    /**
     * The renderer.
     *
     * @var \Game\RendererInterface
     */
    protected $renderer;

    /**
     * The request.
     *
     * @var Request
     */
    protected $request;

    /**
     * Constructs the object.
     *
     * @param \Game\RendererInterface $renderer
     * @param \Game\Request $request
     */
    public function __construct(RendererInterface $renderer, Request $request) {
        $this->renderer = $renderer;
        $this->request = $request;
    }

    /**
     * Builds the starting game.
     *
     * @return string
     */
    public function buildStart() {
        return $this->renderer->doRender('start', []);
    }

    /**
     * Builds the game page.
     *
     * @return string
     */
    public function build() {
        $session = $this->request->getSession();
        $get = $this->request->getGet();
        if (empty($session)) {
            return $this->buildStart();
        }

        if (!empty($session['game'])) {
            $game = unserialize($session['game']);
        }
        else {
            $game = new Manager();
        }



        if ($get['restart']) {
            session_destroy();
            return $this->buildStart();
        }
        elseif (isset($get['move'])) {
            if ($get['player'] == 'x') {
                $try = rand(0, 8);

            }
            $response = ['moves' => $game->makeMove($get['move'], $get['player']), 'time' => time() - $session['start_time']];
            // Save game to session.
            $this->request->setSession('game', serialize($game));
            return json_encode($response);
        }

        $this->request->setSession('game', serialize($game));

        $time = time() - $session['start_time'];
        print_r($game->getMoves(FALSE));
        return $this->renderer->doRender('game', ['time' => $time, 'moves' => $game->getMoves(FALSE)]);
    }

    /**
     * Builds the page for post request.
     *
     * @param $form_state
     */
    public function buildPost($form_state) {
        global $app_dir;
        move_uploaded_file($form_state['photo'], $app_dir);
        $this->request->setSession('start_time', time());

        return $this->build();
    }

    public function buildJson() {
        header('type/json');
        return json_encode(['stuff' => 'more_stuff']);
    }

}