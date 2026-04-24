<?php

require_once ROOT_PATH . "/app/models/SubscriptionModel.php";

class SubscriptionController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }


    public function join()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'customer') {

            header("Location: /loyalty-program/public/login");
            exit;
        }

        $customer_id = $_SESSION['user']['customer_id'] ?? null;

        if ($customer_id === null) {
            echo "Customer ID not found in session.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $tier         = $_POST['tier']         ?? 'silver';
            $program_type = $_POST['program_type'] ?? 'points_based';

            $model = new SubscriptionModel();
            $success = $model->createSubscription($customer_id, $tier, $program_type);

            if ($success) {

                if ($program_type === 'points_based') {
                    header("Location: /loyalty-program/public/subscription/points");
                    exit;
                }

                if ($program_type === 'value_based') {
                    header("Location: /loyalty-program/public/subscription/value");
                    exit;
                }

                header("Location: /loyalty-program/public/");
                exit;

            } else {
                echo "Subscription Failed";
            }

        } 
        else 
        {
            require ROOT_PATH . "/app/views/subscriptions/join.php";
        }
    }


    public function mySubscriptions($customer_id)
    {
        $model = new SubscriptionModel();
        $subs = $model->getSubscriptionsByCustomer((int)$customer_id);

        echo "<pre>";
        print_r($subs);
        echo "</pre>";
    }


    public function upgrade($id)
    {
        $model = new SubscriptionModel();
        $success = $model->updateSubscription((int)$id, 'gold', null);

        echo $success ? "Tier Upgraded to Gold" : "Upgrade Failed";
    }


    public function joinSubscription()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (!isset($_SESSION['user'])) {
            die("You must be logged in as a customer.");
        }

        $customerId = $_SESSION['user']['customer_id'];
        $tier = $_POST['tier'];
        $programType = $_POST['program_type'];

        $model = new SubscriptionModel();

        $existing = $model->getSubscriptionByCustomerId($customerId);

        if ($existing) {
            $model->updateSubscription($existing["subscription_id"], $tier, $programType);

            header("Location: /loyalty-program/public/subscription/updated");
            exit;
        }

        $model->createSubscription($customerId, $tier, $programType);

        header("Location: /loyalty-program/public/subscription/created");
        exit;
    }

    require ROOT_PATH . "/app/views/subscriptions/join.php";
}

}
