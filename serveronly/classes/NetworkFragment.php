<?php

abstract class NetworkFragment {

    const MESSAGE_PRIORITY_DEBUG   = 1;
    const MESSAGE_PRIORITY_INFO    = 2;
    const MESSAGE_PRIORITY_NOTICE  = 3;
    const MESSAGE_PRIORITY_WARNING = 4;
    const MESSAGE_PRIORITY_ERROR   = 5;
    protected $messagetext;

    protected function __construct() {
        $this->messagetext = '';
    }

    /**
     * Adds a message to the begin of the content.
     * @param String $text Message to print out (no HTML)
     * @param Integer $loglevel Message priority (MESSAGE_PRIORITY_*-constants)
     */
    protected function addMessage($text, $loglevel = NetworkFragment::MESSAGE_PRIORITY_NOTICE) {
        switch ($loglevel) {
            case NetworkFragment::MESSAGE_PRIORITY_DEBUG:
                $classname = 'debug';
                break;
            case NetworkFragment::MESSAGE_PRIORITY_INFO:
                $classname = 'info';
                break;
            case NetworkFragment::MESSAGE_PRIORITY_WARNING:
                $classname = 'warning';
                break;
            case NetworkFragment::MESSAGE_PRIORITY_ERROR:
                $classname = 'error';
                break;
            case NetworkFragment::MESSAGE_PRIORITY_NOTICE:
            default:
                $classname = 'notice';
                break;
        }
        $this->messagetext .= '<div class="message '. $classname .'">'. htmlentities($text) .'</div>'. PHP_EOL;
    }

    public function __toString() {
        return $this->messagetext;
    }

}
