<?php defined('BASEPATH') or exit('No direct script access allowed');

class CoreApi extends CI_Controller
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
        if (strpos(\Midtrans\Config::$serverKey, 'YOUR ') != false) {
            echo "<p style='background: #CC0000; padding: 10px;color:white'>";
            echo "Please set your server key in file " . __FILE__;
            echo "</p>";
        }
        $this->load->view('layouts/main', [
            'orderID' => rand(),
            'content' => 'midtrans/coreApi'
        ]);
    }

    public function checkout()
    {
        $this->load->view('layouts/main', [
            'transaction'   => $this->input->post(),
            'content'       => 'midtrans/coreApiCheckout'
        ]);
    }
}
