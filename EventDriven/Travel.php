<?php
/**
 * Passenger And Station Classes
 * 
 * @package     EventDriven
 * @subpackage  -
 * @copyright   siesta
 * @license     GNU General Public License
 * @author      siesta <cihangir.savas@tart.com.tr>
 *
 */
require_once 'Event.php';

class Passenger
{

    public function __construct()
    {
        $array = func_get_args();
        $this->cells = $array[0];
    }

    public $cells;

}

class Station
{

    public $passengers;
    public $ondatabind;

    public function __construct()
    {
        $this->ondatabind = new Event();
    }

    public function addPassanger()
    {
        $this->passengers[] = new Passenger(func_get_args());
    }

    public function notify()
    {
        foreach ($this->passengers as $passanger) {
            $this->ondatabind->raise($this, $passanger);
        }
    }

}

?>