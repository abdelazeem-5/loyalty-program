<?php

require_once ROOT_PATH . "/app/models/UserModel.php";
require_once ROOT_PATH . "/app/models/OfferModel.php";
require_once ROOT_PATH . "/app/models/SubscriptionModel.php";

class UserController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function selectUserType()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $type = $_POST["user_type"] ?? "customer";

            if ($type === "merchant") {
                header("Location: /loyalty-program/public/register-merchant");
            } else {
                header("Location: /loyalty-program/public/register-customer");
            }
            exit;
        }

        require ROOT_PATH . "/app/views/users/select_type.php";
    }


    public function registerCustomer()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $name     = trim($_POST["name"]     ?? "");
            $email    = trim($_POST["email"]    ?? "");
            $password = $_POST["password"]      ?? "";

            if (!$name || !$email || !$password) {
                $error = "All fields are required.";
                require ROOT_PATH . "/app/views/users/register_customer.php";
                return;
            }

            $model = new UserModel("customer");
            $test    = $model->register($name, $email, $password);

            if ($test) {
             
                   header("Location: /loyalty-program/public/customer/dashboard");
                   

                exit;
            } else {
                $error = "Customer registration failed (email may already exist).";
                require ROOT_PATH . "/app/views/users/register_customer.php";
                return;
            }
        }

        require ROOT_PATH . "/app/views/users/register_customer.php";
    }


    public function registerMerchant()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $name     = trim($_POST["name"]     ?? "");
            $email    = trim($_POST["email"]    ?? "");
            $password = $_POST["password"]      ?? "";

            if (!$name || !$email || !$password) {
                $error = "All fields are required.";
                require ROOT_PATH . "/app/views/users/register_merchant.php";
                return;
            }

            $model = new UserModel("merchant");
            $test    = $model->register($name, $email, $password);

            if ($test) {
                header("Location: /loyalty-program/public/login");

                
                exit;
            } else {
                $error = "Merchant registration failed (email may already exist).";
                require ROOT_PATH . "/app/views/users/register_merchant.php";
                return;
            }
        }

        require ROOT_PATH . "/app/views/users/register_merchant.php";
    }


    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $email    = $_POST["email"]    ?? "";
            $password = $_POST["password"] ?? "";
            $error    = null;

            $customerlogin = new UserModel("customer");
            $customer      = $customerlogin->login($email, $password);

            if ($customer) {
                $_SESSION["user"] = [
                    "customer_id" => $customer["customer_id"],
                    "name"        => $customer["name"],
                    "email"       => $customer["email"]
                ];
                $_SESSION["role"] = "customer";

                header("Location: /loyalty-program/public/customer/dashboard");
                exit;
            }

            $merchantlogin = new UserModel("merchant");
            $merchant      = $merchantlogin->login($email, $password);

            if ($merchant) {
                $_SESSION["user"] = [
                    "merchant_id" => $merchant["merchant_id"],
                    "name"        => $merchant["name"],
                    "email"       => $merchant["email"]
                ];
                $_SESSION["role"] = "merchant";

                header("Location: /loyalty-program/public/merchant/dashboard");
                exit;
            }

            $error = "Incorrect email or password.";
            require ROOT_PATH . "/app/views/users/login.php";
            return;
        }

        require ROOT_PATH . "/app/views/users/login.php";
    }


    public function logout()
    {
        session_destroy();
        header("Location: /loyalty-program/public/");
        exit;
    }


    public function redeemOffer()
    {
        if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "customer") {
            header("Location: /loyalty-program/public/login");
            exit;
        }

        if (!isset($_GET["id"])) {
            die("Offer ID missing");
        }

        $offerId    = (int)$_GET["id"];
        $customerId = (int)$_SESSION["user"]["customer_id"];

        $offerModel = new OfferModel();
        $subModel   = new SubscriptionModel();

        $offer = $offerModel->getOfferById($offerId);

        if (!$offer) {
            die("Offer not found.");
        }

        $subscription = $subModel->getSubscriptionByCustomerId($customerId);

        $x = 0;
        if ($subscription) {
            switch ($subscription["tier"]) {
                case "silver":   $x = 10; break;
                case "gold":     $x = 20; break;
                case "platinum": $x = 30; break;
            }
        }

        $merchantDiscount = floatval($offer["discount_value"]);
        $finalDiscount    = $merchantDiscount + $x; 
        $offer["final_discount"] = $finalDiscount;  

        require ROOT_PATH . "/app/views/users/receipt.php";
    }


    public function confirmRedeem()
{
    if (!isset($_SESSION["user"]) || $_SESSION["role"] !== "customer") {
        header("Location: /loyalty-program/public/login");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST["offer_id"])) {
        die("Invalid access");
    }

    $offerId    = (int)$_POST["offer_id"];
    $customerId = (int)$_SESSION["user"]["customer_id"];

    $offerModel = new OfferModel();

    $saved = $offerModel->logRedeem($customerId, $offerId);

    if ($saved) {

        $userModel = new UserModel("customer");
        $userModel->addPoints($customerId, 10); 

        $_SESSION["redeem_success"] = "Offer saved successfully!";

    } else {
        $_SESSION["redeem_error"] = "Failed to save offer.";
    }

    header("Location: /loyalty-program/public/customer/redeem-offer?id=" . $offerId);
    exit;
}


    public function customerDashboard()
    {
        if (!isset($_SESSION["user"]) || $_SESSION["role"] !== "customer") {
            header("Location: /loyalty-program/public/login");
            exit;
        }

        require ROOT_PATH . "/app/views/users/customer_dashboard.php";
    }


    public function myredeemedOffers()
    {
        if (!isset($_SESSION["user"]) || $_SESSION["role"] !== "customer") {
            header("Location: /loyalty-program/public/login");
            exit;
        }

        $customerId = $_SESSION["user"]["customer_id"];
        $offers     = (new OfferModel())->getCustomerRedeemedOffers($customerId);

        require ROOT_PATH . "/app/views/users/redeemed_offers.php";
    }

 
    public function viewOffers()
    {
        $offerModel = new OfferModel();
        $offers     = $offerModel->getAllOffers();

        $isCustomer = isset($_SESSION["role"]) && $_SESSION["role"] === "customer";

        require ROOT_PATH . "/app/views/users/offers_list.php";
    }


    public function customerProfile()
    {
        if (!isset($_SESSION["user"]) || $_SESSION["role"] !== "customer") {
            header("Location: /loyalty-program/public/login");
            exit;
        }

        $model    = new UserModel("customer");
        $customer = $_SESSION["user"];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $name     = $_POST["name"]     ?? "";
            $email    = $_POST["email"]    ?? "";
            $password = $_POST["password"] ?? "";

            if (!$name || !$email) {
                $error = "Name and Email cannot be empty!";
                require ROOT_PATH . "/app/views/users/customer_profile.php";
                return;
            }

            $passwordToSave = $password !== "" ? $password : null;

            $updated = $model->updateCustomer(
                $customer["customer_id"],
                $name,
                $email,
                $passwordToSave
            );

            if ($updated) {
                $_SESSION["user"]["name"]  = $name;
                $_SESSION["user"]["email"] = $email;
                $success = "Profile updated successfully!";
            } else {
                $error = "Update failed!";
            }

            require ROOT_PATH . "/app/views/users/customer_profile.php";
            return;
        }

        require ROOT_PATH . "/app/views/users/customer_profile.php";
    }



 public function customerPoints()
{
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'customer') {
        header("Location: /loyalty-program/public/login");
        exit;
    }

    $customerId = $_SESSION['user']['customer_id'];

    $userModel = new UserModel("customer");
    $points = $userModel->getCustomerPoints($customerId);

    require ROOT_PATH . "/app/views/users/points.php";
}




}
