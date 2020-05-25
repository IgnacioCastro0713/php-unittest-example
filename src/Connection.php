<?php


namespace App;


use App\ShoppingCart\Cart;
use PDO;

class Connection
{
    public PDO $conn;
    private string $schema = "CREATE TABLE IF NOT EXISTS carts(id varchar(20), data text)";

    public function __construct()
    {
        $this->conn = $this->connection();
    }

    public function createSchema(): void
    {
        $this->conn->exec($this->schema);
    }

    public function dropTable()
    {
        $this->conn->exec("DROP TABLE carts");
    }

    /**
     * @return PDO|string
     */
    private function connection()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=unit", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\PDOException $exception) {
            return "Connection failed {$exception->getMessage()}";
        }
    }

    public function insert(Cart $cart): void
    {
        $data = base64_encode(serialize($cart));
        $sql = "INSERT INTO carts(id, data) VALUES('$cart->id', '$data')";
        $this->conn->exec($sql);
    }

    public function get($id)
    {
        $sql = "SELECT * FROM carts WHERE carts.id = '$id'";
        $stm = $this->conn->query($sql);

        return unserialize(base64_decode($stm->fetch()['data']));
    }
}