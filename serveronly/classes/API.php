<?php

class API {

    private static $instance;
    private $output_data;

    private function __construct() {
        $this->output_data = [];
    }

    private static function getInstance(): API {
        if (self::$instance === null) {
            self::$instance = new API();
        }
        return self::$instance;
    }

    private function getOutputData(): array {
        return $this->output_data;
    }

    public static function call() {
        header('Content-Type: application/json; Charset=UTF-8');
        print json_encode(
            self::getInstance()->getOutputData(),
            JSON_PRETTY_PRINT
        );
    }

}