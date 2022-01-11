<?php

abstract class DAOSessionManager extends DatabaseObject {

    protected function __construct() {
        parent::__construct();
    }

    protected function checkCredentials($username, $password) {
        $query = "SELECT COUNT(*) AS correct FROM users LEFT JOIN credentials USING (userid) WHERE username = :username AND password_hash = PASSWORD(:password);";
        $row = $this->executeQuery($query, array(
            'username' => $username,
            'password' => $password
        ), false);
        return ($row['correct'] == 1);
    }

}