<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Art by Picsum - Magpie Checkout</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f8fafc;
            color: #334155;
            line-height: 1.6;
            min-height: 100vh;
        }

        .page-wrapper {
            min-height: 100vh;
            width: 100%;
            max-width: 480px;
            display: flex;
            margin: 0 auto;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            overflow: hidden;
        }

        .product-image {
            width: 100%;
            height: 320px;
            object-fit: cover;
            display: block;
        }

        .product-content {
            padding: 24px;
        }

        .product-title {
            font-size: 20px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .product-artist {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 16px;
        }

        .product-price {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 24px;
        }

        .buy-button {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 16px 24px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.2s ease;
        }

        .buy-button:hover {
            background: #2563eb;
        }

        .buy-button:disabled {
            background: #94a3b8;
            cursor: not-allowed;
        }

        .store-header {
            width: 100%;
            text-align: left;
            margin-bottom: 24px;
        }

        .store-title {
            font-size: 28px;
            font-weight: 600;
            color: #1e293b;
        }

        .callout {
            background: #fef3c7;
            border: 1px solid #f59e0b;
            border-radius: 8px;
            padding: 12px 16px;
            margin-top: 24px;
            text-align: center;
            width: 100%;
        }

        .callout-text {
            font-size: 14px;
            color: #92400e;
            font-weight: 500;
        }

        .error-message {
            background: #fed7d7;
            color: #c53030;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        @media (max-width: 480px) {
            body {
                padding: 20px 16px;
            }

            .container {
                border-radius: 6px;
            }

            .product-content {
                padding: 20px;
            }

            .product-title {
                font-size: 18px;
            }

            .product-price {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="store-header">
            <h1 class="store-title">Magpie Store</h1>
        </div>

        <div class="container">
        <?php
        // Display error message if present
        if (isset($_GET['error'])) {
            echo '<div class="product-content">';
            echo '<div class="error-message">';
            switch ($_GET['error']) {
                case 'config':
                    echo 'Configuration error. Please check your Magpie API credentials.';
                    break;
                case 'session':
                    echo 'Failed to create checkout session. Please try again.';
                    break;
                default:
                    echo 'An error occurred. Please try again.';
            }
            echo '</div>';
            echo '</div>';
        }
        ?>

        <!-- Product Image from Picsum -->
        <img src="https://picsum.photos/300/300?random=<?php echo time(); ?>"
             alt="Digital Art by Picsum"
             class="product-image">

        <div class="product-content">
            <h1 class="product-title">Digital Art by Picsum</h1>
            <p class="product-artist">Artist: Picsum</p>
            <div class="product-price">PHP 1.00</div>

            <!-- Buy Now Button -->
            <form action="checkout.php" method="POST" style="margin: 0;" id="checkout-form">
                <button type="submit" class="buy-button" id="buy-button">
                    <span id="button-text">Buy Now</span>
                </button>
            </form>
        </div>
        </div>

        <div class="callout">
            <p class="callout-text">All products and prices are for testing purposes only.</p>
        </div>
    </div>

    <script>
        document.getElementById('checkout-form').addEventListener('submit', function() {
            const button = document.getElementById('buy-button');
            const buttonText = document.getElementById('button-text');

            // Disable the button
            button.disabled = true;

            // Change button text to show processing state
            buttonText.textContent = 'Processing...';
        });
    </script>
</body>
</html>