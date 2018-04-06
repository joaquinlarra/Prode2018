<?php

if($_GET['key'] != 'B4mB00d3v!!--t34m')
{
    echo "invalid";
    die();
}

var_dump (shell_exec ("git pull origin master 2>&1"));

