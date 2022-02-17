<?php defined('BASEPATH') or exit('No direct script access allowed');

class Midtrans extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = '<YOUR SERVER SECRET KEY>';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }
    public function index()
    {
        $this->load->view('layouts/main', [
            'orderID' => rand(),
            'content' => 'midtrans/transaction'
        ]);
    }

    public function snap()
    {
        echo "Checkout Page";
    }
}
