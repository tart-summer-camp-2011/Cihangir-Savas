<?php
        include 'autoload.php';
        $marineSoldier = new Marine();
        $sergentSoldier= new Sergeant();
        $marineSoldier->setAttackPower(100);
        $sergentSoldier->setAttackPower(100);
        $i=10;
        while ($i>0) {
    
            $marineSoldier->swim(rand ( 0 , 30 ));
            $marineSoldier->dive(rand ( 0 , 30 ));
            $sergentSoldier->crawl(rand ( 0 , 30 ));
            $sergentSoldier->shoot($marineSoldier);
            $sergentSoldier->getHit(rand ( 0 , 30 ));
            $marineSoldier->getHit(rand ( 0 , 30 ));       
            $i--;
        }
        echo $marineSoldier->getAttackPower();
?>
