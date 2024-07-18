<?php

namespace App\Models;

use PDO;

class OrderDetailModel extends BaseModel
{
    protected $tableName = 'order_details';
    protected $primary = 'id_order';
    public static function listBill()
    {
        $model = new static;
        $sql = "
            SELECT 
                o.id_order,
                o.phone_number,
                o.address,
                o.name,
                o.email,
                o.date,
                o.condition,
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
    public static function listBillId($id)
    {
        $model = new static;
        $sql = "
            SELECT 
                o.id_order,
                o.phone_number,
                o.address,
                o.name,
                o.email,
                o.date,
                o.condition,
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
            WHERE o.id_order = :id
            GROUP BY o.id_order, o.phone_number, o.address, o.name, o.email, o.date;
        ";
        $stmt = $model->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function update($id, $data)
    {
        $model = new static;
        $primary = $model->primary; // Ensure this matches your table's primary key
        $model->sqlBuilder = "UPDATE $model->tableName SET ";
        foreach ($data as $column => $value) {
            $model->sqlBuilder .= "`{$column}`=:$column, ";
        }
        // Remove the trailing ", "
        $model->sqlBuilder = rtrim($model->sqlBuilder, ", ");
        // Add the condition to the SQL statement
        $model->sqlBuilder .= " WHERE `$primary`=:$primary";

        $stmt = $model->conn->prepare($model->sqlBuilder);
        // Add $id to $data
        $data[$primary] = $id;
        return $stmt->execute($data);
    }
}
