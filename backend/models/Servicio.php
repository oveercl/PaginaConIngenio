<?php
class Servicio {
    public static function obtenerTodos() {
        $db = require __DIR__ . '/../database/simulacion.php';
        return $db['servicios'];
    }
}
?>