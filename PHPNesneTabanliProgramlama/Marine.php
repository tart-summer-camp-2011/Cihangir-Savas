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
    public function dive($depth) {
        echo 'I am divin to '.$depth. 'meters'.'<br>';  
        
    }

    public function swim($length) {
                echo 'I am swimmin to '.$length. 'meters'.'<br>';  
        
    }

    public function getAttackPower() {
        return parent::getAttackPower();
    }

    public function getLife() {
        return parent::getLife();
    }
    public function getHit($damage) {
        parent::getHit($damage);
    }
    
    public function __toString() {
        echo 'MarineSoldier';
    }

    
    
    
    



}

?>
