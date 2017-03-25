<?php

class TextInputElement extends FormElement {

    protected $value;
    protected $placeholder;

    public function __construct($id, $class = '', $value = '', $placeholder) {
        parent::__construct($id, $class);
        $this->value = $value;
        $this->placeholder = $placeholder;
    }

    public function __toString() {
        return sprintf(
            '<input type="text" value="%s"%s%s />',
            $this->value,
            !empty($this->id) ? ' id="'. $this->id .'" name="'. $this->id .'"' : '',
            !empty($this->placeholder) ? ' placeholder="'. $this->placeholder .'"' : '',
            !empty($this->class) ? ' class="'. $this->class .'"' : ''
        );
    }

}