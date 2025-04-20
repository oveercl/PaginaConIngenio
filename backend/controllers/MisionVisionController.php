<?php
require_once __DIR__ . '/../models/MisionVision.php';

class MisionVisionController {
    public function mostrar() {
        $datos = MisionVision::obtener();
        return json_encode($datos, JSON_UNESCAPED_UNICODE);
    }
}
?>