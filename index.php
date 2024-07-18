<?php

use App\Controllers\Admin\AttributeController as AdminAttributeController;
use App\Controllers\Admin\ProductController as AdminProductController;
use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\OrderController as AdminOrderController;
use App\Controllers\Client\OrderController;
use App\Controllers\Client\ProductController as ClientProductController;
use App\Router;


require_once __DIR__ . "/vendor/autoload.php";

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/env.php";
$router = new Router;






/** Admin */
//product
Router::get("/product/list", [AdminProductController::class, 'list']);
Router::get("/product/add", [AdminProductController::class, "showadd"]);
Router::post("/product/add", [AdminProductController::class, "add"]);
Router::get("/product/add/attr/{id}", [AdminProductController::class, "showaddAttr"]);
Router::post("/product/update/attr", [AdminProductController::class, "updateProductAttribute"]);

Router::get("/product/detail/{id}", [AdminProductController::class, "listDetail"]);
Router::get("/product/update/{id}", [AdminProductController::class, "showUpdate"]);
Router::post("/product/update/{id}", [AdminProductController::class, "update"]);
//attribute
Router::get("/attribute/list", [AdminAttributeController::class, "listAttr"]);
Router::get("/attribute/add", [AdminAttributeController::class, 'showadd']);
Router::post("/add/attribute", [AdminAttributeController::class, 'add']);
//category
Router::get("/category/list", [CategoryController::class, 'all']);
Router::get("/category/add", [CategoryController::class, 'showAddCategory']);
Router::post("/category/add", [CategoryController::class, 'addCategory']);
Router::get("/category/update/{id}", [CategoryController::class, 'showUpdateCategory']);
Router::post("/category/update/{id}", [CategoryController::class, 'updateCategory']);
// cart
Router::get("/cart/list", [AdminOrderController::class, 'allBill']);
Router::get("/cart/show", [AdminOrderController::class, 'show']);
Router::get("/cart/show/{id}", [AdminOrderController::class, 'billId']);
Router::get("/cart/edit/{id}", [AdminOrderController::class, 'showEdit']);
Router::post("/cart/edit/{id}", [AdminOrderController::class, 'edit']);

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
Router::get("/pay/bill", [OrderController::class, 'showBill']);
Router::post("/pay/bill", [OrderController::class, 'addBill']);
// Router::post("/bill",[OrderController::class,'showBillCondition']);

$router->resolve();
