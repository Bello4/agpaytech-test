<?php

namespace App;

require_once PROJECT_ROOT_PATH . "/model/Database.php";
 
class CountryModel extends Database
{
    public function getCountries($limit)
    {
        return $this->select("SELECT * FROM countries ORDER BY id ASC LIMIT ?", ["i", $limit]);
    }
}