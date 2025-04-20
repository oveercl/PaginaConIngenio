<?php
class Contacto {
    public static function validar($data) {
        return isset($data['nombre']) && isset($data['correo']) && isset($data['mensaje']);
    }
}
?>