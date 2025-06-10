<?php

namespace App\Service\PDO;

use App\Config;
use PDO;
use PDOException;

/*
 *   this class is responsible for connecting
 *   to mysql database and executing queries
 */
class MysqlController
{

private array $mysqlConfig; //Config mysql
private ?PDO $conn = null; //PDO or null
public function __construct(){
    $this->mysqlConfig = Config::getConfigArray('db');
}

private function getMysqlConfig(){
    return $this->mysqlConfig;
}

// Method is setting PDO to conn variable so it can be used in other
protected function getMysqlConnect(): PDO{
    if ($this->conn !== null){
        return $this->conn;
    }

    if ($this->mysqlConfig == null) {
        throw new PDOException("Mysql config error");
    }

    try {
        $this->conn = new PDO("mysql:host=" . $this->mysqlConfig['host'] . ";dbname=" . $this->mysqlConfig['name'] . ";charset=" . $this->mysqlConfig['charset'], $this->mysqlConfig['user'], $this->mysqlConfig['pass']);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        die("Mysql connection error: " . $e->getMessage());
    }
    return $this->conn;
}

public function fetchSingle(string $query, array $params = []): array|bool{
    $statement = $this->getMysqlConnect()->prepare($query);
    $statement->execute($params);
    return $statement->fetch(PDO::FETCH_ASSOC);
}





}