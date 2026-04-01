<?php

date_default_timezone_set("Asia/Manila");

// Include functions file
include_once "functions.php";

// Get user input
$vehicle = "";
$liters = "";
$fuelType = "";
$submitted = false;
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle = $_POST["vehicle"];
    $liters = $_POST["liters"];
    $fuelType = $_POST["fuel_type"];
    $submitted = true;
    
    // Calculate
    $price = getPrice($fuelType);
    $totalCost = computeCost($liters, $price);
    $discount = getDiscount($liters);
    $finalCost = $totalCost - $discount;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Fuel Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Daily Fuel Calculator</h1>
        <p class="date">Date: <?php echo date("Y-m-d h:i A"); ?></p>
    </div>

    <!-- INPUT FORM -->
    <div class="form-section">
        <h3>Enter Fuel Purchase Details</h3>
        <form method="post" action="">
            <div class="form-group">
                <label>Vehicle Name:</label>
                <input type="text" name="vehicle" required>
            </div>
            <div class="form-group">
                <label>Liters:</label>
                <input type="number" name="liters" step="0.1" required>
            </div>
            <div class="form-group">
                <label>Fuel Type:</label>
                <select name="fuel_type">
                    <option value="regular">Regular (PHP 92.50/L)</option>
                    <option value="premium">Premium (PHP 95.50/L)</option>
                    <option value="diesel">Diesel (PHP 119.20/L)</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Calculate" class="btn">
            </div>
        </form>
    </div>

    <?php
    // DISPLAY RESULT
    if ($submitted) {
        $price = getPrice($fuelType);
        $totalCost = computeCost($liters, $price);
        $discount = getDiscount($liters);
        $finalCost = $totalCost - $discount;
        $fuelName = getFuelType($fuelType);
        
        echo "<div class='result-section'>";
        echo "<h3>Fuel Purchase Receipt</h3>";
        echo "<div class='receipt'>";
        echo "<p><strong>Vehicle:</strong> " . $vehicle . "</p>";
        echo "<p><strong>Fuel Type:</strong> " . $fuelName . "</p>";
        echo "<p><strong>Liters:</strong> " . $liters . "</p>";
        echo "<p><strong>Price per liter:</strong> PHP " . number_format($price, 2) . "</p>";
        echo "<p><strong>Total cost:</strong> PHP " . number_format($totalCost, 2) . "</p>";
        
        if ($discount > 0) {
            echo "<p class='discount'><strong>Discount:</strong> PHP " . number_format($discount, 2) . "</p>";
            echo "<p class='final'><strong>Final cost:</strong> PHP " . number_format($finalCost, 2) . "</p>";
        } else {
            echo "<p class='final'><strong>Final cost:</strong> PHP " . number_format($finalCost, 2) . "</p>";
        }
        
        echo "</div>";
        
        // Feedback message
        echo "<div class='feedback'>";
        if ($liters >= 30) {
            echo "<p>Note: Large purchase! You saved PHP " . number_format($discount, 2) . " today.</p>";
        } elseif ($liters >= 15) {
            echo "<p>Note: Good purchase. You got PHP " . number_format($discount, 2) . " discount.</p>";
        } else {
            echo "<p>Note: Purchase more than 10 liters to get a discount.</p>";
        }
        echo "</div>";
        echo "</div>";
    }
    ?>

    <!-- FOR LOOP showing price list -->
    <div class="info-section">
        <div class="price-list">
            <h3>Fuel Price List</h3>
            <?php
            $fuelTypes = array("Regular", "Premium", "Diesel");
            $prices = array(92.50, 95.50, 119.20);
            
            for ($i = 0; $i < count($fuelTypes); $i++) {
                echo "<p>" . $fuelTypes[$i] . ": PHP " . number_format($prices[$i], 2) . " per liter</p>";
            }
            ?>
        </div>

        <!-- WHILE LOOP showing discount tiers -->
        <div class="discount-tiers">
            <h3>Discount Tiers</h3>
            <?php
            $tiers = array("0-9 liters: No discount", "10-19 liters: PHP 20 discount", "20+ liters: PHP 50 discount");
            $j = 0;
            while ($j < count($tiers)) {
                echo "<p>" . $tiers[$j] . "</p>";
                $j++;
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>