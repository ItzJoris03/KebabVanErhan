<?php 

class db extends PDO {
    private static $host = 'localhost';
    private static $pwd = '';
    private static $user = 'root';
    private static $db = 'kebab_van_erhan';

    // private static $host = "rdbms.strato.de";
    // private static $user = "dbu208998";
    // private static $pwd = "cbdf44Zr79UTJ8t";
    // private static $db = "dbs4966586";

    function __construct() {
        $this->createConnection();
    }

    private function createConnection() : bool {
        try {
            $dsn = "mysql:host=".self::$host.";dbname=".self::$db.";charset=UTF8";
            parent::__construct($dsn, self::$user, self::$pwd);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getLocations(?string $day = NULL) : array | false {
        $sql = ($day === NULL) ? "SELECT Day, Place, Name, TimeStart, TimeEnd
                                  FROM location" : 
                                  "SELECT Day, Place, Name, TimeStart, TimeEnd
                                  FROM location
                                  WHERE Day = ?";

        return $this->stmtExecute($sql, $day);

        // $stmt->bindValue(':parameter', 'value');
        // $stmt->execute();
        // return $stmt->fetch();
    }

    public function getPassword(string $email) : array | false {
        $sql = "SELECT Password
                FROM account
                WHERE Mail = ?";

        return $this->stmtExecute($sql, $email);
    }

    public function getMenuTypes() : array | false {
        $sql = "SELECT Id, Type
                FROM type";
        
        return $this->stmtExecute($sql);
    }

    public function getMenu(int $TypeId) : array | false {
        $sql = "SELECT Name, PriceRegular, PriceKalf, PriceKip, PriceMix
                FROM menu
                WHERE TypeId = ?";

        return $this->stmtExecute($sql, $TypeId);
    }

    // array[row][column => value]
    private function stmtExecute(string $sql, mixed ...$bind) : array | false {
        $stmt = $this->prepare($sql);
        if($stmt) {
            $stmt->execute($bind);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $results;
        } else {
            return false;
        }
    }
}


?>