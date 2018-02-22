<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of autenticacion
 *
 * @author diplez
 */
$nuevo = new autenticacion();

class autenticacion {

    //put your code here
    function __construct() {        
        $this->metodoCarga();
    }

    function metodoCarga() {
        include "../model/login.php";
        if (!empty($_POST)) {
            if (isset($_POST["username"]) && isset($_POST["password"])) {
                if ($_POST["username"] != "" && $_POST["password"] != "") {                    
                    login_user($_POST["username"], $_POST["password"]);
                }                
            }            
        }
    }

}
