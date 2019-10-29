<?php
    class User
    {
        public $id;
        public $email;
        public $username;
        public $numfriends;

        public function __construct($id)
        {
            $this->id = $id;
            $this->UpdateDetails();
        }

        public function UpdateDetails()
        {
            include "dbconnect.php";

            $query = "SELECT * FROM friends WHERE friend_id = $this->id";
            $result = $conn->query($query)->fetch_assoc();

            $this->email = $result["friend_email"];
            $this->username = $result["profile_name"];
            $this->numfriends = $result["num_of_friends"];
        }

        public function Commit()
        {
            include "dbconnect.php";

            $query = "UPDATE friends SET ";
            $query .= "num_of_friends = $this->numfriends ";
            $query .= "WHERE friend_id = $this->id";

            $conn->query($query);
        }
    }
?>