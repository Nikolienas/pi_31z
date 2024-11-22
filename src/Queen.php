<?php
require_once('IFigure.php');

class Queen extends Figure {
    protected array $icon = ["\u{265B}", "\u{2655}"];

    public function canMove(int $from_row, int $from_col, int $to_row, int $to_col, Board $board): bool {
        if ($from_row === $to_row || $from_col === $to_col) {
            $step_row = $to_row > $from_row ? 1 : ($to_row < $from_row ? -1 : 0);
            $step_col = $to_col > $from_col ? 1 : ($to_col < $from_col ? -1 : 0);
            $current_row = $from_row + $step_row;
            $current_col = $from_col + $step_col;

            while ($current_row !== $to_row || $current_col !== $to_col) {
                if ($board->getItem($current_row, $current_col) !== null) {
                    return false;
                }
                $current_row += $step_row;
                $current_col += $step_col;
            }
            return true;
        }

        if (abs($from_row - $to_row) === abs($from_col - $to_col)) {
            $step_row = $to_row > $from_row ? 1 : -1;
            $step_col = $to_col > $from_col ? 1 : -1;
            $current_row = $from_row + $step_row;
            $current_col = $from_col + $step_col;

            while ($current_row !== $to_row || $current_col !== $to_col) {
                if ($board->getItem($current_row, $current_col) !== null) {
                    return false;
                }
                $current_row += $step_row;
                $current_col += $step_col;
            }
            return true;
        }

        return false;
    }
}