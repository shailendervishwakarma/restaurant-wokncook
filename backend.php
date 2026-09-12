<?php
// backend.php

if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
    $rating = isset($_REQUEST['rating']) ? htmlspecialchars($_REQUEST['rating']) : 'Not provided';
    $feedback = isset($_REQUEST['Feedback']) ? htmlspecialchars($_REQUEST['Feedback']) : 'No message';

    $orderType = isset($_REQUEST['orderType']) ? htmlspecialchars($_REQUEST['orderType']) : '';
    $customerName = isset($_REQUEST['customerName']) ? htmlspecialchars($_REQUEST['customerName']) : '';
    $customerPhone = isset($_REQUEST['customerPhone']) ? htmlspecialchars($_REQUEST['customerPhone']) : '';
    $customerEmail = isset($_REQUEST['customerEmail']) ? htmlspecialchars($_REQUEST['customerEmail']) : '';
    $address = isset($_REQUEST['address']) ? htmlspecialchars($_REQUEST['address']) : '';
    $orderNotes = isset($_REQUEST['orderNotes']) ? htmlspecialchars($_REQUEST['orderNotes']) : '';
    $orderSummary = isset($_REQUEST['orderSummary']) ? htmlspecialchars($_REQUEST['orderSummary']) : 'No items selected';
    $totalBill = isset($_REQUEST['totalBill']) ? htmlspecialchars($_REQUEST['totalBill']) : '0';

    $isOrder = !empty($orderType) || !empty($customerName) || !empty($customerPhone);

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $isOrder ? 'Order Confirmation' : 'Feedback Received'; ?> - WOK'n'COOK</title>
        <link rel="stylesheet" href="king.css">
    </head>
    <body>
        <div class="container">
            <header class="hero">
                <h1><?php echo $isOrder ? 'Order Request Received!' : 'Thank You!'; ?></h1>
                <p class="hero-text">
                    <?php echo $isOrder ? 'Your order request has been received. Our team will contact you soon.' : 'Your feedback has been successfully submitted to WOK\'n\'COOK.'; ?>
                </p>
            </header>
            <main>
                <section class="menu-section">
                    <?php if ($isOrder) { ?>
                        <h2>Order Details</h2>
                        <p><strong>Order Type:</strong> <?php echo $orderType; ?></p>
                        <p><strong>Customer Name:</strong> <?php echo $customerName; ?></p>
                        <p><strong>Phone:</strong> <?php echo $customerPhone; ?></p>
                        <p><strong>Email:</strong> <?php echo $customerEmail ?: 'Not provided'; ?></p>
                        <p><strong>Address:</strong> <?php echo $address ?: 'Not required'; ?></p>
                        <p><strong>Items:</strong> <?php echo nl2br($orderSummary); ?></p>
                        <p><strong>Total Bill:</strong> ₹<?php echo $totalBill; ?></p>
                        <p><strong>Notes:</strong> <?php echo $orderNotes ?: 'No special notes'; ?></p>
                    <?php } else { ?>
                        <h2>Submission Details</h2>
                        <p><strong>Rating:</strong> <?php echo $rating; ?> / 5</p>
                        <p><strong>Feedback:</strong> <?php echo nl2br($feedback); ?></p>
                    <?php } ?>
                    <br>
                    <a href="index.html" style="font-weight: bold;">← Back to Home Page</a>
                </section>
            </main>
        </div>
    </body>
    </html>
    <?php
} else {
    header("Location: index.html");
    exit();
}
?>