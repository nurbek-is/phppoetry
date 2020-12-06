<?php
function isProduction () {
    //Provide way of knowing if the code is on production server
    return false;
}
function isDebugMode() {
//Set to true if not on production 
//YOu may want to provide other ways for setting debug mode
    return !isProduction();
}
?>