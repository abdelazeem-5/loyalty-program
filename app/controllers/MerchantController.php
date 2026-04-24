<?php

require_once ROOT_PATH . "/app/models/MerchantModel.php";

class MerchantController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function dashboard()
    {
        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'merchant') {
            echo "Not authorized!";
            return;
        }

        require ROOT_PATH . "/app/views/merchants/dashboard.php";
    }


    public function offers()
    {
        require ROOT_PATH . "/app/views/merchants/create_offer.php";
    }

    public function createOffer()
    {
        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'merchant') {
            echo "Not authorized!";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            require_once ROOT_PATH . "/app/models/OfferModel.php";
            $model = new OfferModel();

            $title       = $_POST['title'];
            $description = $_POST['description'];
            $discount    = $_POST['discount_value'];

            $success = $model->createOffer($_SESSION['user']['merchant_id'], $title, $description, $discount);

            if ($success) {
                header("Location: /loyalty-program/public/merchant/offers");
                exit;
            }

            echo "Failed to add offer!";
            return;
        }

        require ROOT_PATH . "/app/views/merchants/create_offer.php";
    }

    public function editOffers()
    {
        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'merchant') {
            echo "Not authorized!";
            return;
        }

        require_once ROOT_PATH . "/app/models/OfferModel.php";
        $model = new OfferModel();

        $offers = $model->getOffersByMerchant($_SESSION['user']['merchant_id']);

        require ROOT_PATH . "/app/views/merchants/edit_offers.php";
    }

    public function editOfferById($id)
    {
        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'merchant') {
            echo "Not authorized!";
            return;
        }

        require_once ROOT_PATH . "/app/models/OfferModel.php";
        $model = new OfferModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $title       = $_POST['title'];
            $description = $_POST['description'];
            $discount    = $_POST['discount_value'];

            $success = $model->updateOffer($id, $title, $description, $discount);

            if ($success) {
                header("Location: /loyalty-program/public/merchant/offers/edit-list");
                exit;
            }

            echo "Failed to update offer!";
            return;
        }

        $offer = $model->getOfferById($id);

        require ROOT_PATH . "/app/views/merchants/edit_offers.php";
    }

    public function deleteOffers()
    {
        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'merchant') {
            echo "Not authorized!";
            return;
        }

        require_once ROOT_PATH . "/app/models/OfferModel.php";
        $model = new OfferModel();

        $offers = $model->getOffersByMerchant($_SESSION['user']['merchant_id']);

        require ROOT_PATH . "/app/views/merchants/delete_offers.php";
    }
    
    public function deleteOfferById($id)
    {
        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'merchant') {
            echo "Not authorized!";
            return;
        }

        require_once ROOT_PATH . "/app/models/OfferModel.php";
        $model = new OfferModel();

        $success = $model->deleteOffer($id);

        echo $success ? "Offer Deleted Successfully!" : "Failed to delete offer!";
    }



public function profile()
{
    if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'merchant') {
        header("Location: /loyalty-program/public/login");
        exit;
    }

    $merchant = $_SESSION['user'];

    require_once ROOT_PATH . "/app/models/UserModel.php";
    $model = new UserModel("merchant");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name     = $_POST['name'];
        $email    = $_POST['email'];
        $password = $_POST['password'] ?? null;

        $model->updateMerchant(
            $merchant['merchant_id'],
            $name,
            $email,
            $password
        );

        $_SESSION['user']['name']  = $name;
        $_SESSION['user']['email'] = $email;

        header("Location: /loyalty-program/public/merchant/profile");
        exit;
    }

    require ROOT_PATH . "/app/views/merchants/profile.php";
}


public function myOffers()
{
    if (!isset($_SESSION['user']) || ($_SESSION['role'] ?? null) !== 'merchant') {
        header("Location: /loyalty-program/public/login");
        exit;
    }

    require_once ROOT_PATH . "/app/models/OfferModel.php";
    $model = new OfferModel();

    $merchantId = (int)$_SESSION['user']['merchant_id'];

    $offers = $model->getOffersByMerchant($merchantId);

    require ROOT_PATH . "/app/views/merchants/my_offers.php";
}

}
