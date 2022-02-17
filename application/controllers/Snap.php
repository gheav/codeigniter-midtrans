<?php defined('BASEPATH') or exit('No direct script access allowed');

class Snap extends CI_Controller
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
            'content' => 'midtrans/snap'
        ]);
    }

    public function checkout()
    {
        $transaction = [
            //Required
            'transaction_details' => [
                'order_id'      => $this->input->post('orderID'),
                'gross_amount'  => $this->input->post('amount') // no decimal allowed for creditcard
            ],
            //Optional
            'customer_details' => [
                'first_name'    => $this->input->post('firstName'),
                'last_name'     => $this->input->post('lastName'),
                'email'         => $this->input->post('email'),
                'phone'         => $this->input->post('phone'),
            ],
            //Optional
            'item_details' => [
                [
                    'id'        => rand(1, 10),
                    'price'     => $this->input->post('amount'),
                    'quantity'  => 1,
                    'name'      => $this->input->post('description'),
                ]
            ]
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($transaction);
        echo $snapToken;
    }
}
