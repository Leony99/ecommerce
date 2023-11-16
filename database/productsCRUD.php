<?php

$databaseName = 'database.sqlite';

class ProductCrud
{
    private $db;

    public function __construct()
    {
        global $databaseName;
        $this->db = new SQLite3(__DIR__ . DIRECTORY_SEPARATOR . $databaseName);
    }

    public function createProduct($imgpath, $name, $price, $sales, $quantity)
    {
        $stmt = $this->db->prepare('INSERT INTO products (imgpath, name, price, sales, quantity) VALUES (:imgpath, :name, :price, :sales, :quantity)');
        $stmt->bindValue(':imgpath', $imgpath, SQLITE3_TEXT);
        $stmt->bindValue(':name', $name, SQLITE3_TEXT);
        $stmt->bindValue(':price', $price, SQLITE3_FLOAT);
        $stmt->bindValue(':sales', $sales, SQLITE3_INTEGER);
        $stmt->bindValue(':quantity', $quantity, SQLITE3_INTEGER);

        return $stmt->execute();
    }

    public function readProducts()
    {
        $result = $this->db->query('SELECT * FROM products');
        $products = [];

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $products[] = $row;
        }

        return $products;
    }

    public function updateProduct($code, $imgpath, $name, $price, $sales, $quantity)
    {
        $stmt = $this->db->prepare('UPDATE products SET imgpath = :imgpath, name = :name, price = :price, sales = :sales, quantity = :quantity WHERE code = :code');
        $stmt->bindValue(':code', $code, SQLITE3_INTEGER);
        $stmt->bindValue(':imgpath', $imgpath, SQLITE3_TEXT);
        $stmt->bindValue(':name', $name, SQLITE3_TEXT);
        $stmt->bindValue(':price', $price, SQLITE3_FLOAT);
        $stmt->bindValue(':sales', $sales, SQLITE3_INTEGER);
        $stmt->bindValue(':quantity', $quantity, SQLITE3_INTEGER);

        return $stmt->execute();
    }

    public function deleteProduct($code)
    {
        $stmt = $this->db->prepare('DELETE FROM products WHERE code = :code');
        $stmt->bindValue(':code', $code, SQLITE3_INTEGER);

        return $stmt->execute();
    }

    public function closeConnection()
    {
        $this->db->close();
    }
}

// Uso:
$crud = new ProductCrud();

// Create
// $crud->createProduct('imagepath', 'Product name', price, sales, quantity);
 $crud->createProduct('path/to/image.jpg', 'Camisa 1', 99.90, 0, 10);
 $crud->createProduct('path/to/image.jpg', 'Camisa 2', 90, 0, 10);
 $crud->createProduct('path/to/image.jpg', 'Camisa 3', 109, 0, 10);
 $crud->createProduct('path/to/image.jpg', 'Camisa 4', 109, 0, 10);
 $crud->createProduct('path/to/image.jpg', 'Camisa 5', 109, 0, 10);
 $crud->createProduct('path/to/image.jpg', 'Camisa 6', 99.90, 0, 10);
 $crud->createProduct('path/to/image.jpg', 'Camisa 7', 99.90, 0, 10);
 $crud->createProduct('path/to/image.jpg', 'Camisa 8', 109, 0, 10);
 $crud->createProduct('path/to/image.jpg', 'Camiseta 1', 80, 0, 10);
 $crud->createProduct('path/to/image.jpg', 'Camiseta 2', 80, 0, 10);
 $crud->createProduct('path/to/image.jpg', 'Camiseta 3', 69.90, 0, 10);
 $crud->createProduct('path/to/image.jpg', 'Camiseta 4', 69.90, 0, 10);
 $crud->createProduct('path/to/image.jpg', 'Moletom 1', 199.90, 0, 10);
 $crud->createProduct('path/to/image.jpg', 'Moletom 2', 199.90, 0, 10);
 $crud->createProduct('path/to/image.jpg', 'Moletom 3', 199.90, 0, 10);

// Read db
// $products = $crud->readProducts();
// var_dump($products);

// Update
// $crud->updateProduct(code, 'imagepath', 'Product name', price, sales, quantity);
// $crud->updateProduct(1, 'new/path/to/image.jpg', 'Updated Product Name', 24.99, 0, 30);

// Delete
// $crud->deleteProduct(code);
// $crud->deleteProduct(1);

?>
