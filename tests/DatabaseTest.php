<?php
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    private $pdo;

    protected function setUp(): void
    {
        $host = 'host.docker.internal';
        $port = '5432';
        $dbname = 'mydatabase';
        $user = 'myuser';
        $password = 'mysecretpassword';

        try {
            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
            $this->pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            $this->fail("Connection to PostgreSQL failed: " . $e->getMessage());
        }
    }

    public function testConnectionIsSuccessful()
    {
        $this->assertNotNull($this->pdo, "Failed to establish a database connection.");
    }

    public function testProductsTableExists()
    {
        $result = $this->pdo->query("SELECT to_regclass('public.products')");
        $tableExists = $result->fetchColumn();
        
        $this->assertEquals('products', $tableExists, "The 'products' table does not exist in the database.");
    }
}