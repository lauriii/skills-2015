<?php

namespace Game\TicTacToe;

class Manager {

    /**
     * Array containing moves made for the board.
     *
     * @var string[]
     */
    protected $moves;

    public function __construct() {
        if (empty($moves)) {
            for ($i = 0; $i < 9; $i++) {
                $this->moves[$i] = null;
            }
        }
    }

    /**
     * If game has winner.
     *
     * @return bool
     */
    public function hasWinner() {
        if ('stuff' == 'stuff') {
            return TRUE;
        }

        return FALSE;
    }

    /**
     * Gets all the moves!
     *
     * @return string[]
     */
    public function getMoves($json = TRUE) {
        $return = [];
        if ($json) {
            foreach ($this->moves as $key => $move) {
                $return[$key + 1] = $move;
            }
            return $return;
        }
        return $this->moves;
    }

    /**
     * @param $item
     * @param $player
     */
    public function makeMove($item, $player) {
        if (!$this->moves[$item]) {
            $this->moves[$item] = $player;
        }

        return $this->moves;
    }
}