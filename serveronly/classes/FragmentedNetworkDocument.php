<?php

abstract class FragmentedNetworkDocument extends NetworkDocument {

    protected $subtitle;

    /**
     * Sets a subtitle which will be placed under the main title.
     * @param String $subtitle Subtitle
     */
    protected function setSubtitle($subtitle) {
        $this->subtitle = $subtitle;
    }

    /**
     * Creates the HTML-Code of the navigation section.
     * @return String HTML-Code
     */
    abstract protected function buildMenu();

    /**
     * Creates the HTML-Code of the main section.
     * @return String HTML-Code
     */
    abstract protected function buildMain();

    /**
     * Creates the HTML-Code of the footer section.
     * @return String HTML-Code
     */
    abstract protected function buildFooter();

    /**
     * Prepare the body so it consists of a header, navigation, main and footer section.
     * @return String HTML-Code
     */
    protected function buildBody() {
        $html  = '<header><h1>'. htmlentities($this->title) .'</h1>';
        if (!empty($this->subtitle)) {
            $html .= '<h2>'. htmlentities($this->subtitle) .'</h2>';
        }
        $html .= '</header>'. PHP_EOL;
        $html .= '<nav>'. $this->buildMenu() .'</nav>'. PHP_EOL;
        $html .= '<main>'. $this->buildMain() .'</main>'. PHP_EOL;
        $html .= '<footer>'. $this->buildFooter() .'</footer>'. PHP_EOL;
        return $html;
    }

}