<?php
require_once ROOT_PATH . "/app/config/database.php";

class UserModel
{
    private $connection;
    private $table;

    public function __construct(string $userType)
    {
        $db = new Database();
        $this->connection = $db->connect();


        if ($userType === 'customer') 
        {
            $this->table = 'customers';
        }

        elseif ($userType === 'merchant') 
        {
            $this->table = 'merchants';
        }

        elseif ($userType === 'admin') 
        {
            $this->table = 'admins';
        } 
        else 
        {
            die("Invalid user type");
        }

    }

    public function register(string $name, string $email, string $password): bool
    {
        try {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO {$this->table} (name, email, password_hash)
                      VALUES (:name, :email, :password_hash)";
            
            $stmt = $this->connection->prepare($query);

            return $stmt->execute([
                ":name"          => htmlspecialchars($name),
                ":email"         => htmlspecialchars($email),
                ":password_hash" => $hash,
            ]);
        } 
        catch (PDOException $e) {
            return false;
        }
    }

    public function login(string $email, string $password)
    {
        try {
            $query = "SELECT * FROM {$this->table} WHERE email = :email LIMIT 1";
            $stmt  = $this->connection->prepare($query);
            $stmt->execute([":email" => $email]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password_hash'])) {
                return $user;
            }

            return false;
        }
        catch (PDOException $e) {
            return false;
        }
    }
    
public function updateCustomer(int $customerId, string $name, string $email, ?string $password = null): bool
{
    if ($this->table !== 'customers') {
        throw new Exception("updateCustomer can only be used with customers table.");
    }

    $fields = [
        "name = :name",
        "email = :email"
    ];

    $params = [
        ":id"   => $customerId,
        ":name" => htmlspecialchars($name),
        ":email"=> htmlspecialchars($email)
    ];

    if ($password !== null && $password !== '') {
        $fields[]              = "password_hash = :password_hash";
        $params[":password_hash"] = password_hash($password, PASSWORD_DEFAULT);
    }

    $sql = "UPDATE {$this->table} SET " . implode(", ", $fields) . " WHERE customer_id = :id";

    $stmt = $this->connection->prepare($sql);
    return $stmt->execute($params);
}


public function updateMerchant(int $merchantId, string $name, string $email, ?string $password = null): bool
{
    if ($this->table !== 'merchants') {
        throw new Exception("updateMerchant can only be used with merchants table.");
    }

    $fields = [
        "name = :name",
        "email = :email"
    ];

    $params = [
        ":id"   => $merchantId,
        ":name" => htmlspecialchars($name),
        ":email"=> htmlspecialchars($email)
    ];

    if ($password !== null && $password !== '') {
        $fields[]                 = "password_hash = :password_hash";
        $params[":password_hash"] = password_hash($password, PASSWORD_DEFAULT);
    }

    $sql = "UPDATE {$this->table} SET " . implode(", ", $fields) . " WHERE merchant_id = :id";

    $stmt = $this->connection->prepare($sql);
    return $stmt->execute($params);
}

public function deleteCustomer($id)
{
    $stmt = $this->connection->prepare("DELETE FROM customers WHERE customer_id = ?");
    return $stmt->execute([$id]);
}


public function deleteMerchant($id)
{
    $stmt = $this->connection->prepare("DELETE FROM merchants WHERE merchant_id = ?");
    return $stmt->execute([$id]);
}


public function getCustomerPoints(int $customerId): int
{
    $stmt = $this->connection->prepare(
        "SELECT points FROM customers WHERE customer_id = ?"
    );
    $stmt->execute([$customerId]);
    $row = $stmt->fetch();

    return $row ? (int)$row['points'] : 0;
}



public function addPoints(int $customerId, int $points): bool
{
    if ($this->table !== 'customers') {
        throw new Exception("addPoints can only be used with customers table.");
    }

    $stmt = $this->connection->prepare(
        "UPDATE customers 
         SET points = points + :points 
         WHERE customer_id = :id"
    );

    return $stmt->execute([
        ":points" => $points,
        ":id"     => $customerId
    ]);
}

}
