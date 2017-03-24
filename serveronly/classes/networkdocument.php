<?php

abstract class NetworkDocument extends NetworkFragment {

    const LANGUAGE_ENGLISH = 'en';
    const LANGUAGE_GERMAN  = 'de';
    const LANGUAGE_DUTCH   = 'nl';
    const DEFAULT_TITLE = 'Network';
    protected $javascripts;
    protected $stylesheets;
    protected $title;
    protected $lang;

    abstract protected function buildBody();

    /**
     * Prepares a HTML-document.
     * @param String $title Document title
     * @param String $lang Language of the document
     */
    protected function __construct($title = NetworkDocument::DEFAULT_TITLE, $lang = NetworkDocument::LANGUAGE_ENGLISH) {
        parent::__construct();
        $this->title = $title;
        $this->lang = $lang;
        $this->javascripts = array();
        $this->stylesheets = array(
            'css/network.css'
        );
    }

    /**
     * Sets the title of the HTML-document.
     * @param String $title Title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Returns the title of the document.
     * @return String Title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Sets the language of the document.
     * @param String $lang Language
     */
    public function setLanguage($lang) {
        $this->lang = $lang;
    }

    /**
     * Returns the current document language.
     * @return String Language
     */
    public function getLanguage() {
        return $this->lang;
    }

    /**
     * Adds a URL to load a java script from.
     * @param String $url URL of the javascript
     */
    protected function addJavascript($url) {
        array_push($this->javascripts, $url);
    }

    /**
     * Adds a URL to load a stylesheet from.
     * @param String $url URL of the stylesheet
     */
    protected function addStylesheet($url) {
        array_push($this->stylesheets, $url);
    }

    /**
     * Returns a empty HTML-Document.
     * @return String HTML-Code
     */
    public function __toString() {
        $html  = '<!DOCTYPE html>'. PHP_EOL;
        $html .= '<html lang="'. $this->lang .'"><head>';
        $html .= '<title>'. htmlentities($this->title) .'</title>'. PHP_EOL;
        foreach ($this->javascripts AS $url) {
            $html .= '<script type="text/javascript" url="'. $url .'"></script>'. PHP_EOL;
        }
        foreach ($this->stylesheets AS $url) {
            $html .= '<link href="'. $url .'" rel="stylesheet" />'. PHP_EOL;
        }
        $html .= '</head><body>'. PHP_EOL;
        $html .= $this->messagetext;
        $html .= $this->buildBody();
        $html .= '</body></html>'. PHP_EOL;
        return $html;
    }

}