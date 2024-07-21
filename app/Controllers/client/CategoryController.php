<?php
namespace App\Controllers\Client;
class CategoryController extends BaseController{
    public function lisPrdCate(){
        $this->view('product/listPrdCate',[]);
    }
}
?>