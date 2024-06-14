<?php
namespace App\Controllers\Client;

class BaseController {
    public function view($path, $data) {
        extract($data);
        include_once "app/Views/client/$path.php";
    }
}
?>
