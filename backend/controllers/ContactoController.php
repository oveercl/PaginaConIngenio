<?php
require_once __DIR__ . '/../models/Contacto.php';

class ContactoController {
    public function enviar() {
        $datos = json_decode(file_get_contents('php://input'), true);
        if (Contacto::validar($datos)) {
            return json_encode(['mensaje' => 'Formulario enviado con éxito.'], JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(400);
            return json_encode(['error' => 'Datos inválidos.'], JSON_UNESCAPED_UNICODE);
        }
    }
}
?>