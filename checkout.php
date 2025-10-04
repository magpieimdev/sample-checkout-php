<?php
/**
 * Checkout handler for Magpie payment integration
 * Creates a checkout session and redirects to payment URL
 */

// Start session for error handling
session_start();

// Load Composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
try {
    $dotenv->load();
} catch (Exception $e) {
    // Redirect with configuration error if .env file is missing
    header('Location: index.php?error=config');
    exit;
}

// Validate required environment variables
if (empty($_ENV['MAGPIE_SECRET_KEY'])) {
    header('Location: index.php?error=config');
    exit;
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

try {
    // Initialize Magpie client
    $magpie = new \Magpie\Magpie($_ENV['MAGPIE_SECRET_KEY']);

    // Create checkout session data
    $sessionData = [
        'currency' => 'PHP',
        'mode' => 'payment',
        'payment_method_types' => ['card', 'qrph', 'bpi', 'maya'],
        'line_items' => [
            [
                'amount' => 100, // PHP 1.00 in centavos
                'name' => 'Digital Art by Picsum',
                'description' => 'A beautiful piece of digital art from Picsum.',
                'quantity' => 1,
                'image' => 'https://picsum.photos/300/300?random=' . time()
            ]
        ],
        'success_url' => (isset($_SERVER['HTTPS']) ? 'https' : 'http') .
                        '://' . $_SERVER['HTTP_HOST'] .
                        rtrim(dirname($_SERVER['REQUEST_URI']), '/') . '/success.php',
        'cancel_url' => (isset($_SERVER['HTTPS']) ? 'https' : 'http') .
                       '://' . $_SERVER['HTTP_HOST'] .
                       rtrim(dirname($_SERVER['REQUEST_URI']), '/') . '/index.php',
        'metadata' => [
            'order_id' => 'ORDER_' . time()
        ]
    ];

    // Create the checkout session
    $session = $magpie->checkout->sessions->create($sessionData);

    // Check if session was created successfully
    if (isset($session['payment_url'])) {
        // Redirect to Magpie checkout page
        header('Location: ' . $session['payment_url']);
        exit;
    } else {
        // Session creation failed
        error_log('Magpie session creation failed: ' . json_encode($session));
        header('Location: index.php?error=session');
        exit;
    }

} catch (\Magpie\Exceptions\ValidationException $e) {
    // Validation error - log detailed error information
    error_log('Magpie Validation Error: ' . $e->getMessage());
    error_log('Validation Errors: ' . json_encode($e->errors));
    header('Location: index.php?error=session');
    exit;
} catch (\Magpie\Exceptions\MagpieException $e) {
    // Magpie API error
    error_log('Magpie API Error: ' . $e->getMessage());
    header('Location: index.php?error=session');
    exit;
} catch (Exception $e) {
    // General error
    error_log('Checkout Error: ' . $e->getMessage());
    header('Location: index.php?error=session');
    exit;
}
?>