<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Portal</title>
    <link rel="stylesheet" href="css/donation.css">
</head>
<body>
    <header>
        <h1>Donation Portal</h1>
    </header>
    <main>
        <section class="donation-box">
            <h2>Make a Donation</h2>
            <form id="donation-form">
                <label for="donor-name">Name:</label>
                <input type="text" id="donor-name" name="donor-name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" min="1" required>
                
                <label for="campaign">Select Campaign:</label>
                <select id="campaign" name="campaign">
                    <option value="">Select</option>
                    <option value="general-fund">General Fund</option>
                    <option value="scholarships">Scholarships</option>
                    <option value="infrastructure">Infrastructure Development</option>
                </select>
                
                <label for="payment-method">Select Payment Method:</label>
                <select id="payment-method" name="payment-method" required>
                    <option value="">Select</option>
                    <option value="credit-card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="bank-transfer">Bank Transfer</option>
                    <option value="upi">UPI</option>
                </select>
                
                <!-- Payment Details sections remain unchanged -->

                <label for="message">Message (Optional):</label>
                <textarea id="message" name="message"></textarea>
                
                <button type="submit">Donate Now</button>
            </form>
        </section>
    </main>
    <script>
        document.getElementById('donation-form').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission behavior
            alert("Your donation form has been submitted!"); // Show alert
        });
    </script>
</body>
</html>
