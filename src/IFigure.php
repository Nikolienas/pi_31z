<?php
require_once ('./color.php');


interface IFigure {
    public function _construct(Color $color);
    public function getColor(): Color;
    public function getItem(): string;
}

abstract class Figrure implements IFigure {
    private Color $color;
    private string $item;

    public function __construct(Color $color) {
        $this->color = $color;
    }

    public function getColor(): Color {
        return $this->color;
    }

    abstract public function getIcon(): string {
        $prefix = $this->color === Color::Black ? 'b' : 'w';
        return $prefix . $this->item;
    };
}