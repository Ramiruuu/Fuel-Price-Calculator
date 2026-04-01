# Fuel Price Calculator

## Overview

A simple web-based PHP application that calculates the total cost of fuel purchases with volume-based discounts. Users can input vehicle details, fuel type, and liters purchased to get an instant cost calculation.

## Features

- **Vehicle Tracking**: Record which vehicle the fuel is for
- **Fuel Type Selection**: Choose from Regular, Premium, or Diesel
- **Volume Discounts**:
  - 10-19 liters: PHP 20 discount
  - 20+ liters: PHP 50 discount
- **Real-time Calculation**: Instant cost computation with PHP backend
- **Responsive Design**: Clean, user-friendly interface

## Technologies Used

- **PHP**: Server-side logic and calculations
- **HTML**: Form structure and layout
- **CSS**: Styling and responsive design

## File Structure

```
fuelpricecalculator/
├── index.php          # Main application file with form and results display
├── functions.php      # PHP functions for calculations and pricing
├── style.css          # CSS styling for the user interface
└── README.md          # This documentation file
```

## Prerequisites

- PHP 7.0 or higher
- Web server (XAMPP, WAMP, or similar)
- Web browser

## Installation and Setup

1. Ensure your web server is running (e.g., XAMPP with Apache started)
2. Place the `fuelpricecalculator` folder in your web server's document root
   - For XAMPP: `C:\xampp\htdocs\fuelpricecalculator\`
3. Access the application via browser: `http://localhost/fuelpricecalculator/`

## Usage

1. **Open** the application in your web browser
2. **Enter Vehicle Name**: Type the name or identifier of your vehicle
3. **Enter Liters**: Input the number of liters purchased (numeric value)
4. **Select Fuel Type**:
   - Regular: PHP 92.50 per liter
   - Premium: PHP 95.50 per liter
   - Diesel: PHP 119.20 per liter
5. **Click Calculate**: The system will compute:
   - Base cost (liters × price per liter)
   - Applicable discount
   - Final total cost

## Calculation Logic

### Fuel Prices (Fixed)
- Regular: PHP 92.50/L
- Premium: PHP 95.50/L
- Diesel: PHP 119.20/L

### Discount Structure
```php
if ($liters >= 20) {
    $discount = 50;  // PHP 50 discount
} elseif ($liters >= 10) {
    $discount = 20;  // PHP 20 discount
} else {
    $discount = 0;   // No discount
}
```

### Total Calculation
```
Total Cost = (Liters × Price per Liter) - Discount
```

## Code Structure

### `index.php`
- Handles form submission and display
- Includes functions.php
- Processes POST data
- Displays results with current date/time

### `functions.php`
- `computeCost($liters, $price)`: Calculates base cost
- `getDiscount($liters)`: Determines discount amount
- `getFuelType($type)`: Returns fuel type description
- `getPrice($type)`: Returns price per liter for fuel type

### `style.css`
- Responsive container layout
- Form styling
- Result display formatting
- Color scheme and typography

## Learning Objectives

This project demonstrates:
- PHP form handling with POST method
- Function organization and reusability
- Conditional logic for business rules
- Basic HTML/CSS integration
- Date/time manipulation in PHP
- Separation of concerns (logic vs. presentation)

## Future Enhancements

- Database integration for purchase history
- User authentication
- Multiple vehicle management
- Fuel price API integration
- Receipt generation
- Mobile app version

## License

Educational project - free to use and modify for learning purposes.
