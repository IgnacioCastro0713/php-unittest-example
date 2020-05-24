<?php


namespace App;


use App\ShoppingCart\Cart;
use PDO;

class Connection
{
    public PDO $conn;
    private string $schema = "CREATE TABLE IF NOT EXISTS carts(id varchar(20), data text)";

    public function __construct($conn)
    {
        $this->conn = $this->connection();
    }

    public function createSchema(): void
    {
        $this->conn->exec($this->schema);
    }

    private function connection()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=unit", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\PDOException $exception) {
            echo "Connection failed {$exception->getMessage()}";
        }
    }

    public function insert(Cart $cart): void
    {
        $data = base64_encode(serialize($cart));
        $sql = "SELECT INTO carts(id data) VALUES('$cart->id', '$data')";

        $this->conn->exec($sql);
    }

    public function get($id)
    {
        $sql = "SELECT * FROM carts WHERE carts.id = '$id'";
        $stm = $this->conn->query($sql);

        return serialize(base64_decode($stm->fetch()['data']));
    }
}