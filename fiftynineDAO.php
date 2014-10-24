<?php
//include 'S59Profile.php';

class fiftynineDAO {
    private $_mysqli;
    
    function __construct() {        
    }

    function __destruct() {
    }

    private function getDBConnection() {
        if (!isset($_mysqli)) {
            $_mysqli = new mysqli("128.180.177.4:3307", "guest", "pitch", "59secondpitch");
            if ($_mysqli->errno) {
                printf("Unable to connect: %s", $_mysqli->error);
                exit();
            }
        }
        return $_mysqli;
    }

    public function getArtistList() {
        $lst = array();
        $con = $this->getDBConnection();
        $result = $con->query("SELECT DISTINCT artist FROM songlist ORDER BY artist");
        $i = 0;
        while ($row = $result->fetch_row()) {
            $lst[$i++] = $row[0];
        }
        return $lst;
    }
    
    public function getSearchResults($artist, $keyword) {
        $con = $this->getDBConnection();
            
        $sql = "SELECT title, artist, numone FROM songlist WHERE (1=1) ";
        $lst = array();
        
        if (isset($artist) && strlen($artist) > 0 && $artist != "(none)") {
            $sql = $sql . " AND artist='" . $artist . "'";
        }
            
        if (isset($keyword) && strlen($keyword) > 0) {
            $sql = $sql . " AND title like '%" . $keyword . "%'";
        }
            
        $sql = $sql . " ORDER BY artist";
        $result = $con->query($sql);
        $i = 0;
        while ($row = $result->fetch_row()) {
            $rec = new SearchResultsRecord($row[0], $row[1], $row[2]);
            $lst[$i++] = $rec;
        }
        return $lst;
    }    
    
}

?>
