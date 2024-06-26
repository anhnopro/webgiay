<?php

use App\Controllers\Admin\AttributeController as AdminAttributeController;
use App\Controllers\Admin\ProductController as AdminProductController;
use App\Controllers\Admin\CategoryController;
use App\Controllers\Client\OrderController;
use App\Controllers\Client\ProductController as ClientProductController;
use App\Router;


require_once __DIR__ . "/vendor/autoload.php";

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/env.php";
$router = new Router;






/** Admin */
//product
Router::get("/list/product", [AdminProductController::class, 'list']);
Router::get("/add/product", [AdminProductController::class, "showadd"]);
Router::get("/add/product/attr/{id}", [AdminProductController::class, "showaddAttr"]);
Router::post("/product/update/attr", [AdminProductController::class, "updateProductAttribute"]);
Router::post("/add/product", [AdminProductController::class, "add"]);
Router::get("/detail/product/{id}", [AdminProductController::class, "listDetail"]);
Router::get("/update/product/{id}", [AdminProductController::class, "showUpdate"]);
Router::post("/update/product/{id}", [AdminProductController::class, "update"]);
//attribute
Router::get("/attribute/list", [AdminAttributeController::class, "listAttr"]);
Router::get("/add/attribute", [AdminAttributeController::class, 'showadd']);
Router::post("/add/attribute", [AdminAttributeController::class, 'add']);
//category
Router::get("/category/list", [CategoryController::class, 'all']);
Router::get("/category/add", [CategoryController::class, 'showAddCategory']);
Router::post("/category/add", [CategoryController::class, 'addCategory']);
Router::get("/category/update/{id}", [CategoryController::class, 'showUpdateCategory']);
Router::post("/category/update/{id}", [CategoryController::class, 'updateCategory']);


/** Client */
//product
Router::get("/home", [ClientProductController::class, "home"]);
Router::get("/product/detail/{id}", [ClientProductController::class, "detailPrd"]);
//cart
Router::get("/order/addCart", [OrderController::class, "showCart"]);
Router::post("/order/addCart", [OrderController::class, "addCart"]);
Router::get("/order/deleteCart", [OrderController::class, "deleteCart"]);
Router::get("/order/qtycart", [OrderController::class, 'updateCartQuantity']);
Router::get("/order/deleteProductCart/{id_product}/{color}/{size}", [OrderController::class, "deleteProductCart"]);

Router::get("/payment", [OrderController::class, "payment"]);
Router::get("/pay/bill", [OrderController::class,'showBill']);
Router::post("/pay/bill", [OrderController::class,'addBill']);
// Router::post("/bill",[OrderController::class,'showBillCondition']);

$router->resolve();
