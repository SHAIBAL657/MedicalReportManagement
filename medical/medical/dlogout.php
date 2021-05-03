<?php
    
    session_start();
    
    session_destroy();
    echo "<SCRIPT> //not showing me this
    alert('Logout Successfully!')
    window.location.replace('choose.php');
    </SCRIPT>";

?>