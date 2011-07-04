<?php
        include 'autoload.php';
        $marineSoldier = new Marine();
        $marineSoldier->setAttackPower(100);
        echo $marineSoldier->getAttackPower();
?>
