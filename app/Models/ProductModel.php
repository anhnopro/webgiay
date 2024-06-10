<?php

namespace App\Models;

use PDO;

class ProductModel extends BaseModel
{
    protected $tableName = "products";
    public static function  getProductList()
    {
        $model = new static;
        $sql = "
            SELECT 
                p.id_product, 
                p.name AS product_name, 
                p.describe, 
                p.status, 
                c.name_cate AS category_name, 
                SUM(dp.qty) AS total_qty, 
                GROUP_CONCAT(DISTINCT pi.path SEPARATOR ', ') AS image_paths
            FROM 
                products p
            LEFT JOIN 
                category c ON p.id_category = c.id_category
            LEFT JOIN 
                detailprd dp ON p.id_product = dp.id_product
            LEFT JOIN 
                productimage pi ON p.id_product = pi.id_product
            WHERE 
                p.status = 1
            GROUP BY 
                p.id_product, 
                p.name, 
                p.describe, 
                p.status, 
                c.name_cate
            LIMIT 0, 8
        ";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getProductsWithDetails()
    {
        $model = new static;
        $sql = "
            SELECT 
                p.id_product, 
                p.name AS product_name, 
                p.describe, 
                p.status, 
                c.name_cate AS category_name, 
                dp.color, 
                dp.size, 
                dp.price, 
                dp.qty, 
                pi.path
            FROM 
                products p
            JOIN 
                category c ON p.id_category = c.id_category
            LEFT JOIN 
                detailprd dp ON p.id_product = dp.id_product
            LEFT JOIN 
                productimage pi ON p.id_product = pi.id_product
            where 1 
        ";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insertProductWithDetails($productData, $detailData, $imageData) {
        try {
            $this->conn->beginTransaction();
    
            $this->tableName = "products";
            $productId = $this->add($productData);
    
    
            $detailData['id_product'] = $productId; 
            $this->tableName = "detailprd";
            $this->add($detailData);
 
            $imageData['id_product'] = $productId; 
            $this->tableName = "productimage";
            $this->add($imageData);
    
            $this->conn->commit();
        } catch (\Exception $e) {
            $this->conn->rollBack();
            echo "Lỗi khi chèn dữ liệu liên quan tới sản phẩm: " . $e->getMessage();
        }
    }
    
    
}
