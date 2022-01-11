<?php

class SubmitButton extends FormElement {

    protected $value;

    /**
     * Creates the HTML-Code of a submit button.
     * @param String $value Text and value of the submit button
     * @param String $id ID of the element
     * @param String $class Class of the element
     */
    public function __construct($value, $id = '', $class = '') {
        parent::__construct($id, $class);
        $this->value = $value;
    }

    public function __toString() {
        return sprintf(
            '<input type="submit" value="%s"%s%s />',
            $this->value,
            !empty($this->id) ? ' id="'. $this->id .'"' : '',
            !empty($this->class) ? ' class="'. $this->class .'"' : ''
        );
    }

}
