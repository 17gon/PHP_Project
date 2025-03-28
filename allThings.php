<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <?php include_once "parts/linksCSSandJS.php"; getCSSandJS();?>
</head>
<body>
    <?php include "parts/header.php"; ?>
    <main class="grid-container">
        <article></article>
        <div class="mainContent">
            <div class="page-content">
                <div>
                    <button class="aButton" onclick="alert('Hello World')">Click on ME</button>
                </div>
                <div class="banner">
                    <h1>SOME NOT TOO LONG TEXT</h1>
                </div>
                <div class="texts">
                    <h1>SOME Lorem, but not a dolor.</h1>
                    <ul>
                        <li>
                            Lorem, but not an ipsum dolor, but not an amet consectetur radicalising elit.
                            Tenet auth, but not a corporatism enum quo, but not an official debit's consequent escape
                            null. Labor-um, but not a genius!
                        </li>
                        <li>
                            Lorem, but not an ipsum dolor, but not an amet consectetur radicalising elit.
                            Tenet auth, but not a corporas denim ques, but not an officio debits consequent scope null.
                            Labor, but not an emus!
                        </li>
                        <li>
                            Lorem, but not an ipsum dolor, but not an amet consectetur radicalising elit.
                            Tenet auteur, but not a corporas enum duos, but not an official debit's consequent safe
                            null. Labor um, but not an ecus!
                        </li>
                        <li>
                            Lorem, but not an ipsum dolor, but not an amet consectetur radicalising elit.
                            Tenet auteur, but not a colors denim quo, but not an officio debits consequent escape null.
                            Labor, but not a genius!
                        </li>
                    </ul>
                </div>
                <div>
                    <table>
                        <tr>
                            <td>
                                O
                            </td>
                            <td>
                                O
                            </td>
                            <td>
                                X
                            </td>
                        </tr>
                        <tr>
                            <td>
                                X
                            </td>
                            <td>
                                X
                            </td>
                            <td>
                                O
                            </td>
                        </tr>
                        <tr>
                            <td>
                                O
                            </td>
                            <td>
                                X
                            </td>
                            <td>
                                X
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="accordion">
                    <div class="aItem">
                        <button class="aHeader">First section</button>
                        <div class="aContent">
                            <p>Lorem, but not a dolor. Lorem, but not a dolor. Lorem, but not a dolor. Lorem, but not a dolor.</p>
                        </div>
                    </div>
                    <div class="aItem">
                        <button class="aHeader">Second section</button>
                        <div class="aContent">
                            <p>Lorem, but not a dolor. Lorem, but not a dolor. Lorem, but not a dolor. Lorem, but not a dolor. Lorem, but not a dolor. Lorem, but not a dolor. Lorem, but not a dolor.</p>
                        </div>
                    </div>
                    <div class="aItem">
                        <button class="aHeader">Third section</button>
                        <div class="aContent">
                            <p>Lorem, but not a dolor. Lorem, but not a dolor. Lorem, but not a dolor.</p>
                        </div>
                    </div>
                </div>
                <div class="slideshow">
                    <div class="slides">
                        <img src="img/math1.jpg" alt="calculator-1" style="width:100%">
                    </div>
                    
                    <div class="slides">
                        <img src="img/math2.jpg" alt="calculator-2" style="width:100%">
                    </div>
                    
                    <div class="slides">
                        <img src="img/math3.jpg" alt="calculator-3" style="width:100%">
                    </div>
                    
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            </div>
        </div>
        <article>

    </article>
    </main>
    <?php include "parts/footer.php"; ?>
</body>
</html>