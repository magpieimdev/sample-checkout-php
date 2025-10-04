<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - Magpie Checkout</title>
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
            padding: 40px 20px 100px;
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

        .container {
            width: 100%;
            margin: 0 auto;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            overflow: hidden;
            padding: 32px 24px;
            text-align: center;
        }

        .success-icon {
            width: 64px;
            height: 64px;
            background: #10b981;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 32px;
            font-weight: bold;
        }

        .success-title {
            font-size: 20px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .success-message {
            color: #64748b;
            margin-bottom: 24px;
            font-size: 14px;
            line-height: 1.5;
            padding-left: 16px;
            padding-right: 16px;
        }

        .back-button {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.2s ease;
        }

        .back-button:hover {
            background: #2563eb;
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

        @media (max-width: 480px) {
            .page-wrapper {
                padding: 20px 16px;
            }

            .store-title {
                font-size: 24px;
            }

            .container {
                padding: 24px 20px;
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
            <div class="success-icon">✓</div>
            <h2 class="success-title">Payment Successful!</h2>
            <p class="success-message">
                Thank you for your purchase! Your digital art will be delivered to your email shortly, or maybe not because this is just a test.
            </p>
            <a href="index.php" class="back-button">Back to Store</a>
        </div>

        <div class="callout">
            <p class="callout-text">All products and prices are for testing purposes only.</p>
        </div>
    </div>
</body>
</html>