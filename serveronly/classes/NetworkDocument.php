<?php

abstract class NetworkDocument extends NetworkFragment {

    const LANGUAGE_ENGLISH = 'en';
    const LANGUAGE_GERMAN  = 'de';
    const LANGUAGE_DUTCH   = 'nl';
    const DEFAULT_TITLE = 'Network';
    private $sessionmanager;
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
        $this->sessionmanager = new SessionManager();
        $this->title = $title;
        $this->lang = $lang;
        $this->javascripts = array();
        $this->stylesheets = array(
            'css/network.css'
        );
    }

    /**
     * Returns the session manager.
     * @return SessionManager Sessionmanager
     */
    public function getSessionManager() {
        return $this->sessionmanager;
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
     * Checks if the requested value is set in the post data and returns it or the default value.
     * @param String $key Key in the post data to check and use
     * @param String $default_value Default value to return if the requested key is not available
     * @return String Value of the post data or the default value
     */
    protected function getValue($key, $default_value = NULL) {
        if (isset($_POST[$key])) {
            return filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
        }
        return $default_value;
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