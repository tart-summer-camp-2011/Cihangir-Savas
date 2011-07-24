<?php
/**
 * Index
 * 
 * @package     EventDriven
 * @subpackage  -
 * @copyright   siesta
 * @license     GNU General Public License
 * @author      siesta <cihangir.savas@tart.com.tr>
 *
 */
include "Travel.php";

function databindEvent($sender, $e)
{
     echo 'Dear Passenger ' . $e->cells[0] . ' our ' . '<span style="background-color:#550000;color:#FFFFFF">' . $e->cells[1] . '</span>'. ' is about to come <br>';
}

$durak = new Station();
$durak->addPassanger("Ahmet VARLI", "81T");
$durak->addPassanger("Mehmet YOKLU ", "72T");
$durak->addPassanger("Recep COKLU", "15F");
$durak->ondatabind->subscribe("databindEvent");

$durak2 = new Station();
$durak2->addPassanger("Ahmet VARLI", "81T");
$durak2->addPassanger("Mehmet YOKLU ", "72T");
$durak2->addPassanger("Recep COKLU", "15F");
$durak2->ondatabind->subscribe("databindEvent");
?>
<html>	
    <head>
        <title>Otobus</title>		
    </head>
    <body>
        <form method="POST">			
            <? $durak->notify();  $durak2->notify(); ?>			
        </form>
    </body>	
</html>