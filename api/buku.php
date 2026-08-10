<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once __DIR__ . '/../app/controller/bukucontroller.php';

$controller = new BukuController();
$requestMethod = $_SERVER['REQUEST_METHOD'];

switch ($requestMethod) {
    case 'GET':
        echo $controller->getAllBuku();
        break;
    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        echo $controller->storeBuku($data);
        break;

    case 'DELETE':
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        if ($id > 0) {
            echo $controller->deleteBuku($id);
        } else {
            http_response_code(400);
            echo json_encode(array("status" => "warning", "message" => "ID buku tidak valid."));
        }
        break;
    default:
        http_response_code(405);
        echo json_encode(array("message" => "Metode HTTP tidak diizinkan."));
        break;
}

?>
