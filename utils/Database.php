<?php

    class Database
    {
        private $db_host;
        private $db_user;
        private $db_password;
        private $db_database;
        private $mysqli = null;

        public function getConnection()
        {
            if ($this->mysqli == null)
            {
                $this->mysqli = $this->createConnection();
            }
            return $this->mysqli;
        }

        private function createConnection()
        {
            
        }
    }

?>
