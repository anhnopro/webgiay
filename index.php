<?php

use App\Controllers\Admin\AttributeController as AdminAttributeController ;
use App\Controllers\Admin\ProductController as AdminProductController;
use App\Controllers\Client\ProductController;
use App\Router;
  require_once __DIR__ ."/vendor/autoload.php";

  require_once __DIR__ ."/config.php";
  require_once __DIR__ ."/env.php";
  $router=new Router;
  Router::get("/home",[ProductController::class,"home"]);



  ////admin
  

  //product
  Router::get("/list/product",[AdminProductController::class,'list']);
  Router::get("/add/product",[AdminProductController::class,"showadd"]);
  Router::post("/add/product",[AdminProductController::class,"add"]);


  //attribute
  Router::get("/add/attribute",[AdminAttributeController::class,'showadd']);
  Router::post("/add/attribute",[AdminAttributeController::class,'add']);

  $router->resolve();
?>