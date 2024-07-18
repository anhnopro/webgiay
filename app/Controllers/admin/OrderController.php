<?php
namespace App\Controllers\Admin;

use App\Models\OrderDetailModel;
use App\Models\OrderModel;

class OrderController extends BaseController {
    public function allBill() {
        $bill = OrderDetailModel::listBill();
        return $this->view("order/list", ['bill' => $bill]);
    }

    public function billId($id) {
        $billId = OrderDetailModel::listBillId($id);
        return $this->view("order/show", compact('billId'));
    }

    public function show() {
        return $this->view("order/show", []);
    }
    public function showEdit($id){
        $orders = OrderDetailModel::listBillId($id);
        return $this->view("order/edit", ['orders' => $orders]);
    }
    public function edit($id)
    {
        if (isset($_POST['btn_updateOrder'])) {
            $data = [
                'id_order' => $_POST['id_order'],
                'condition' => $_POST['condition'],
            ];
            OrderModel::update($data['id_order'], $data);
        }
    }
}

?>