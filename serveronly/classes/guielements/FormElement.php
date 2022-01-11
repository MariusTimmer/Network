<?php

/**
 * Abstract class to provide a common constructor with a id and class attriute.
 * It can be used for input fields, select elements or stuff like that.
 * @date 2017-03-24
 * @since 0.1
 * @author Marius Timmer
 */
abstract class FormElement extends Element {

    protected $id;
    protected $class;

    /**
     * Creates a customable form element (not the form-tag).
     * @param String $id ID of the element
     * @param String $class Class of the element
     */
    protected function __construct($id, $class) {
        $this->id = $id;
        $this->class = $class;
    }
    
}