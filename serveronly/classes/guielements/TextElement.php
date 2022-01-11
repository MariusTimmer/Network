<?php

class TextElement extends Element {

    protected $content;

    /**
     * Creates a textelement for your HTML-Code
     * @param String $content Content of the textelemt
     */
    public function __construct($content) {
        $this->content = $content;
    }

    public function __toString() {
        return '<p>'. htmlentities($this->content) .'</p>'. PHP_EOL;
    }

}