<?php defined('BASEPATH') or exit('No direct script access allowed');

class MobileSDK extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Set your server key (Note: Server key for sandbox and production mode are different)
        $this->server_key = '<YOUR SERVER SECRET KEY>';
        // Set true for production, set false for sandbox
        $is_production = false;
        $this->api_url = $is_production ? 'https://app.midtrans.com/snap/v1/transactions' : 'https://app.sandbox.midtrans.com/snap/v1/transactions';
    }
    public function index()
    {
        if (strpos($this->server_key, 'YOUR ') != false) {
            echo "<p style='background: #CC0000; padding: 10px;color:white'>";
            echo "Please set your server key in file " . __FILE__;
            echo "</p>";
        }
        $this->load->view('layouts/main', [
            'content' => 'midtrans/charge'
        ]);
    }

    public function charge()
    {
        // Check if request doesn't contains `/charge` in the url/path, display 404
        if (!strpos($_SERVER['REQUEST_URI'], '/charge')) {
            http_response_code(404);
            echo "wrong path, make sure it's `/charge`";
            exit();
        }
        // Check if method is not HTTP POST, display 404
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(404);
            echo "Page not found or wrong HTTP request method is used";
            exit();
        }

        // get the HTTP POST body of the request
        $request_body = file_get_contents('php://input');
        // set response's content type as JSON
        header('Content-Type: application/json');
        // call charge API using request body passed by mobile SDK
        $charge_result = $this->chargeAPI($this->api_url, $this->server_key, $request_body);
        // set the response http status code
        http_response_code($charge_result['http_code']);
        // then print out the response body
        echo $charge_result['body'];
    }

    /**
     * call charge API using Curl
     * @param string  $api_url
     * @param string  $server_key
     * @param string  $request_body
     */
    private function chargeAPI($api_url, $server_key, $request_body)
    {
        $ch = curl_init();
        $curl_options = [
            CURLOPT_URL             => $api_url,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_POST            => 1,
            CURLOPT_HEADER          => 0,

            // Add header to the request, including Authorization generated from server key
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization: Basic ' . base64_encode($server_key . ':')
            ],
            CURLOPT_POSTFIELDS => $request_body
        ];

        curl_setopt_array($ch, $curl_options);

        $result = [
            'body'      => curl_exec($ch),
            'http_code' => curl_getinfo($ch, CURLINFO_HTTP_CODE),
        ];
        return $result;
    }
}
