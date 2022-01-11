<?php

abstract class DatabaseObject {

    static protected $connection = NULL;
    const CONFIGURATION_FILENAME = 'database.json';

    protected function __construct() {
        if (is_null(self::$connection)) {
            $this->connect();
        }
    }

    /**
     * Connects to the database references in the database configuration.
     * @return Boolean True on success or false
     */
    private function connect() {
        if (!file_exists(DatabaseObject::CONFIGURATION_FILENAME)) {
            // There is no configuration file
            trigger_error('There is no configuration file "'. DatabaseObject::CONFIGURATION_FILENAME .'"!');
            return false;
        }
        $json = (object) json_decode(trim(file_get_contents(DatabaseObject::CONFIGURATION_FILENAME)));
        if (empty($json)) {
            // The file is not readable or it does not contain JSON
            trigger_error('No valid JSON in configuration file!');
            return false;
        }
        try {
            $dsn = 'mysql:hostname='. $json->hostname .';dbname='. $json->database;
            self::$connection = new PDO($dsn, $json->username, $json->password);
            return true;
        } catch (PDOException $exception) {
            trigger_error($exception->getMessage());
            return false;
        }
    }

    /**
     * Executes a SQL statement and returns its result. Made for SELECT statements.
     * @param String $query SQL-Query
     * @param Array $parameter Associative array containing the parameters
     * @param Boolean $return_list Set to true to return a list of results or false to return only one item
     * @param Integer $fetch_type PDO fetch type
     * @return Array Query result
     */
    protected function executeQuery($query, $parameter, $return_list = true, $fetch_type = PDO::FETCH_ASSOC) {
        $statement = self::$connection->prepare($query);
        foreach ($parameter AS $key => $value) {
            $statement->bindParam(':'. $key, $value);
        }
        if (!$statement->execute()) {
            // SQL-Statement failed
            $info = $statement->errorInfo();
            trigger_error($info[0] .': '. $info[2]);
            return false;
        }
        if ($return_list) {
            return $statement->fetchAll($fetch_type);
        } else {
            return $statement->fetch($fetch_type);
        }
    }

}





















