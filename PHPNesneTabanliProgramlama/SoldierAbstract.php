<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SoldierAbstract
 *
 * @author savas
 */
abstract class SoldierAbstract {
    //put your code here
    protected $_attackPower;
    
    public function getAttackPower(){
        return $this->_attackPower;
    }
}

?>
