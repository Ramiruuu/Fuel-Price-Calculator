<?php
// ============================================
// FUNCTIONS FILE
// Contains all reusable functions
// ============================================

// FUNCTION to calculate fuel cost
function computeCost($liters, $price) {
    return $liters * $price;
}

// FUNCTION to get discount based on liters
function getDiscount($liters) {
    if ($liters >= 20) {
        return 50;
    } elseif ($liters >= 10) {
        return 20;
    } else {
        return 0;
    }
}

// FUNCTION to get fuel type name (FIXED pricing)
function getFuelType($type) {
    if ($type == "regular") {
        return "Regular (PHP 92.50/L)";
    } elseif ($type == "premium") {
        return "Premium (PHP 95.50/L)";
    } else {
        return "Diesel (PHP 119.20/L)";
    }
}

// FUNCTION to get price based on fuel type (FIXED pricing)
function getPrice($type) {
    if ($type == "regular") {
        return 92.50;
    } elseif ($type == "premium") {
        return 95.50;
    } else {
        return 119.20;
    }
}
?>