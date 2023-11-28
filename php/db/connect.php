<?php
    class Driver{
        private $host;
        private $db;
        private $pass;

        private $user;

        public function __construct($host, $db, $user, $pass){
            $this->host = $host;
            $this->db = $db;
            $this->user = $user;
            $this->pass = $pass;
        }

        public function connect(){
            $connection = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getDB());
            if (!$connection){
                return false;
            } else{
                return $connection;
            };
        }
        public function getHost(){
            return $this->host;
        }
        public function getDB(){
            return $this->db;
        }
        public function getUser(){
            return $this->user;
        }
        public function getPass(){
            return $this->pass;
        }
        public function setHost($host){
            $this->host = $host;
        }
        public function setDB($db){
            $this->db = $db;
        }
        public function setUser($user){
            $this->user = $user;
        }
        public function setPass($pass){
            $this->pass = $pass;
        }

    }
?>