<?php
session_start();

        session_destroy();
        echo '<script language="javascript">';
        echo "if(!alert('Logging Out !!')) document.location = 'index.php'";
        echo '</script>';
        break;

?>