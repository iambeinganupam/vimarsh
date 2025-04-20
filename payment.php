<?php
session_start();
if(!isset($_SESSION['price'])){
    ?>
    <script>
        alert("Please select package first...");
        location.replace("pricing.php");
    </script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPI Payment</title>
    <style>
        :root {
            --primary: #3a86ff;
            --primary-dark: #2667cc;
            --secondary: #ff006e;
            --success: #14cca3;
            --dark: #151c2b;
            --light: #f5f7fa;
            --border-radius: 12px;
            --shadow-color: rgba(58, 134, 255, 0.2);
            --box-shadow: 0 8px 30px var(--shadow-color);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(58, 134, 255, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 75% 75%, rgba(255, 0, 110, 0.05) 0%, transparent 40%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            width: 100%;
            max-width: 500px;
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .header h1 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .header p {
            opacity: 0.9;
            font-size: 1.1rem;
        }

        .content {
            padding: 2rem;
        }

        .plan-details {
            background: var(--light);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .plan-name {
            font-size: 1.2rem;
            color: var(--dark);
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .price-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }

        .price-details:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .price-label {
            color: #666;
        }

        .price-value {
            font-weight: 600;
            color: var(--dark);
        }

        .qr-section {
            text-align: center;
            margin: 2rem 0;
        }

        .qr-container {
            background: white;
            padding: 1rem;
            border-radius: var(--border-radius);
            display: inline-block;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            position: relative;
            margin-bottom: 1.5rem;
        }

        .qr-code {
            width: 200px;
            height: 200px;
            background: #fff;
            padding: 1rem;
        }

        .qr-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(255,255,255,0.95);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            color: var(--primary);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: none;
        }

        .qr-container:hover .qr-overlay {
            display: block;
        }

        .upi-details {
            text-align: center;
            margin-bottom: 2rem;
        }

        .upi-id {
            background: var(--light);
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .upi-id:hover {
            background: #e8ecf3;
        }

        .copy-icon {
            width: 18px;
            height: 18px;
            fill: var(--primary);
        }

        .payment-apps {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        .payment-app {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            color: var(--dark);
            transition: var(--transition);
        }

        .payment-app:hover {
            transform: translateY(-3px);
        }

        .app-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .app-name {
            font-size: 0.9rem;
            color: #666;
        }

        .verification-section {
            margin-top: 2rem;
            text-align: center;
        }

        .verify-button {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            width: 100%;
        }

        .verify-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px var(--shadow-color);
        }

        .secure-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1rem;
            color: var(--success);
            font-size: 0.9rem;
        }

        .secure-badge svg {
            width: 16px;
            height: 16px;
            fill: currentColor;
        }

        @media (max-width: 480px) {
            .container {
                margin: 1rem;
                border-radius: var(--border-radius);
            }

            .qr-code {
                width: 180px;
                height: 180px;
            }

            .payment-apps {
                flex-wrap: wrap;
                gap: 1.5rem;
            }
        }

        /* Toast notification */
        .toast {
            position: fixed;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            background: var(--dark);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            font-size: 0.9rem;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        .toast.show {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Complete Your Payment</h1>
            <p>Scan QR code using any UPI app</p>
        </div>

        <div class="content">
            <div class="plan-details">
                <div class="plan-name">Professional Plan</div>
                <div class="price-details">
                    <span class="price-label">Amount</span>
                    <span class="price-value">₹<?php echo $_SESSION['price']; ?></span>
                </div>
                <div class="price-details">
                    <span class="price-label">GST (18%)</span>
                    <span class="price-value">₹360.00</span>
                </div>
                <div class="price-details">
                    <span class="price-label">Total Amount</span>
                    <span class="price-value">₹<?php echo 360 + $_SESSION['price']; ?></span>
                </div>
            </div>

            <div class="qr-section">
                <div class="qr-container">
                    <img src="qr.jpg" 
                         alt="UPI QR Code" 
                         class="qr-code" 
                         id="qrCode">
                    <div class="qr-overlay">Click to enlarge</div>
                </div>

                <div class="upi-details">
                    <div class="upi-id" id="upiId" onclick="copyUpiId()">
                        <span>sumitsill2605@okicici</span>
                        <svg class="copy-icon" viewBox="0 0 24 24">
                            <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                        </svg>
                    </div>
                    <small>Tap to copy UPI ID</small>
                </div>

                <div class="payment-apps">
                    <a href="#" class="payment-app" onclick="openUpiApp('gpay')">
                        <img src="Google Pay.jpg" alt="Google Pay" class="app-icon">
                        <span class="app-name">Google Pay</span>
                    </a>
                </div>
            </div>

            <div class="verification-section">
                <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                    <input type="text" name="utr">
                    <button class="verify-button" name="submit">
                        Submit UTR ID
                    </button>
                </form>
                <?php
                if(isset($_POST['submit'])){
                    
                }
                ?>
                
                <div class="secure-badge">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                    </svg>
                    Secure UPI Payment
                </div>
            </div>
        </div>
    </div>

    <div class="toast" id="toast">UPI ID copied to clipboard!</div>

    <script>
        // Function to copy UPI ID
        function copyUpiId() {
            const upiId = 'your@upi';
            navigator.clipboard.writeText(upiId).then(() => {
                showToast('UPI ID copied to clipboard!');
            });
        }

        // Function to show toast notification
        function showToast(message) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        // Function to open UPI apps
        function openUpiApp(app) {
            const amount = '1178.82';
            const upiId = 'your@upi';
            const name = 'Your Business Name';
            const note = 'Payment for Professional Plan';
            
            let url;
            switch(app) {
                case 'gpay':
                    url = `tez://upi/pay?pa=${upiId}&pn=${name}&am=${amount}&cu=INR&tn=${note}`;
                    break;
                case 'phonepe':
                    url = `phonepe://pay?pa=${upiId}&pn=${name}&am=${amount}&cu=INR&tn=${note}`;
                    break;
                case 'paytm':
                    url = `paytmmp://pay?pa=${upiId}&pn=${name}&am=${amount}&cu=INR&tn=${note}`;
                    break;
            }
            
            window.location.href = url;
            setTimeout(() => {
                showToast('Opening ' + app + '...');
            }, 100);
        }

        // Function to verify payment
        // function verifyPayment() {
        //     const button = document.querySelector('.verify-button');
        //     button.textContent = 'Verifying...';
        //     button.disabled = true;
            
            // Simulate payment verification
            // setTimeout(() => {
            //     button.textContent = 'Payment Verified ✓';
            //     button.style.background = 'var(--success)';
            //     showToast('Payment verified successfully!');
                
                // Redirect to success page after 2 seconds
                // setTimeout(() => {
                    // Replace with your success page URL
                    // window.location.href = '/success.html';
                    // alert('Payment successful! Redirecting to success page...');
                // }, 2000);
            // }, 3000);
        // }

        // Handle QR code click to show full size
        document.getElementById('qrCode').addEventListener('click', function() {
            window.open(this.src, '_blank');
        });
    </script>
</body>
</html>

