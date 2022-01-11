<?php

abstract class DAOUser extends DatabaseObject {

    const USERID_INVALID = -1;
    const STATUS_DEACTIVATED = 'D';
    const STATUS_ACTIVE = 'A';
    protected $userid;
    protected $username;
    protected $status;
    protected $created;
    protected $changed;

    protected function __construct($userid = DAOUser::USERID_INVALID) {
        parent::__construct();
        if (is_int($userid)) {
            $this->userid = $userid;
        } else if (is_string($userid)) {
            $this->username = $userid;
        } else {
            die('You need to give me a integer or string in order to identify a user');
        }
        $this->load();
    }

    /**
     * Loads the user dttributes from the database. Keep in mind that a userid has to be given as primary key.
     * @return Boolean True on success or false
     */
    protected function load() {
        if (!is_null($this->userid)) {
            /* We identify the user by it's user id */
            $query = "SELECT userid, username, status, created, changed FROM users WHERE userid = :userid";
            $parameter = array('userid' => $this->userid);
        } else {
            /* We have to identify the user by it's unique username */
            $query = "SELECT userid, username, status, created, changed FROM users WHERE username = :username";
            $parameter = array('username' => $this->username);
        }
        $row = $this->executeQuery($query, $parameter, false);
        if (!is_array($row)) {
            return false;
        }
        $this->userid   = $row['userid'];
        $this->username = $row['username'];
        $this->status   = $row['status'];
        $this->created  = $row['created'];
        $this->changed  = $row['changed'];
        return true;
    }

    /**
     * Commit the current user data to the database. Keep in mind tat the
     * userid as the primary key must not change, of course.
     * @return Boolean True on success or false
     */
    protected function commit() {
        $query = "UPDATE users SET username = :username, status = :status, created = CURRENT_TIMESTAMP WHERE userid = :userid";
        return $this->executeQuery($query, array(
            'username' => $this->username,
            'status' => $this->status,
            'userid' => $this->userid
        ));
    }

}
