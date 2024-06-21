<?php

use App\Controllers\Admin\AttributeController as AdminAttributeController ;
use App\Controllers\Admin\ProductController as AdminProductController;
use App\Controllers\Client\ProductController as ClientProductController;
use App\Router;
  require_once __DIR__ ."/vendor/autoload.php";

  require_once __DIR__ ."/config.php";
  require_once __DIR__ ."/env.php";
  $router=new Router;
  Router::get("/home",[ClientProductController::class,"home"]);





  ////admin
  

  //product
  Router::get("/list/product",[AdminProductController::class,'list']);
  Router::get("/add/product",[AdminProductController::class,"showadd"]);
  Router::get("/add/product/attr/{id}",[AdminProductController::class,"showaddAttr"]);
  Router::post("/product/update/attr",[AdminProductController::class,"updateProductAttribute"]);
  Router::post("/add/product",[AdminProductController::class,"add"]);
  Router::get("/detail/product/{id}", [AdminProductController::class, "listDetail"]);
  Router::get("/update/product/{id}", [AdminProductController::class, "showUpdate"]);
  Router::post("/update/product/{id}",[AdminProductController::class,"update"]);
  //attribute
  Router::get("/add/attribute",[AdminAttributeController::class,'showadd']);
  Router::post("/add/attribute",[AdminAttributeController::class,'add']);

  $router->resolve();
?>