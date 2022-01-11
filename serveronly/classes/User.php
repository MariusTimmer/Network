<?php

class User extends DAOUser {

    public function __construct($user_identification) {
        parent::__construct($user_identification);
    }

    public function getUserID() {
        return $this->userid;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getCreated() {
        return $this->created;
    }

    public function getChanged() {
        return $this->changed;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function __toString() {
        return 'User #'. $this->userid .' ('. $this->username .')';
    }

}
