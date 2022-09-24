<?php
$db = new PDO('mysql:host=localhost; dbname=financiera','cursos','root123');

if (!$db) {
    echo "Error al conectar la Base de datos";
    exit;
}