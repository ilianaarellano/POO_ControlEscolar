<?php
/**
 * Created by PhpStorm.
 * User: Migue
 * Date: 7/10/14
 * Time: 12:55 PM
 */
$usuario=$_POST["usuario"];
$password=$_POST["password"];
require 'bd.php';
require 'Login.php';
$login = new Login();
$login->validarUsuario($usuario,$password);