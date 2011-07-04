<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Marine
 *
 * @author savas
 */
class Marine extends SoldierAbstract implements NavyInterface{
    //put your code here
    public function setAttackPower($attackPower) {
        $this->_attackPower=$attackPower;
    }



}

?>
