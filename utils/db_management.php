<?php 

class db extends PDO {
    private $host = 'localhost';
    private $pwd = '';
    private $user = 'root';
    private $db = 'kebab_van_erhan';
    private $pdo;

    // private $host = "rdbms.strato.de";
    // private $user = "dbu208998";
    // private $pwd = "cbdf44Zr79UTJ8t";
    // private $db = "dbs4966586";

    function __construct() {
        $this->createConnection();
    }

    function createConnection() : bool {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->db;charset=UTF8";
            parent::__construct($dsn, $this->user, $this->pwd);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getLocations(?string $day = NULL) : array | false {
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

    function getPassword(string $email) : array | false {
        $sql = "SELECT Password
                FROM account
                WHERE Mail = ?";

        return $this->stmtExecute($sql, $email);
    }

    function getMenuTypes() : array | false {
        $sql = "SELECT Id, Type
                FROM type";
        
        return $this->stmtExecute($sql);
    }

    function getMenu(int $TypeId) : array | false {
        $sql = "SELECT Name, PriceRegular, PriceKalf, PriceKip, PriceMix
                FROM menu
                WHERE TypeId = ?";

        return $this->stmtExecute($sql, $TypeId);
    }

    // array[row][column => value]
    function stmtExecute(string $sql, mixed ...$bind) : array | false {
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