<?php
namespace App\Models;
use PDO;

class OrderDetailModel extends BaseModel {
    protected $tableName = 'order_details';
    
    public static function listBill() {
        $model = new static;
        $sql = "
            SELECT 
                o.id_order,
                o.phone_number,
                o.address,
                o.name,
                o.email,
                o.date,
                GROUP_CONCAT(
                    CONCAT(
                        '{\"product_name\":\"', p.name, '\",',
                        '\"price\":', p.price, ',',
                        '\"image\":\"', p.image, '\",',
                        '\"qty\":', od.qty, ',',
                        '\"total\":', od.total, '}'
                    ) SEPARATOR ','
                ) as product_details,
                SUM(od.total) as total_payment
            FROM orders o
            JOIN order_details od ON o.id_order = od.id_order
            JOIN product p ON p.id_product = od.id_product
            GROUP BY o.id_order, o.phone_number, o.address, o.name, o.email, o.date;
        ";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>