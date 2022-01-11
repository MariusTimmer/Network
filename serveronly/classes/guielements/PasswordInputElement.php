<?php

class PasswordInputElement extends FormElement {

    public function __toString() {
        return sprintf(
            '<input type="password"%s%s />',
            !empty($this->id) ? ' id="'. $this->id .'"' : '',
            !empty($this->class) ? ' class="'. $this->class .'"' : ''
        );
    }

}