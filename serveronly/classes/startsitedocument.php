<?php

class StartSiteDocument extends FragmentedNetworkDocument {

    const TITLE = 'Startsite';

    public function __construct() {
        parent::__construct(StartSiteDocument::TITLE);
        $this->setSubtitle('Welcome to our comunity!');
    }

    /**
     * Creates a dummy menu.
     * @return String HTML-Code
     */
    protected function buildMenu() {
        $html = '<div id="primarymenu">';
        $menu = array(
            '/index.php' => 'Start',
            '/impressum.php' => 'Impressum'
        );
        foreach ($menu AS $url => $label) {
            $html .= '<a href="'. $url .'">'. htmlentities($label) .'</a>';
        }
        $html .= '</div>';
        return $html;
    }

    /**
     * Creates the HTML-Code of the main content.
     * @return String HTML-Code
     */
    protected function buildMain() {
        $textelement = new TextElement('This is an example text boy to show how the concept works.');
        return $textelement;
    }

    /**
     * Creates the HTML-Code of the document footer.
     * @return String HTML-Code
     */
    protected function buildFooter() {
        return '&copy; 2017 by Marius Timmer';
    }

}