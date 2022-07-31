<?php 

require_once PROJECT_ROOT_PATH . "/model/Database.php";
 
class CurrencyModel extends Database
{
    public function getCurrencies($limit)
    {
        return $this->select("SELECT * FROM currencies ORDER BY id ASC LIMIT ?", ["i", $limit]);
    }
}

