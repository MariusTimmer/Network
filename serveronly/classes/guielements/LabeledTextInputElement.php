<?php

class LabeledTextInputElement extends LabeledInputField {

    protected function buildInputElement() {
        return new TextInputElement($this->id, $this->class, $this->value = '');
    }

}