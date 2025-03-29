<!DOCTYPE html>
<html lang="en">
<?php include_once "parts/getHead.php"; getHead();?>
<body>
    <?php include "parts/header.php"; ?>
    <main class="grid-container">
        <article></article>
        <div class="mainContent">
            <div class="page-content">
                <div class="form">
                    <form id="contactForm" action="thanks.php" method="POST">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required />
                        
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required />
                        
                        <label for="message">Message:</label>
                        <textarea id="message" name="message"></textarea>
                        
                        <div class="consent">
                            <input type="checkbox" id="consent" name="consent" required />
                            <label for="consent">I consent to the processing of personal data</label>
                        </div>
                  
                        <button type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
        <article></article>
    </main>
    <?php include "parts/footer.php"; ?>
</body>
</html>