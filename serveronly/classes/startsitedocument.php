<?php

class StartSiteDocument extends FragmentedNetworkDocument {

    const TITLE = 'Startsite';

    public function __construct() {
        parent::__construct(StartSiteDocument::TITLE);
        $this->setSubtitle(gettext('Welcome to our comunity!'));
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
        $html = '';
        if ($this->getSessionManager()->isLoggedIn()) {
            $html .= new TextElement(gettext('Thank you for being a part of thes awesome network!'));
        } else {
            /**
             * The current user is not logged in which means we have
             * to offer an login formular to change that.
             */
            $login_formular = new FormularElement('login.php', gettext('Login'));
            $login_formular->addContent(new LabeledTextInputElement(gettext("Username"), 'userid'));
            $login_formular->addContent(new LabeledPasswordInputElement(gettext("Password"), 'password'));
            $html .= $login_formular;
        }
        return $html;
    }

    /**
     * Creates the HTML-Code of the document footer.
     * @return String HTML-Code
     */
    protected function buildFooter() {
        return '&copy; 2017 by Marius Timmer';
    }

}
