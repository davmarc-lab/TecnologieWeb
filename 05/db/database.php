<?php

class DatabaseHelper {
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getRandomPosts($n) {
        $stmt = $this->db->prepare("SELECT idarticolo, titoloarticolo, imgarticolo
                FROM articolo
                ORDER BY RAND()
                LIMIT ?");
        $stmt->bind_param('i', $n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategories() {
        $stmt = $this->db->prepare("SELECT * FROM categoria");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPosts($n=-1) {
        $query = "SELECT idarticolo, titoloarticolo, dataarticolo, imgarticolo, anteprimaarticolo, nome
                FROM articolo, autore
                WHERE autore = idautore
                ORDER BY dataarticolo DESC";
        if ($n > 0) {
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if ($n > 0) {
        $stmt->bind_param('i', $n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    
}

?>
