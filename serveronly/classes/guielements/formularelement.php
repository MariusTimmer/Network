<?php

/**
 * Wrapper class for a formular / form-tag in HTML.
 * @date 2017-03-25
 * @since 0.1
 * @author Marius Timmer
 */
class FormularElement extends FormElement {

    const METHOD_POST = 'post';
    const METHOD_GET  = 'get';
    protected $action;
    protected $submit_text;
    protected $method;
    protected $content;
    protected $reset_text;

    /**
     * Creates the HTML-Code of a formular.
     * @param String $action Action attribute of the formular
     * @param String $submit_text Text for the submit button
     * @param String $method Method of the formular
     * @param String $reset_text False means to generate no reset button. Otherwise you have to insert the button text here.
     * @param String $id ID of the element
     * @param String $class Class of the element
     */
    public function __construct($action, $submit_text, $method = FormularElement::METHOD_POST, $reset_text = false, $id = '', $class = '') {
        parent::__construct($id, $class);
        $this->action = $action;
        $this->submit_text = $submit_text;
        $this->method = $method;
        $this->reset_text = $reset_text;
        $this->content = '';
    }

    /**
     * Adds a string to the already existing content of the formular.
     * @param String $content HTML-Code
     */
    public function addContent($content) {
        $this->content .= $content;
    }

    public function __toString() {
        $html = sprintf(
            '<form action="%s" method="%s"%s%s >',
            $this->action,
            $this->method,
            !empty($this->id) ? ' id="'. $this->id .'"' : '',
            !empty($this->class) ? ' class="'. $this->class .'"' : ''
        );
        $html .= $this->content;
        if ($this->reset_text) {
            /**
             * This formular is meant to provide a reset button which
             * will be generated here.
             */
            $html .= '<input type="reset" value="'. $this->reset_text .'" />';
        }
        $html .= '<input type="submit" value="'. $this->submit_text .'" />';
        $html .= '</form>'. PHP_EOL;
        return $html;
    }

}
