<?php

class Maintenance {
    private bool $state = true;
    private Date $endMaintenance;
    public int $NAVBAR = 0;

    // function __construct(bool $state, Date $endOfMaintenance = null) {
    //     $this->state = $state;
    //     $this->$endMaintenance = $endOfMaintenance;
    // }

    function getState() : bool {
        return $this->state;
    }

    function setState(bool $state) : void {
        $this->state = $state;
    }

    function getEndOfMaintenance() : Date {
        return $this->endMaintenance;
    }

    function setEndOfMaintenance(Date $endOfMaintenance) : void {
        $this->endMaintenance = $endOfMaintenance;
    }

    function checkMaintenance(?int $for = null) : bool | null {
        if($this->state) {

            if(empty($this->endMaintenance) || $this->endMaintenance != Date("now")) {

                switch($for) {
                    case 0:
                        return true;
                        break;
                    default:
                        return null;
                        break;
                }
            } else {
                $this->state = false;
                unset($this->endMaintenance);
                return null;
            }
        } else {
            return null;
        }
        
    }
}

?>