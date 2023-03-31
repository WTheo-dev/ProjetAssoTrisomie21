<?php
    session_start();
    if ($_SESSION[''] == 0){
        session_destroy();
        header('Location:  ');
    } else{
        session_destroy();
        header('Location: ');
    }
    
?>
