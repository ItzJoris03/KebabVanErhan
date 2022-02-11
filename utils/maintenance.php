<?php

class Maintenance {
    private static bool $state = true;
    private static Date $endMaintenance;
    const NAVBAR = 0;

    // function __construct(bool $state, Date $endOfMaintenance = null) {
    //     $this->state = $state;
    //     $this->$endMaintenance = $endOfMaintenance;
    // }

    public static function getState() : bool {
        return self::$state;
    }

    public static function setState(bool $state) : void {
        self::$state = $state;
    }

    public static function getEndOfMaintenance() : Date {
        return self::$endMaintenance;
    }

    public static function setEndOfMaintenance(Date $endOfMaintenance) : void {
        self::$endMaintenance = $endOfMaintenance;
    }

    public static function checkMaintenance(?int $for = null) : bool | null {
        if(self::$state) {

            if(empty(self::$endMaintenance) || self::$endMaintenance != Date("now")) {

                switch($for) {
                    case 0:
                        return true;
                        break;
                    default:
                        return null;
                        break;
                }
            } else {
                self::$state = false;
                unset(self::$endMaintenance);
                return null;
            }
        } else {
            return null;
        }
        
    }
}

?>