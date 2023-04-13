<?php
    namespace polling_system;

    class user {
        public $name;
        public $username;
        public $password;
        public $isAdmin;

        //constructor
        function __construct($name, $username, $password, $isAdmin) {
            $this->name = $name;
            $this->username = $username;
            $this->password = $password;
            $this->isAdmin = $isAdmin;
        }

        public function validName($name): bool
        {
            if (empty($name)) {
                $valid = false;
            } else if (preg_match("/^[a-zA-Z]{3,20}$/", $name)) {
                $valid = true;
            } else {
                $valid = false;
            }
            return $valid;
        }

        //username validation
        public function validUsername($username): bool
        {
            if (empty($username)) {
                $valid = false;
            } else if (preg_match("/^[a-zA-Z0-9]{4,20}$/", $username)) {
                $valid = true;
            } else {
                $valid = false;
            }
            return $valid;
        }

        //password validation -- if desired
        public function validPassword($password) {
            if (empty($password)) {
                $valid = false;
            } else if (preg_match("/^[a-zA-Z0-9]{4,20}$/", $password)) {
                $valid = true;
            } else {
                $valid = false;
            }
            return $valid;
        }

        /**
         * to signup / register a user
         *
         * @return string[] registration status message
         */
        public function registerUser() {
            $validName = $this->validName($_POST["name"]);
            $validUsername = this->validUsername($_POST["username"]);
            $validPassword = this->validPassword($_POST["password"]);

            if (!$validName) {
                $response = array(
                    "status" => "error",
                    "message" => "username already exists"
                );
            } else if (!$validUsername) {
                $response = array(
                    "status" => "error",
                    "message" => "email already ex"
                );
            } else {
                if (!empty($_POST["signup_password"])) {
                    $hashedPassword = password_hash($_POST["signup_password"]);
                }
                $query = 'INSERT INTO user_credentials (username, password, email) VALUES (?,?,?)';
                $paramType = 'sss';
                $paramValue = array(
                    $_POST["username"],
                    $hashedPassword,
                    $_POST["email"]
                );
                $userID = this->ds->insert($query, $paramType, $paramValue);

                if (!empty($userID)) {
                    $response = array(
                        "status" => "success",
                        "message" => "registration complete"
                    );
                }
            }
            return $response;
        }

        public function getUser($con, $username) {
            $query = $con->prepare("SELECT * FROM tbl_users WHERE username = ? AND password = ?");
            return $username;
        }

        /**
         * To login a user
         *
         * @return string
         */
        public function loginUser() {
            $userRecord = $this->getUser($_POST["username"]);
            $loginPassword = 0;

            //checks if username and password are both filled in
            if (!empty($userRecord)) {
                if (!empty($_POST["login-password"])) {
                    $password = $_POST["login-password"];
                }
                $hashedPassword = $userRecord[0]["password"];
                $loginPassword = 0;

                //checks if password is correct
                if (password_verify($password, $hashedPassword)) {
                    $loginPassword = 1;
                }
            } else {
                $loginPassword = 0;
            }

            if ($loginPassword == 1) {
                //login successful -- username is stored in session
                session_start();
                $_SESSION["username"] = $userRecord[0]["username"];
                session_write_close();
                $url = "./home.php";
                header("Location: $url");
            } else if ($loginPassword == 0) {
                $loginStatus = "invalid username or password";
                return $loginStatus;
            }
        }
    }