<?php
declare(strict_types=1);

define("ROOT_PATH", value: dirname(__DIR__));

require ROOT_PATH . "/app/config/database.php";
require ROOT_PATH . "/app/core/Router.php";

require ROOT_PATH . "/app/controllers/UserController.php";
require ROOT_PATH . "/app/controllers/SubscriptionController.php";
require ROOT_PATH . "/app/controllers/AdminController.php";
require ROOT_PATH . "/app/controllers/MerchantController.php";

$router = new Router();

$router->add("/", function () { require ROOT_PATH . "/app/views/home.php"; });

$router->add("/select-user-type",  fn() => (new UserController())->selectUserType());
$router->add("/register-customer", fn() => (new UserController())->registerCustomer());
$router->add("/register-merchant", fn() => (new UserController())->registerMerchant());
$router->add("/login",             fn() => (new UserController())->login());
$router->add("/logout",            fn() => (new UserController())->logout());
$router->add("/register", function () { header("Location: /loyalty-program/public/select-user-type"); exit;});


$router->add("/subscription/join", fn() => (new SubscriptionController())->join());
$router->add("/subscription/points", fn() => require ROOT_PATH . "/app/views/subscriptions/points.php");
$router->add("/subscription/value", fn() => require ROOT_PATH . "/app/views/subscriptions/value.php");


$router->add("/admins/login", fn() => (new AdminController())->login());
$router->add("/admins/dashboard", fn() => (new AdminController())->dashboard());

$router->add("/admins/view_customers", fn() => (new AdminController())->viewCustomers());
$router->add("/admins/view_merchants", fn() => (new AdminController())->viewMerchants());
$router->add("/admins/view_subscriptions", fn() => (new AdminController())->viewSubscriptions());
$router->add("/admins/view_offers", fn() => (new AdminController())->getAllOffers());
$router->add("/admins/delete_customer", fn() => (new AdminController())->deleteCustomer());
$router->add("/admins/delete_merchant", fn() => (new AdminController())->deleteMerchant());
$router->add("/admins/delete-offer", fn() => (new AdminController())->deleteOffer());
$router->add("/admins/delete_subscription", fn() => (new AdminController())->deleteSubscription());



$router->add("/customer/dashboard", fn() => (new UserController())->customerDashboard());
$router->add("/customer/profile", fn() => (new UserController())->customerProfile());
$router->add("/customer/redeemed-offers", fn() => (new UserController())->myredeemedOffers());
$router->add("/customer/redeem-offer", fn() => (new UserController())->redeemOffer());
$router->add("/customer/points", fn() => (new UserController())->customerPoints());
$router->add("/customer/confirm-redeem", function () { (new UserController())->confirmRedeem();});

$router->add("/offers", fn() => (new UserController())->viewOffers());


$router->add("/merchant/dashboard", fn() => (new MerchantController())->dashboard());
$router->add("/merchant/offers", fn() => (new MerchantController())->offers());
$router->add("/merchant/offers/create", fn() => (new MerchantController())->createOffer());
$router->add("/merchant/offers/edit-list", fn() => (new MerchantController())->editOffers());
$router->add("/merchant/offers/delete-list", fn() => (new MerchantController())->deleteOffers());
$router->add("/merchant/profile", fn() => (new MerchantController())->profile());
$router->add("/merchant/my-offers", fn() => (new MerchantController())->myOffers());

$router->add("/merchant/offers/edit", function () {
    if (!isset($_GET['id'])) return print("Missing Offer ID");
    (new MerchantController())->editOfferById((int)$_GET['id']);
});

$router->add("/merchant/offers/delete", function () {
    if (!isset($_GET['id'])) return print("Missing Offer ID");
    (new MerchantController())->deleteOfferById((int)$_GET['id']);
});



$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$basePath = "/loyalty-program/public";

if (stripos($path, $basePath) === 0) {
    $path = substr($path, strlen($basePath));
}
$path = rtrim($path, "/");
if ($path === "") 
{
    $path = "/";
}

$router->dispatch($path);