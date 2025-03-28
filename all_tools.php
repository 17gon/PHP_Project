<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator - All tools</title>
    <?php include_once "parts/linksCSSandJS.php"; getCSSandJS();?>
</head>
<body>
    <?php include "parts/header.php"; ?>
    <main class="grid-container">
        <article></article>
        <div class="mainContent">
            <div class="page-content">
                <h1><a href="simple_calc.php">Simple Calculator</a></h1>
                <p>
                    A simple calculator provides basic arithmetic functionality for everyday calculations. 
                    It supports four primary operations: addition (+), subtraction (-), multiplication (*), and division (/). 
                    You can also use parentheses to modify the order of operations in more complex expressions. 
                    For example, if you need to calculate 2 + 3 * 5, you would input it as "2 + 3 * 5," 
                    and the calculator will follow the correct order, multiplying 3 and 5 first, then adding 2.
                    <u><a href="simple_calc.php">Visit here</a></u>
                </p>
                <br>
                <h1><a href="advanced_calc.php">Advanced Calculator</a></h1>
                <p>
                    An advanced calculator offers much more than basic arithmetic. 
                    It functions similarly to a scientific calculator, providing a range of powerful tools for complex mathematical operations. 
                    In addition to the basic operations (+, -, *, /), it supports advanced functions such as square roots (√), exponentiation (x^y), 
                    and trigonometric functions like sine (sin), cosine (cos), and tangent (tan). 
                    These functions are essential for those working with more detailed mathematical problems, including geometry, physics, and engineering.
                    <u><a href="advanced_calc.php">Visit here</a></u>
                </p>
            </div>
        </div>
        <article>

    </article>
    </main>
    <?php include "parts/footer.php"; ?>
</body>
</html>