<?php
require_once __DIR__ . "/../config/database.php";

class SubscriptionModel
{
    private $connection;
    private $table = "subscriptions";

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->connect();
    }


    public function createSubscription($customer_id, $tier = 'silver', $program_type = 'points_based')
    {
        $deleteQuery = "DELETE FROM {$this->table} WHERE customer_id = :customer_id";
        $deleteStmt = $this->connection->prepare($deleteQuery);
        $deleteStmt->execute([":customer_id" => $customer_id]);

        $query = "INSERT INTO {$this->table} 
                (customer_id, tier, program_type, status)
                VALUES (:customer_id, :tier, :program_type, 'active')";

        $stmt = $this->connection->prepare($query);

        return $stmt->execute([
            ":customer_id" => $customer_id,
            ":tier" => $tier,
            ":program_type" => $program_type
        ]);
    }


    public function getSubscriptionsByCustomer(int $customer_id): array
    {
        $query = "SELECT * FROM {$this->table} WHERE customer_id = :customer_id";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([":customer_id" => $customer_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function cancelSubscription(int $subscription_id): bool
    {
        $query = "UPDATE {$this->table} 
                  SET status = 'cancelled' 
                  WHERE subscription_id = :id";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute([":id" => $subscription_id]);
    }

    public function getSubscriptionById(int $subscription_id): array|false
    {
        $query = "SELECT * FROM {$this->table} 
                  WHERE subscription_id = :id";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([":id" => $subscription_id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



public function getSubscriptionByCustomerId($customerId)
{
    $query = "SELECT * FROM subscriptions 
              WHERE customer_id = :customer_id 
              LIMIT 1";

    $stmt = $this->connection->prepare($query);
    $stmt->execute([
        ":customer_id" => $customerId
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function deleteSubscription($id)
{
    $stmt = $this->connection->prepare("
        DELETE FROM subscriptions 
        WHERE subscription_id = :id
    ");

    return $stmt->execute([":id" => $id]);
}

public function deleteByCustomer($customerId)
{
    $stmt = $this->connection->prepare(
        "DELETE FROM subscriptions WHERE customer_id = ?"
    );
    return $stmt->execute([$customerId]);
}


}