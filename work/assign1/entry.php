<?php
    class JobListing
    {
        public $id;
        public $date;

        public function __construct($id, $date)
        {
            $this->id = $id;
            $this->date = $date;
        }
    }
?>