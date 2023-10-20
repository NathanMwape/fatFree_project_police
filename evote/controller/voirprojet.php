<?php
    session_start();
    require_once '../model/candidat.php';

  
        $user = new candidat();
        $user->setprojet($_POST['projet']);
        

        //var_dump($user);
        $user->postuler();
        
    
?>