<?php
require_once __DIR__ . '/../models/Servicio.php';

class ServiciosController {
    public function index() {
        $servicios = Servicio::obtenerTodos();
        return json_encode($servicios, JSON_UNESCAPED_UNICODE);
    }
}
?>