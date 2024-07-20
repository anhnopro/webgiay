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

// Admin routes
Router::prefix('admin', function() {
    Router::prefix('product', function() {
        Router::get('list', [AdminProductController::class, 'list']);
        Router::get('add', [AdminProductController::class, 'showadd']);
        Router::post('add', [AdminProductController::class, 'add']);
        Router::get('add/attr/{id}', [AdminProductController::class, 'showaddAttr']);
        Router::post('update/attr', [AdminProductController::class, 'updateProductAttribute']);
        Router::get('detail/{id}', [AdminProductController::class, 'listDetail']);
        Router::get('update/{id}', [AdminProductController::class, 'showUpdate']);
        Router::post('update/{id}', [AdminProductController::class, 'update']);
    });

    Router::prefix('attribute', function() {
        Router::get('list', [AdminAttributeController::class, 'listAttr']);
        Router::get('add', [AdminAttributeController::class, 'showadd']);
        Router::post('add', [AdminAttributeController::class, 'add']);
    });

    Router::prefix('category', function() {
        Router::get('list', [CategoryController::class, 'all']);
        Router::get('add', [CategoryController::class, 'showAddCategory']);
        Router::post('add', [CategoryController::class, 'addCategory']);
        Router::get('update/{id}', [CategoryController::class, 'showUpdateCategory']);
        Router::post('update/{id}', [CategoryController::class, 'updateCategory']);
    });

    Router::prefix('order', function() {
        Router::get('list', [AdminOrderController::class, 'allBill']);
        Router::get('show', [AdminOrderController::class, 'show']);
        Router::get('show/{id}', [AdminOrderController::class, 'billId']);
        Router::get('edit/{id}', [AdminOrderController::class, 'showEdit']);
        Router::post('edit/{id}', [AdminOrderController::class, 'edit']);
    });
});

// Client routes
Router::get('/home', [ClientProductController::class, 'home']);
Router::get('/product/detail/{id}', [ClientProductController::class, 'detailPrd']);
Router::prefix('order', function() {
    Router::get('addCart', [OrderController::class, 'showCart']);
    Router::post('addCart', [OrderController::class, 'addCart']);
    Router::get('deleteCart', [OrderController::class, 'deleteCart']);
    Router::get('qtycart', [OrderController::class, 'updateCartQuantity']);
    Router::get('deleteProductCart/{id_product}/{color}/{size}', [OrderController::class, 'deleteProductCart']);
});

Router::get('/payment', [OrderController::class, 'payment']);
Router::get('/pay/bill', [OrderController::class, 'showBill']);
Router::post('/pay/bill', [OrderController::class, 'addBill']);

$router->resolve();
?>
