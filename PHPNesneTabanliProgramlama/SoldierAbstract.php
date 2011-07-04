<?php

/**
 * Description of SoldierAbstract
 *
 * @author savas
 */

abstract class SoldierAbstract {
    //put your code here
    protected $_attackPower;
    protected $_life;
    
    public function getAttackPower(){
        return $this->_attackPower;
    }
    
    public function getLife(){
        return $this->_life;
    }
    
    public function getHit($damage){
        
        if($this->_life<=0){
            echo 'Died';
        }else{
        $this->_life-=$damage;
        echo  'My life expantancy is decreasing to '.$this->_life.'<br>';
        }
    
    }
}

?>
