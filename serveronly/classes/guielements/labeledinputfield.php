<?php

abstract class LabeledInputField extends FormElement {

    protected $label;
    protected $value;

    public function __construct($label, $id, $value = '', $class = '') {
        parent::__construct($id, $class);
        $this->label = $label;
        $this->value = $value;
    }

    abstract protected function buildInputElement();

    public function __toString() {
        return '<label for="'. $this->id .'">'. htmlentities($this->label) .':</label> '. $this->buildInputElement() .'<br />'. PHP_EOL;
    }

}