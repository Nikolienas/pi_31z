<?php

require_once('color.php');
require_once('IFigure.php');
require_once('Board.php');

class Pawn extends Figure {
    protected string $icon = 'P';

    public function canMove(int $from_row, int $from_col, int $to_row, int $to_col, Board $board): bool {
        $direction = $this->getColor() === Color::White ? 1 : -1;
        if ($from_col !== $to_col) {
            return false;
        }
        $as_two_step_row = $this->getColor() === Color::White ? 1 : 6;
        $available = [$from_row + $direction];
        if ($as_two_step_row) {
            $available[] = $from_row + $direction * 2;
        }
        return in_array($to_row, $available);
    }
}