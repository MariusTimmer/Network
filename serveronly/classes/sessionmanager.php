<?php

class SessionManager {

    const KEY_STARTED = 'started';
    const KEY_USERID = 'userid';

    public function __construct() {
        $this->initiate();
    }

    private function initiate() {
        session_start();
        if (!isset($_SESSION[SessionManager::KEY_STARTED])) {
            /**
             * The session was not initiated yet so we have to do it now.
             */
            $_SESSION[SessionManager::KEY_STARTED] = time();
        }
    }

    /**
     * Tries to log in the current user using the given credentials.
     * @param String $userid User identification
     * @param String $password That is self explaining I guess
     * @return Boolean True if the credentials are correct or false
     */
    public function login($userid, $password) {
        return false;
    }

    /**
     * Determinates weather the current user is logged in or not.
     * @return Boolean True if the current user is logged in or false
     */
    public function isLoggedIn() {
        return isset($_SESSION[SessionManager::KEY_USERID]);
    }

    public function getUserID() {
        return $_SESSION[SessionManager::KEY_USERID];
    }

}