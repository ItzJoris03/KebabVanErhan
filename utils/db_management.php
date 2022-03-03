<?php 

class db extends PDO {
    private static $host = 'localhost';
    private static $pwd = '';
    private static $user = 'root';
    private static $db = 'kebab_van_erhan';

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

        return $this->getData($sql, null, $day);

        // $stmt->bindValue(':parameter', 'value');
        // $stmt->execute();
        // return $stmt->fetch();
    }

    public function getPassword(string $email) : array | false {
        $sql = "SELECT Password
                FROM account
                WHERE Mail = ?";

        return $this->getData($sql, null, $email);
    }

    public function getMenuTypes() : array | false {
        $sql = "SELECT Id, Type
                FROM type";
        
        return $this->getData($sql);
    }

    public function getMenu(int $TypeId) : array | false {
        $sql = "SELECT Name, PriceRegular, PriceKalf, PriceKip, PriceMix
                FROM menu
                WHERE TypeId = ?";

        return $this->getData($sql, null, $TypeId);
    }

    // array[row][column => value]
    private function getData(string $sql, ?int $exceptionCode = NULL, mixed ...$bind) : array | false {
        try {
            $stmt = $this->prepare($sql);
            $bind = ($bind == array(NULL)) ? NULL : $bind;
            $stmt->execute($bind);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $results;
        } catch (PDOException $e) {
            // $this->throwException($e, $exceptionCode, $sql);
            return false;
        }
    }
}


?>