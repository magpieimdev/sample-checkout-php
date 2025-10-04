# Sample Magpie PHP Checkout Application

A simple PHP application demonstrating Magpie Checkout integration for digital art sales using Magpie PHP SDK.

## Features

- Clean, responsive product display page
- Integration with Picsum Photos for random product images
- Magpie payment processing with checkout session creation
- Error handling and user-friendly error messages
- Success page after payment completion
- Mobile-responsive design

## Requirements

- PHP 7.4 or higher
- Composer for dependency management
- Web server (Apache, Nginx, or PHP built-in server)
- Magpie account with API credentials

## Installation

1. **Clone or download this repository**
   ```bash
   git clone <repository-url>
   cd sample-magpie-php
   ```

2. **Install dependencies using Composer**
   ```bash
   composer install
   ```

3. **Configure environment variables**
   ```bash
   cp .env.example .env
   ```

   Edit the `.env` file and add your Magpie API credentials:
   ```env
   MAGPIE_SECRET_KEY=your_magpie_secret_key_here
   APP_ENV=development
   APP_DEBUG=true
   ```

## Getting Magpie API Credentials

1. **Sign up for a Magpie account**
   - Visit [https://dashboard.magpie.im](https://dashboard.magpie.im)
   - Create a new account or log in to your existing account

2. **Create a new application**
   - Navigate to your Magpie dashboard
   - Go to "Developers", under "API Keys" section

3. **Get your API credentials**
   - Copy your **Secret Key** (used for server-side operations)
   - **Important**: Keep your secret key secure and never expose it in client-side code

## Running the Application

### Option 1: PHP Built-in Server (Development)
```bash
php -S localhost:8000
```
Then open your browser and visit: `http://localhost:8000`

### Option 2: Apache/Nginx
- Configure your web server to serve the application directory
- Ensure the web server has read permissions for all files
- Make sure the `.env` file is not publicly accessible

## File Structure

```
sample-magpie-php/
├── composer.json          # Composer configuration
├── .env.example           # Environment variables template
├── .env                   # Your environment variables (not in git)
├── index.php              # Main product page
├── checkout.php           # Checkout session handler
├── success.php            # Payment success page
├── vendor/                # Composer dependencies
└── README.md              # This file
```

## How It Works

1. **Product Display** (`index.php`)
   - Shows a digital art product with random image from Picsum
   - Displays product name, artist, and price (PHP 1.00)
   - Contains a "Buy Now" button that submits to checkout.php

2. **Checkout Processing** (`checkout.php`)
   - Validates environment configuration
   - Creates a Magpie Checkout Session with product details
   - Redirects user to Magpie's secure Checkout page
   - Handles errors and redirects back with error messages

3. **Success Page** (`success.php`)
   - Displays confirmation after successful payment
   - Provides link back to the main store

## Error Handling

The application includes comprehensive error handling:

- **Configuration errors**: Missing or invalid API credentials
- **Session creation errors**: Failed to create Magpie Checkout Session
- **Network errors**: API communication issues

Errors are logged to PHP error log and user-friendly messages are displayed.

## Security Considerations

- Environment variables are used for sensitive API credentials
- `.env` file should not be committed to version control
- Server-side validation of all payment data
- Proper error handling without exposing sensitive information
- HTTPS should be used in production

## Customization

### Changing the Product
Edit the product details in `index.php`:
- Update the product name, artist, and price
- Modify the image source or use a static image
- Adjust the styling as needed

### Styling
The CSS is embedded in the HTML files for simplicity. You can:
- Extract CSS to separate files
- Add CSS frameworks like Bootstrap or Tailwind
- Customize colors, fonts, and layout

### Adding Features
Consider adding:
- Multiple products with a database
- User accounts and order history
- Email notifications
- Inventory management
- Discount codes

## Troubleshooting

### Common Issues

1. **"Configuration error" message**
   - Check that `.env` file exists and has correct credentials
   - Verify Magpie API keys are valid
   - Ensure environment variables are loading correctly

2. **"Failed to create checkout session" message**
   - Verify your Magpie account is active
   - Check API credential permissions
   - Review server error logs for detailed error messages

3. **Composer dependencies not loading**
   - Run `composer install` to install dependencies
   - Check that Composer is installed correctly
   - Verify the custom repository URL is accessible

### Debug Mode

Enable debug mode in `.env`:
```env
APP_DEBUG=true
```

This will provide more detailed error messages during development.

## Support

For issues with:
- **Magpie API**: Contact Magpie support or check their documentation
- **This application**: Check the error logs and verify your configuration
- **PHP/Composer**: Refer to official PHP and Composer documentation

## License

This sample application is provided as-is for demonstration purposes.