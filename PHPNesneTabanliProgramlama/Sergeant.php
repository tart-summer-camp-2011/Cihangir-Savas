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
class Sergeant extends SoldierAbstract implements ArmyInterface {
    //put your code here
     public function crawl($length){
     
         echo 'I am crawling '.$length. 'meters along this rocky solid'.'<br>';
         
     }

    public function shoot($attackTo) {
        
        echo 'Iam attackin to '.$attackTo.' and I hope my bullet will never end up'.'<br>';
        
    }

    public function setAttackPower($attackPower) {
        $this->_attackPower=$attackPower;
    }
    
    public function getAttackPower() {
        return parent::getAttackPower();
    }

    public function getHit($damage) {
        parent::getHit($damage);
    }

    public function getLife() {
        return parent::getLife();
    }
    
    
    
    public function __toString() {
        echo 'SergentSoldier';
    }

}

?>
