<?php

spl_autoload_register(function($classname){
    echo $classname;
    require "../Module/Database".$classname.".php";
});