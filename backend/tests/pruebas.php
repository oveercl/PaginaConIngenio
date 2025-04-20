<?php
function test($desc, $condicion) {
    echo $desc . ': ' . ($condicion ? "✔️ OK\n" : "❌ FALLÓ\n");
}

$ch = curl_init("http://localhost:8000/servicios");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$data = json_decode($response, true);
test("GET /servicios retorna array", is_array($data));

$ch = curl_init("http://localhost:8000/mision-vision");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$data = json_decode($response, true);
test("GET /mision-vision retorna claves 'mision' y 'vision'", isset($data['mision']) && isset($data['vision']));

$ch = curl_init("http://localhost:8000/contacto");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'nombre' => 'Juan',
    'correo' => 'juan@ejemplo.com',
    'mensaje' => 'Hola mundo'
]));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($ch);
$data = json_decode($response, true);
test("POST /contacto retorna mensaje de éxito", isset($data['mensaje']));
?>
