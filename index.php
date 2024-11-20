<?php
// Function for addition
function add($num1, $num2) {
    return $num1 + $num2;
}

// Function for subtraction
function subtract($num1, $num2) {
    return $num1 - $num2;
}

// Function for multiplication
function multiply($num1, $num2) {
    return $num1 * $num2;
}

// Function for division with error handling
function divide($num1, $num2) {
    if ($num2 == 0) {
        return "Error: Division by zero is not allowed.";
    } else {
        return $num1 / $num2;
    }
}

// Handling the form submission
if (isset($_GET['cal'])) {
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $operator = $_GET['operator'];

    // Validate if inputs are numeric
    if (is_numeric($num1) && is_numeric($num2)) {
        $num1 = floatval($num1);
        $num2 = floatval($num2);

        // Perform the operation based on the chosen operator
        switch ($operator) {
            case '+':
                $result = add($num1, $num2);
                break;
            case '-':
                $result = subtract($num1, $num2);
                break;
            case '*':
                $result = multiply($num1, $num2);
                break;
            case '/':
                $result = divide($num1, $num2);
                break;
            default:
                $result = "Error: Invalid operator.";
                break;
        }
    } else {
        $result = "Error: Please enter valid numbers.";
    }
}
?>

<!-- Basic HTML with linked CSS -->
<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- External CSS link -->
</head>
<body>
    <div class="container">
        <h2>Calculator</h2>
        <form method="GET">
            <label for="num1">Number 1:</label>
            <input type="text" name="num1" required>
            <br><br>
            <label for="num2">Number 2:</label>
            <input type="text" name="num2" required>
            <br><br>
            <label for="operator">Operator:</label>
            <select name="operator" required>
                <option value="+">Addition (+)</option>
                <option value="-">Subtraction (-)</option>
                <option value="*">Multiplication (*)</option>
                <option value="/">Division (/)</option>
            </select>
            <br><br>
            <input type="submit" name="cal" value="Calculate">
        </form>

        <!-- Display the result -->
        <?php
        if (isset($result)) {
            echo "<h3>Result: $result</h3>";
        }
        ?>
    </div>
</body>
</html>
