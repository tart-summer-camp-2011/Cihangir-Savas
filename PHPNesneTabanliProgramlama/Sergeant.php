<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sergeant
 *
 * @author savas
 */
class Sergeant extends AbstractSoldier implements ArmyInterface {
    //put your code here
    public function setAttackPower($attackPower) {
        $this->_attackPower=$attackPower;
    }
    

}

?>
