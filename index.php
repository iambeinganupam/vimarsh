<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" class="light-theme">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIMARSH - Pharmaceutical Analysis & Prediction</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            /* Light theme variables */
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #38bdf8;
            --accent: #7c3aed;
            --dark: #1e293b;
            --light: #f8fafc;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;

            /* Background and text colors */
            --bg-color: #f8fafc;
            --text-color: #1e293b;
            --card-bg: white;
            --header-bg: white;
            --footer-bg: #1e293b;
            --footer-text: white;
            --footer-secondary: #cbd5e1;
            --border-color: #e2e8f0;
            --hero-bg: #f0f9ff;
            --feature-shadow: rgba(245, 245, 247, 0.799);
            --feature-hover-shadow: rgba(15, 35, 186, 0.758);
            --team-hover-shadow: rgba(133, 49, 4, 0.826);
            --demo-shadow: rgba(7, 169, 244, 0.751);
        }

        /* Dark theme variables */
        .dark-theme {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --secondary: #0ea5e9;
            --accent: #8b5cf6;
            --dark: #e2e8f0;
            --light: #0f172a;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;

            /* Background and text colors */
            --bg-color: #0f172a;
            --text-color: #e2e8f0;
            --card-bg: #1e293b;
            --header-bg: #1e293b;
            --footer-bg: #0f172a;
            --footer-text: #e2e8f0;
            --footer-secondary: #94a3b8;
            --border-color: #334155;
            --hero-bg: #0f172a;
            --feature-shadow: rgba(15, 23, 42, 0.5);
            --feature-hover-shadow: rgba(59, 130, 246, 0.5);
            --team-hover-shadow: rgba(244, 114, 54, 0.5);
            --demo-shadow: rgba(14, 165, 233, 0.5);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            overflow-x: hidden;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Header and Navigation */
        header {
            background-color: var(--header-bg);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: background-color 0.3s ease;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .cta-button {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: var(--primary-dark);
        }

        /* Theme Toggle Switch */
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
            background-color: #ccc;
            border-radius: 28px;
            transition: 0.4s;
        }

        .theme-toggle-slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            border-radius: 50%;
            transition: 0.4s;
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
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 7rem 5% 5rem;
            background-color: var(--hero-bg);
            position: relative;
            overflow: hidden;
            transition: background-color 0.3s ease;
        }

        .hero-content {
            width: 50%;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            color: var(--text-color);
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: var(--text-color);
            opacity: 0.8;
            margin-bottom: 2rem;
            max-width: 40rem;
        }

        .hero img {
            display: flex;
            margin: auto;
        }

        .spline-container {
            position: absolute;
            width: 50%;
            height: 100%;
            right: 0;
            top: 0;
            z-index: 1;
        }

        #spline-viewer {
            width: 100%;
            height: 100%;
        }

        /* About Section */
        .about {
            padding: 5rem 5%;
            background-color: var(--card-bg);
            transition: background-color 0.3s ease;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-align: center;
            color: var(--text-color);
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--text-color);
            opacity: 0.8;
            text-align: center;
            margin-bottom: 3rem;
            max-width: 50rem;
            margin-left: auto;
            margin-right: auto;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 10px 25px var(--feature-shadow);
            transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px var(--feature-hover-shadow);
        }

        .feature-icon {
            background-color: var(--primary);
            opacity: 0.2;
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            color: var(--card-bg);
            font-size: 1.5rem;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .feature-card p {
            color: var(--text-color);
            opacity: 0.8;
            line-height: 1.6;
        }

        /* Team Section */
        .team {
            padding: 5rem 5%;
            background-color: var(--bg-color);
            transition: background-color 0.3s ease;
        }

        .team-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .team-member {
            background-color: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px var(--team-hover-shadow);
        }

        .member-image {
            height: 250px;
            overflow: hidden;
        }

        .member-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .member-info {
            padding: 1.5rem;
            text-align: center;
        }

        .member-info h3 {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        .member-info p {
            color: var(--text-color);
            opacity: 0.8;
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-links a {
            color: var(--primary);
            transition: transform 0.3s;
        }

        .social-links a:hover {
            transform: translateY(-3px);
        }

        /* Contact Section */
        .contact {
            padding: 5rem 5%;
            background-color: var(--card-bg);
            transition: background-color 0.3s ease;
        }

        .contact-container {
            display: flex;
            gap: 4rem;
            margin-top: 3rem;
        }

        .contact-info {
            flex: 1;
        }

        .contact-info h3 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: var(--text-color);
        }

        .contact-info p {
            color: var(--text-color);
            opacity: 0.8;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .contact-details {
            margin-bottom: 2rem;
        }

        .contact-item {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            color: var(--text-color);
            opacity: 0.8;
        }

        .contact-item i {
            color: var(--primary);
        }

        .contact-form {
            flex: 1;
            background-color: var(--bg-color);
            padding: 2rem;
            border-radius: 12px;
            transition: background-color 0.3s ease;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            background-color: var(--card-bg);
            color: var(--text-color);
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        /* Footer */
        footer {
            background-color: var(--footer-bg);
            color: var(--footer-text);
            padding: 3rem 5% 2rem;
            transition: background-color 0.3s ease;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-column h3 {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            color: var(--footer-text);
        }

        .footer-column p {
            color: var(--footer-secondary);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: var(--footer-secondary);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--footer-text);
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
            color: var(--footer-secondary);
        }

        /* Demo Section */
        .demo {
            padding: 5rem 5%;
            background-color: var(--hero-bg);
            transition: background-color 0.3s ease;
        }

        .demo-container {
            display: flex;
            gap: 4rem;
            align-items: center;
            margin-top: 3rem;
        }

        .demo-content {
            flex: 1;
        }

        .demo-image {
            flex: 1;
            position: relative;
            height: 350px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 30px var(--demo-shadow);
            transition: box-shadow 0.3s ease;
        }

        .input-section {
            margin-top: 2rem;
        }

        .compound-input {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .compound-input input {
            flex: 1;
            padding: 0.8rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            background-color: var(--card-bg);
            color: var(--text-color);
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        .result-section {
            margin-top: 2rem;
            padding: 2rem;
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            transition: background-color 0.3s ease;
        }

        .result-title {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .result-item {
            display: flex;
            justify-content: space-between;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
        }

        .result-item:last-child {
            border-bottom: none;
        }

        .success-rate {
            color: var(--success);
            font-weight: 600;
        }

        .side-effects {
            color: var(--warning);
            font-weight: 600;
        }

        .compatibility {
            color: var(--primary);
            font-weight: 600;
        }

        .recommendation {
            margin-top: 1.5rem;
            padding: 1rem;
            background-color: var(--bg-color);
            border-radius: 8px;
            border-left: 4px solid var(--success);
            transition: background-color 0.3s ease;
        }

        /* Utility Classes */
        .text-highlight {
            color: var(--primary);
            font-weight: 600;
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            .hero-content {
                width: 60%;
            }

            .spline-container {
                width: 40%;
            }

            .approach-container {
                flex-direction: column;
            }

            .contact-container {
                flex-direction: column;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 1rem;
            }

            .nav-links {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero {
                flex-direction: column;
                padding-top: 10rem;
            }

            .hero-content {
                width: 100%;
                text-align: center;
            }

            .hero p {
                margin-left: auto;
                margin-right: auto;
            }

            .spline-container {
                position: relative;
                width: 100%;
                height: 50vh;
                margin-top: 2rem;
            }

            .theme-toggle {
                margin: 1rem 0 0 0;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate {
            animation: fadeIn 0.8s ease-out forwards;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar">
            <a href="#" class="logo">VIMARSH</a>
            <div class="nav-links">
                <a href="#about">About</a>
                <a href="#demo">Demo</a>
                <a href="#team">Team</a>
                <a href="pricing.php">Pricing</a>
                <a href="#contact">Contact</a>

                <!-- Theme Toggle Switch -->
                <div class="theme-toggle">
                    <span class="theme-icon" id="theme-icon">☀️</span>
                    <label class="theme-toggle-label">
                        <input type="checkbox" class="theme-toggle-input" id="theme-toggle">
                        <span class="theme-toggle-slider"></span>
                    </label>
                </div>
            </div>
            <?php
            if (isset($_SESSION['email'])) {
                echo "<a class='cta-button' href='backend/logout.php'><i class='fa fa-user'></i></a>";
            } else {
                echo "<a class='cta-button' style='text-decoration: none;' href='login.php'>Get Started</a>";
            }
            ?>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <img src="bg.jpg">
        <div class="hero-content animate">
            <h1>Revolutionizing <span>Pharmaceutical Research</span> with AI</h1>
            <p>VIMARSH analyzes existing medications and clinical trial data to predict the efficacy and potential side effects of new drug compositions, accelerating pharmaceutical development and reducing clinical trial risks.</p>
            <a href="explore.php" class="cta-button" style="text-decoration: none;">Explore VIMARSH</a>
        </div>
        <div class="spline-container">
            <div id="spline-viewer"></div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <h2 class="section-title">What is VIMARSH?</h2>
        <p class="section-subtitle">VIMARSH is an innovative AI-powered platform that analyzes pharmaceutical compositions to predict efficacy and side effects, streamlining the drug development process.</p>

        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-microscope"></i>
                </div>
                <h3>Predictive Analysis</h3>
                <p>Analyzes new drug compositions to predict success rates and potential side effects before clinical trials begin.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-database"></i>
                </div>
                <h3>Comprehensive Database</h3>
                <p>Utilizes a vast database of existing medications and clinical trial outcomes to inform predictions with real-world data.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fa-solid fa-robot"></i>
                </div>
                <h3>CogniCare</h3>
                <p>The AI having ability to understand and address medical needs with precision and accuracy.</p><br>
                <a href="https://devsumit2.app.n8n.cloud/webhook/96e6892d-4122-403b-abc4-5e8165c4f3b5/chat" style="text-decoration: none;" class='cta-button'>Use me</a>
            </div>
        </div>
    </section>

    <!-- Demo Section -->
    <section class="demo" id="demo">
        <h2 class="section-title">Try VIMARSH</h2>
        <p class="section-subtitle">Experience the power of AI-driven pharmaceutical analysis with our interactive demo.</p>

        <div class="demo-container">
            <div class="demo-content">
                <h3>Input Your Compound</h3>
                <p>Enter the molecular composition of your pharmaceutical compound to receive a comprehensive analysis.</p>

                <div class="input-section">
                    <div class="compound-input">
                        <!-- <input type="text" placeholder="Enter compound name" id="compound-name"> -->
                    </div>
                    <!-- <div class="compound-input">
                        <input type="text" placeholder="Active ingredient 1" class="ingredient-input">
                        <input type="text" placeholder="Percentage" class="percentage-input">
                    </div>
                    <div class="compound-input">
                        <input type="text" placeholder="Active ingredient 2" class="ingredient-input">
                        <input type="text" placeholder="Percentage" class="percentage-input">
                    </div>
                    <div class="compound-input">
                        <input type="text" placeholder="Active ingredient 3" class="ingredient-input">
                        <input type="text" placeholder="Percentage" class="percentage-input">
                    </div> -->
                    <a class="cta-button" style="text-decoration: none;" href="https://devsumit2.app.n8n.cloud/webhook/ec9684ba-fd9e-4165-99df-ab7a72b62480/chat" id="analyze-btn">Analyze Compound</a>
                </div>

                <div class="result-section" id="result-section" style="display: none;">
                    <h4 class="result-title">Analysis Results</h4>
                    <div class="result-item">
                        <span>Predicted Success Rate:</span>
                        <span class="success-rate" id="success-rate">87.3%</span>
                    </div>
                    <div class="result-item">
                        <span>Potential Side Effects:</span>
                        <span class="side-effects" id="side-effects">Low</span>
                    </div>
                    <div class="result-item">
                        <span>Molecular Compatibility:</span>
                        <span class="compatibility" id="compatibility">High</span>
                    </div>
                    <div class="recommendation" id="recommendation">
                        <p>Based on our analysis, this compound shows promising results for treating the target condition with minimal side effects. We recommend proceeding with initial testing phases.</p>
                    </div>
                </div>
            </div>

            <div class="demo-image">
                <img src="medicine 2.jpg">
                <div id="molecule-viewer"></div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team" id="team">
        <h2 class="section-title">Meet The Golden Flute Team</h2>
        <p class="section-subtitle">The brilliant minds behind VIMARSH who are passionate about revolutionizing pharmaceutical research.</p>

        <div class="team-container">
            <div class="team-member">
                <div class="member-image">
                    <img src="amritya.jpg" alt="Amritya Rajwanshy">
                </div>
                <div class="member-info">
                    <h3>Amritya Rajwanshy</h3>
                    <p>Team Lead</p>
                    <div class="social-links">
                        <a href="https://www.linkedin.com/in/amritya-rajwanshy" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="https://github.com/AmrityaRajwanshy" target="_blank"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>

            <div class="team-member">
                <div class="member-image">
                    <img src="anneshwa.jpg" alt="Anneshwa Das">
                </div>
                <div class="member-info">
                    <h3>Anneshwa Das</h3>
                    <p>AI Developer</p>
                    <div class="social-links">
                        <a href="https://www.linkedin.com/in/anneshwa-das" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="https://github.com/anneshwa5806" target="_blank"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>

            <div class="team-member">
                <div class="member-image">
                    <img src="anupambro.jpg" alt="Anupam Raj">
                </div>
                <div class="member-info">
                    <h3>Anupam Raj</h3>
                    <p>Backend Developer</p>
                    <div class="social-links">
                        <a href="https://www.linkedin.com/in/iambeinganupam/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="https://github.com/iambeinganupam" target="_blank"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>

            <div class="team-member">
                <div class="member-image">
                    <img src="sumit.jpg" alt="Sumit Sill">
                </div>
                <div class="member-info">
                    <h3>Sumit Sill</h3>
                    <p>Frontend Developer</p>
                    <div class="social-links">
                        <a href="https://www.linkedin.com/in/sumit-sill" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="https://github.com/Sumitsill" target="_blank"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <h2 class="section-title">Get In Touch</h2>
        <p class="section-subtitle">Interested in VIMARSH? Contact us for more information or to schedule a demonstration.</p>

        <div class="contact-container">
            <div class="contact-info">
                <h3>Contact Information</h3>
                <p>Have questions about how VIMARSH can accelerate your pharmaceutical research? Reach out to our team and we'll be happy to help.</p>

                <div class="contact-details">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>H4B 2025, Health & Fitness Track</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>info@vimarsh.com</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+91 XXXX XXX XXX</span>
                    </div>
                </div>

                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="contact-form">
                <form id="contact-form" action="https://api.web3forms.com/submit" method="POST">

                    <input type="hidden" name="access_key" value="41860a88-37e8-4cce-8842-b1d0bb9bbb34">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" name="message" required></textarea>
                    </div>
                    <input type="checkbox" name="botcheck" class="hidden" style="display: none;">

                    <button class="cta-button" type="submit">Send Message</button>
                </form>
            </div>
        </div>
    </section>
    <script>
        // Wait for the DOM to fully load
        document.addEventListener('DOMContentLoaded', function() {
            // Get the theme toggle checkbox, body element, and theme icon
            const themeToggle = document.getElementById('theme-toggle');
            const body = document.documentElement;
            const themeIcon = document.getElementById('theme-icon');

            // Check if there's a saved theme preference in localStorage
            const savedTheme = localStorage.getItem('theme');

            // Apply saved theme if it exists
            if (savedTheme === 'dark') {
                body.classList.remove('light-theme');
                body.classList.add('dark-theme');
                themeToggle.checked = true;
                themeIcon.textContent = '🌙';
            }

            // Add event listener to the theme toggle
            themeToggle.addEventListener('change', function() {
                if (this.checked) {
                    // Switch to dark theme
                    body.classList.remove('light-theme');
                    body.classList.add('dark-theme');
                    localStorage.setItem('theme', 'dark');
                    themeIcon.textContent = '🌙';
                } else {
                    // Switch to light theme
                    body.classList.remove('dark-theme');
                    body.classList.add('light-theme');
                    localStorage.setItem('theme', 'light');
                    themeIcon.textContent = '☀️';
                }
            });
        });
    </script>
</body>

</html>