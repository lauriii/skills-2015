<?php

namespace Game;

class Request {

    /**
     * @var mixed[]
     */
    protected $post;

    /**
     * @var mixed[]
     */
    protected $get;

    /**
     * @var mixed[]
     */
    protected $session;

    /**
     * Creates the request object from global parameters.
     *
     * @return $this
     */
    public function buildFromGlobals() {
        $this->post = $_POST;
        $this->get = $_GET;
        $this->session = &$_SESSION;

        return $this;
    }

    /**
     * Gets the current server session.
     */
    public function getSession($item = '') {
        if ($item) {
            return $this->session[$item];
        }
        return $this->session;
    }

    /**
     * Sets values to session.
     *
     * @param $item
     * @param $value
     *
     * @return $this;
     */
    public function setSession($item, $value) {
        $_SESSION[$item] = $value;

        return $this;
    }

    /**
     * If current request is type of POST.
     *
     * @return bool
     */
    public function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST');
    }

    /**
     * Gets the post variables.
     *
     * @return mixed[]
     */
    public function getPost() {
        return $this->post;
    }

    /**
     * Gets the get variables.
     *
     * @param string $item
     *
     * @return mixed[]
     */
    public function getGet($item = '') {
        if ($item) {
            return $this->get[$item];
        }

        return $this->get;
    }

}