<?php

    class Database
    {
        private $db_host = "localhost";
        private $db_user = "root";
        private $db_password = "root";
        private $db_database = "filmaviu";
        private $mysqli = null;
        private static $instance;

        // SINGLETON IMPLEMENTATION
        protected function __construct()
        {
            // empty
        }
        private function __clone()
        {
            // empty
        }
        private function __wakeup()
        {
            // empty
        }

        public static function getInstance()
        {
            if (!isset(self::$instance))
            {
            // late static binding
                self::$instance = new self;
            }
            return self::$instance;
        }

        public function getConnection()
        {
            if ($this->mysqli == null)
            {
                $this->mysqli = $this->createConnection();
            }
            return $this->mysqli;
        }

        public function closeConnection()
        {
            if ($this->mysqli != null)
            {
                $this->mysqli->close();
                $this->mysqli = null;
            }
        }

        private function createConnection()
        {
            $mysqli = @new mysqli(
                $this->db_host,
                $this->db_user,
                $this->db_password,
                $this->db_database
            );

            if ($mysqli->connect_error)
            {
                die('Error: '.$mysqli->connect_error);
            }

            return $mysqli;
        }
    }

?>
