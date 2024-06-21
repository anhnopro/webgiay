<?php
namespace App\Controllers\Client;

class BaseController {
    public function view($path,$data) {
        extract($data);
        include_once "./app/Views/client/header.php";
        include_once "./app/Views/client/$path.php";
        include_once "./app/Views/client/footer.php";
    }
}
?>
