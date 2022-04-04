<?php
define('ROOT', dirname(__FILE__));
require_once 'vendor/autoload.php';

$shoppingCard = new ShoppingCardController;
$shoppingCard->actionShoppingCard();
?>