<?php
session_start();
if (!isset($_SESSION['email'])) {
?>
    <script>
        location.replace("index.php");
    </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <title>Pricing Plans</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f5f7fa;
            padding: 20px;
        }

        /* Enhanced Navbar Styles */
        :root {
            --primary: #3a86ff;
            --primary-dark: #2667cc;
            --header-bg: #ffffff;
            --text-color: #333333;
        }

        header {
            background-color: var(--header-bg);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
            padding: 0.5rem 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.3rem 8%;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
            letter-spacing: 1px;
            position: relative;
            transition: all 0.3s ease;
        }

        .logo:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            transition: width 0.3s ease;
        }

        .logo:hover:after {
            width: 100%;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2.5rem;
        }

        .nav-links a {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 1.05rem;
            position: relative;
            padding: 0.5rem 0;
            transition: color 0.3s;
        }

        .nav-links a:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            transition: width 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-links a:hover:after {
            width: 100%;
        }

        .cta-button {
            background-color: #3a86ff;
            color: white;
            border: none;
            padding: 0.8rem 1.8rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
            box-shadow: 0 4px 8px rgba(58, 134, 255, 0.2);
        }

        .cta-button:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(58, 134, 255, 0.3);
        }

        /* Theme Toggle Switch - Enhanced */
        .theme-toggle {
            display: flex;
            align-items: center;
            margin-left: 1.5rem;
        }

        .theme-toggle-label {
            position: relative;
            display: inline-block;
            width: 56px;
            height: 28px;
            cursor: pointer;
        }

        .theme-toggle-input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .theme-toggle-slider {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #e0e0e0;
            border-radius: 28px;
            transition: 0.4s;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .theme-toggle-slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            border-radius: 50%;
            transition: 0.4s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .theme-toggle-input:checked+.theme-toggle-slider {
            background-color: var(--primary);
        }

        .theme-toggle-input:checked+.theme-toggle-slider:before {
            transform: translateX(28px);
        }

        .theme-icon {
            margin-right: 8px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        /* Add some spacing to the body to account for fixed navbar */
        body {
            padding-top: 80px;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .navbar {
                padding: 1rem 5%;
            }

            .nav-links {
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .nav-links a {
                font-size: 0.95rem;
            }

            .logo {
                font-size: 1.8rem;
            }

            .cta-button {
                padding: 0.7rem 1.5rem;
                font-size: 0.85rem;
            }
        }

        .container {
            width: 100%;
            max-width: 1200px;
        }

        .billing-toggle {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }

        .toggle-label {
            margin-right: 10px;
            font-weight: 600;
            color: #333;
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }

        .save-text {
            margin-left: 10px;
            font-weight: 600;
            color: #333;
        }

        .pricing-plans {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .pricing-card {
            flex: 1;
            min-width: 300px;
            background-color: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .pricing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .popular-tag {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #222;
            color: white;
            padding: 8px 15px;
            border-radius: 0 12px 0 12px;
            font-weight: 600;
            font-size: 14px;
        }

        .popular-tag svg {
            margin-right: 5px;
            vertical-align: middle;
        }

        .plan-name {
            font-size: 24px;
            font-weight: 600;
            color: #555;
            margin-bottom: 20px;
            text-align: center;
        }

        .price-container {
            text-align: center;
            margin-bottom: 25px;
        }

        .price {
            font-size: 60px;
            font-weight: 700;
            color: #222;
            line-height: 1;
        }

        .price-period {
            font-size: 16px;
            color: #777;
            margin-left: 5px;
        }

        .billing-cycle {
            text-align: center;
            color: #777;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .feature-list {
            list-style: none;
            margin-bottom: 30px;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            color: #333;
        }

        .check-icon {
            color: #222;
            margin-right: 10px;
            min-width: 20px;
        }

        .cta-button {
            display: block;
            background-color: var(--primary);
            padding: 15px;
            background-color: #222;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .starter-button {
            background-color: white;
            border: 2px solid #222;
            color: #222;
        }

        .starter-button:hover {
            background-color: #f5f5f5;
        }

        .professional-button:hover {
            background-color: #000;
        }

        .enterprise-button {
            background-color: white;
            border: 2px solid #222;
            color: #222;
        }

        .enterprise-button:hover {
            background-color: #f5f5f5;
        }

        .plan-description {
            text-align: center;
            color: #777;
            font-size: 14px;
            margin-top: 20px;
        }

        .professional-card {
            transform: scale(1.05);
            z-index: 1;
            border: 2px solid #f0f0f0;
        }

        @media (max-width: 992px) {
            .pricing-plans {
                flex-direction: column;
            }

            .pricing-card {
                width: 100%;
                margin-bottom: 20px;
            }

            .professional-card {
                transform: none;
                order: -1;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <a href="#" class="logo">VIMARSH</a>
            <div class="nav-links">
                <a href="index.php#about">About</a>
                <a href="index.php#demo">Demo</a>
                <a href="index.php#team">Team</a>
                <a href="#">Pricing</a>
                <a href="index.php#contact">Contact</a>

                <!-- Theme Toggle Switch -->
                <div class="theme-toggle">
                    <span class="theme-icon" id="theme-icon">☀️</span>
                    <label class="theme-toggle-label">
                        <input type="checkbox" class="theme-toggle-input" id="theme-toggle">
                        <span class="theme-toggle-slider"></span>
                    </label>
                </div>
            </div>
            <a class='cta-button' href='backend/logout.php'><i class='fa fa-user'></i></a>
        </nav>
    </header>

    <div class="container">
        <!-- <div class="billing-toggle">
            <span class="toggle-label">Annual billing (Save 20%)</span>
            <label class="toggle-switch">
                <input type="checkbox" id="billingToggle">
                <span class="slider"></span>
            </label>
        </div> -->

        <div class="pricing-plans">
            <div class="pricing-card">
                <h2 class="plan-name">STARTER</h2>
                <div class="price-container">
                    <span class="price" id="starterPrice">₹0</span>
                    <!-- <span class="price-period">/ per month</span> -->
                </div>
                <!-- <div class="billing-cycle">billed monthly</div> -->
                <ul class="feature-list">
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor" />
                        </svg>
                        <span>Get upto 50 chatbot conversations (25-25 each)
                        </span>
                    </li>
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor" />
                        </svg>
                        <span>Get upto 10 composition(s) re-structuring
                        </span>
                    </li>
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor" />
                        </svg>
                        <span>Upto 6 months validity</span>
                    </li>
                    <!-- <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor"/>
                        </svg>
                        <span>Limited API access</span>
                    </li>
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor"/>
                        </svg>
                        <span>Community support</span>
                    </li> -->
                </ul>
                <a href="https://devsumit2.app.n8n.cloud/webhook/96e6892d-4122-403b-abc4-5e8165c4f3b5/chat" class="cta-button starter-button">Start Free Trial</a>
                <p class="plan-description">Perfect for individuals and small projects</p>
            </div>

            <div class="pricing-card professional-card">
                <div class="popular-tag">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" fill="currentColor" />
                    </svg>
                    Popular
                </div>
                <h2 class="plan-name">PROFESSIONAL</h2>
                <div class="price-container">
                    <span class="price" id="professionalPrice">₹2,000</span>
                    <!-- <span class="price-period">/ per month</span> -->
                </div>
                <!-- <div class="billing-cycle">billed monthly</div> -->
                <ul class="feature-list">
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor" />
                        </svg>
                        <span>Get upto 100 chatbot conversations (no limitation)
                        </span>
                    </li>
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor" />
                        </svg>
                        <span>Get upto 25 composition(s) re-structuring
                        </span>
                    </li>
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor" />
                        </svg>
                        <span>Upto 12 months validity</span>
                    </li>
                    <!-- <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor"/>
                        </svg>
                        <span>Full API access</span>
                    </li>
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor"/>
                        </svg>
                        <span>Priority support</span>
                    </li>
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor"/>
                        </svg>
                        <span>Team collaboration</span>
                    </li>
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor"/>
                        </svg>
                        <span>Custom integrations</span>
                    </li> -->
                </ul>
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="cta-button professional-button">
                    <button type="submit" name="get-started" style="font-size: 16px; font-weight: 600; background: transparent; border: none; color: #fff;">Get Started</button>
                </form>
                <?php
                if (isset($_POST['get-started'])) {
                    $_SESSION['price'] = 2000.00;
                    ?>
                    <script>
                        location.replace("payment.php");
                    </script>
                    <?php

                }
                ?>
                <p class="plan-description">Ideal for growing teams and businesses</p>
            </div>

            <div class="pricing-card">
                <h2 class="plan-name">ENTERPRISE</h2>
                <div class="price-container">
                    <!-- <span class="price" id="enterprisePrice">Customisable price</span> -->
                    <!-- <span class="price-period">/ per month</span> -->
                </div>
                <!-- <div class="billing-cycle">billed monthly</div> -->
                <ul class="feature-list">
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor" />
                        </svg>
                        <span>Upto 60 months validity
                        </span>
                    </li>
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor" />
                        </svg>
                        <span>Unlimited* chatbot conversations
                        </span>
                    </li>
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor" />
                        </svg>
                        <span>Unlimited* composition(s) re-structuring
                        </span>
                    </li>
                    <!-- <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor"/>
                        </svg>
                        <span>1-hour support response time</span>
                    </li>
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor"/>
                        </svg>
                        <span>SSO Authentication</span>
                    </li>
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor"/>
                        </svg>
                        <span>Advanced security</span>
                    </li>
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor"/>
                        </svg>
                        <span>Custom contracts</span>
                    </li>
                    <li class="feature-item">
                        <svg class="check-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor"/>
                        </svg>
                        <span>SLA agreement</span>
                    </li> -->
                </ul>
                <a href="#" class="cta-button enterprise-button">Contact Sales</a>
                <p class="plan-description">For large organizations with specific needs</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const billingToggle = document.getElementById('billingToggle');
            const starterPrice = document.getElementById('starterPrice');
            const professionalPrice = document.getElementById('professionalPrice');
            const enterprisePrice = document.getElementById('enterprisePrice');
            const billingCycles = document.querySelectorAll('.billing-cycle');





        });
        document.addEventListener('DOMContentLoaded', function() {
            // Theme toggle functionality
            const themeToggle = document.getElementById('theme-toggle');
            const themeIcon = document.getElementById('theme-icon');
            const root = document.documentElement;

            // Check for saved theme preference
            const savedTheme = localStorage.getItem('theme');

            if (savedTheme === 'dark') {
                enableDarkMode();
                themeToggle.checked = true;
            }

            // Theme toggle handler
            themeToggle.addEventListener('change', function() {
                if (this.checked) {
                    enableDarkMode();
                    localStorage.setItem('theme', 'dark');
                } else {
                    enableLightMode();
                    localStorage.setItem('theme', 'light');
                }
            });

            function enableDarkMode() {
                root.style.setProperty('--header-bg', '#1a1a1a');
                root.style.setProperty('--text-color', '#f5f5f5');
                root.style.setProperty('--primary', '#4e9cff');
                root.style.setProperty('--primary-dark', '#3a86ff');
                document.body.style.backgroundColor = '#121212';
                themeIcon.textContent = '🌙';

                // Keep pricing section unchanged
                const pricingCards = document.querySelectorAll('.pricing-card');
                pricingCards.forEach(card => {
                    card.style.backgroundColor = '#fff';
                });

                const prices = document.querySelectorAll('.price');
                prices.forEach(price => {
                    price.style.color = '#222';
                });

                const planNames = document.querySelectorAll('.plan-name');
                planNames.forEach(name => {
                    name.style.color = '#555';
                });

                const featureItems = document.querySelectorAll('.feature-item');
                featureItems.forEach(item => {
                    item.style.color = '#333';
                });
            }

            function enableLightMode() {
                root.style.setProperty('--header-bg', '#ffffff');
                root.style.setProperty('--text-color', '#333333');
                root.style.setProperty('--primary', '#3a86ff');
                root.style.setProperty('--primary-dark', '#2667cc');
                document.body.style.backgroundColor = '#f5f7fa';
                themeIcon.textContent = '☀️';
            }

            // Navbar scroll effect
            const header = document.querySelector('header');

            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
                    header.style.padding = '0';
                } else {
                    header.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.08)';
                    header.style.padding = '0.5rem 0';
                }
            });

            // Active link indicator
            const navLinks = document.querySelectorAll('.nav-links a');
            const currentPath = window.location.pathname;

            navLinks.forEach(link => {
                const linkPath = link.getAttribute('href');
                if (linkPath === currentPath || (currentPath.includes(linkPath) && linkPath !== '#')) {
                    link.style.color = 'var(--primary)';
                    link.style.fontWeight = '600';
                }
            });
        });
    </script>

</body>

</html>