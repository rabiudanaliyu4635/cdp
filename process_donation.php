<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$apiKey = 'MK_TEST_H1ZLBS72RX';

$client = new Client();

$amount = $_POST['amount'];

// Monnify API endpoint for creating a payment link
$endpoint = 'https://sandbox.monnify.com/api/v1/merchant/transactions/init-transaction';

// Configure request data
$data = [
    'amount' => $amount,
    'currencyCode' => 'NGN', // Adjust the currency code as needed
    'paymentReference' => uniqid('donation_'),
    'paymentMethods' => ['CARD'],
    'redirectUrl' => 'http://localhost/success.php',
    'paymentDescription' => 'Charity Donation',
];

try {
    $response = $client->post($endpoint, [
        'json' => $data,
        'headers' => [
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ],
    ]);

    $responseData = json_decode($response->getBody(), true);

    // Redirect the user to the payment link
    header("Location: " . $responseData['data']['link']);
    exit;
} catch (\Exception $e) {
    // Handle errors
    echo $e->getMessage();
}
?>
