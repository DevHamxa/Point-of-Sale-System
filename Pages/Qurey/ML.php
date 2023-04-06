<?php
    session_start();

    session_unset();
    session_destroy();
    
    header ('location:../../index.php?msg=Try-loging-in-before-proceding-further');
    /* Or whatever document you want to show afterwards */
?>