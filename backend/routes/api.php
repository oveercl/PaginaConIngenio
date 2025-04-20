<?php
$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case '/servicios':
        if ($method === 'GET') {
            require_once __DIR__ . '/../controllers/ServiciosController.php';
            echo (new ServiciosController())->index();
        }
        break;

    case '/mision-vision':
        if ($method === 'GET') {
            require_once __DIR__ . '/../controllers/MisionVisionController.php';
            echo (new MisionVisionController())->mostrar();
        }
        break;

    case '/contacto':
        if ($method === 'POST') {
            require_once __DIR__ . '/../controllers/ContactoController.php';
            echo (new ContactoController())->enviar();
        }
        break;

    default:
        http_response_code(404);
        echo json_encode(['error' => 'Ruta no encontrada']);
        break;
}
?>
