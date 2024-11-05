<?php
$host = 'my_postgres';
$port = '5432';
$dbname = 'mydatabase';
$user = 'myuser';
$password = 'mysecretpassword';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $createTableQuery = "
        CREATE TABLE IF NOT EXISTS products (
            id SERIAL PRIMARY KEY,
            name VARCHAR(100),
            price DECIMAL(10, 2)
        );
    ";
    $pdo->exec($createTableQuery);

    $checkQuery = "SELECT COUNT(*) FROM products WHERE name = 'Sample Product'";
    $stmt = $pdo->query($checkQuery);
    $count = $stmt->fetchColumn();

    if ($count == 0) {
        $insertQuery = "INSERT INTO products (name, price) VALUES ('Sample Product', 19.99)";
        $pdo->exec($insertQuery);
        echo "Inserted data into 'products' table.<br>";
    } else {
        echo "Data already exists in the 'products' table.<br>";
    }

    $stmt = $pdo->query("SELECT * FROM products");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo 'ID: ' . $row['id'] . ' | Name: ' . $row['name'] . ' | Price: $' . $row['price'] . '<br>';
    }

    echo "Connected to the PostgreSQL database and displayed product data successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>