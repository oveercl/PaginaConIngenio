<?php
class MisionVision {
    public static function obtener() {
        $db = require __DIR__ . '/../database/simulacion.php';
        return [
            'mision' => $db['mision'],
            'vision' => $db['vision']
        ];
    }
}
?>