<?php
    namespace polling_system;

    class user
    {
        public $name;
        public $username;
        public $password;
        public $isAdmin;

        //constructor
        function __construct($name, $username, $password, $isAdmin)
        {
            $this->name = $name;
            $this->username = $username;
            $this->password = $password;
            $this->isAdmin = $isAdmin;
        }
    }
?>