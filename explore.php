<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <title>VIMARSH - Our Technology</title>
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #38bdf8;
            --accent: #7c3aed;
            --dark: #1e293b;
            --light: #f8fafc;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--light);
            color: var(--dark);
            overflow-x: hidden;
        }

        /* Header */
        header {
            background-color: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
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
            color: var(--dark);
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
            text-decoration: none;
        }

        .cta-button:hover {
            background-color: var(--primary-dark);
        }

        /* Hero Section */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(45deg, #0f172a, #1e293b);
            overflow: hidden;
            padding: 6rem 5% 2rem;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/api/placeholder/1200/800');
            opacity: 0.05;
            animation: grain 8s steps(10) infinite;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 650px;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #60a5fa, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientFlow 8s ease infinite;
        }

        .hero p {
            font-size: 1.25rem;
            line-height: 1.7;
            color: #94a3b8;
            margin-bottom: 2.5rem;
            animation: fadeInUp 1s ease-out 0.5s both;
        }

        .hero-cta {
            display: inline-flex;
            align-items: center;
            padding: 1rem 2rem;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: transform 0.3s ease;
            animation: fadeInUp 1s ease-out 0.7s both;
        }

        .hero-cta:hover {
            transform: translateY(-3px);
        }

        .hero-image {
            position: absolute;
            right: -5%;
            top: 50%;
            transform: translateY(-50%);
            width: 50%;
            height: 80%;
            animation: float 6s ease-in-out infinite;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            border-radius: 20px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
        }

        /* Technology Section */
        .technology {
            padding: 5rem 5%;
            background-color: #f8fafc;
            position: relative;
            overflow: hidden;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            background: linear-gradient(to right, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #64748b;
            max-width: 800px;
            margin-bottom: 3rem;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        .technology-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .tech-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .tech-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.15);
        }

        .tech-image {
            height: 200px;
            overflow: hidden;
        }

        .tech-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .tech-card:hover .tech-image img {
            transform: scale(1.1);
        }

        .tech-content {
            padding: 1.5rem;
        }

        .tech-content h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .tech-content p {
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        /* Approach Section */
        .approach {
            padding: 5rem 5%;
            background-color: #f8fafc;
            position: relative;
            overflow: hidden;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            background: linear-gradient(to right, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #64748b;
            max-width: 800px;
            margin-bottom: 3rem;
        }

        .approach-container {
            display: flex;
            gap: 4rem;
            align-items: center;
            position: relative;
        }

        .approach-content {
            flex: 1;
            position: relative;
            z-index: 2;
        }

        .approach-image {
            flex: 1;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .step {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2rem;
            background: rgba(255, 255, 255, 0.9);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }

        .step:hover {
            transform: translateX(10px);
            box-shadow: 0 15px 30px rgba(15, 35, 186, 0.758);
        }

        .step-number {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            flex-shrink: 0;
        }

        /* AI Workflow Section */
        .workflow {
            padding: 5rem 5%;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            position: relative;
        }

        .workflow-container {
            margin-top: 3rem;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .workflow-step {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            display: flex;
            align-items: flex-start;
            gap: 2rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s;
            position: relative;
        }

        .workflow-step:hover {
            transform: translateX(10px);
        }

        .workflow-step:not(:last-child)::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: 35px;
            width: 2px;
            height: 30px;
            background: linear-gradient(to bottom, var(--primary), var(--secondary));
        }

        .step-number {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .step-content h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .step-content p {
            color: #64748b;
            line-height: 1.6;
        }

        /* Case Studies Section */
        .case-studies {
            padding: 5rem 5%;
            background-color: white;
        }

        .case-studies-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .case-study {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .case-study:hover {
            transform: translateY(-10px);
        }

        .case-study-image {
            height: 200px;
            overflow: hidden;
        }

        .case-study-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .case-study-content {
            padding: 1.5rem;
        }

        .case-study-content h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .case-study-content p {
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .case-stats {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .stat {
            flex: 1;
            text-align: center;
            padding: 0.5rem;
            background-color: #f8fafc;
            border-radius: 8px;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #64748b;
        }

        /* Footer */
        footer {
            background-color: #1e293b;
            color: white;
            padding: 3rem 5% 2rem;
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
            color: white;
        }

        .footer-column p {
            color: #94a3b8;
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
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: white;
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #334155;
            color: #94a3b8;
        }

        /* Benefits Section */
        .benefits {
            padding: 5rem 5%;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            position: relative;
        }

        .benefits-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            position: relative;
            z-index: 2;
        }

        .benefit-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            padding: 2rem;
            transition: all 0.3s;
            border: 1px solid rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .benefit-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(15, 35, 186, 0.758);
        }

        .benefit-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .benefit-card i {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .approach-container {
                flex-direction: column;
            }
            
            .spline-container {
                width: 100%;
                height: 50%;
                position: relative;
            }
        }

        /* Animations */
        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes float {
            0% { transform: translateY(-50%) translateX(0); }
            50% { transform: translateY(-50%) translateX(-20px); }
            100% { transform: translateY(-50%) translateX(0); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes grain {
            0%, 100% { transform: translate(0, 0); }
            10% { transform: translate(-5%, -10%); }
            30% { transform: translate(3%, -15%); }
            50% { transform: translate(12%, 9%); }
            70% { transform: translate(9%, 4%); }
            90% { transform: translate(-1%, 7%); }
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            .hero h1 {
                font-size: 3.5rem;
            }
            .hero-image {
                width: 45%;
            }
        }

        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                padding-top: 6rem;
                text-align: center;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero-content {
                max-width: 100%;
            }
            
            .hero-image {
                position: relative;
                width: 100%;
                height: 350px;
                transform: none;
                right: 0;
                top: 0;
                margin-top: 2rem;
                margin-right: 2rem;
            }
            
            .navbar {
                flex-direction: column;
                padding: 1rem;
            }
            
            .nav-links {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .workflow-step {
                flex-direction: column;
            }
            
            .step-number {
                margin-bottom: 1rem;
            }
            
            .workflow-step:not(:last-child)::after {
                left: 25px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar">
            <a href="index.php" class="logo">VIMARSH</a>
            <div class="nav-links">
                <a href="index.php#about">About</a>
                <a href="index.php#demo">Demo</a>
                <a href="index.php#team">Team</a>
                <a href="pricing.php">Pricing</a>
                <a href="index.php#contact">Contact</a>
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
    <section class="hero">
        <div class="hero-content">
            <h1>Revolutionizing Drug Development with AI</h1>
            <p>VIMARSH uses cutting-edge artificial intelligence to transform how we develop and test new medications, making the process faster, safer, and more efficient.</p>
            <a href="index.php" class="hero-cta">
                Explore Our Technology <i class="fas fa-arrow-right" style="margin-left: 10px;"></i>
            </a>
        </div>
        <div class="hero-image">
            <img src="explore.jpg" alt="AI Pharmaceutical Analysis">
        </div>
    </section>

    <!-- Technical Approach -->
    <section class="approach" id="approach">
        <h2 class="section-title">Technical Approach</h2>
        <p class="section-subtitle">Our AI-powered system analyzes chemical compositions and historical clinical data to make reliable predictions about drug efficacy and safety.</p>
        
        <div class="approach-container">
            <div class="approach-content">
                <h3>How VIMARSH Works</h3>
                <p>Our advanced machine learning algorithms analyze the molecular structure of new drug compositions and compare them with our extensive database of existing medications and clinical trials.</p><br>
                
                <div class="approach-steps">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h4>Data Collection</h4>
                            <p>Comprehensive analysis of existing medications and their chemical compositions.</p>
                        </div>
                    </div>
                    
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h4>Pattern Recognition</h4>
                            <p>Identification of patterns between molecular structures and their therapeutic effects.</p>
                        </div>
                    </div>
                    
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h4>Predictive Analysis</h4>
                            <p>Projecting the efficacy and potential side effects of new pharmaceutical compositions.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="spline-container">
                <!-- Second Spline 3D scene -->
                <!-- <iframe src='https://my.spline.design/untitled-b5922e0e6b9c9f8f7f48399406563f16/' frameborder='0' width='100%' height='600px'></iframe> -->
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits" id="benefits">
        <h2 class="section-title">Impacts & Benefits</h2>
        <p class="section-subtitle">VIMARSH is designed to transform pharmaceutical research and development, offering significant benefits for companies and patients alike.</p>
        
        <div class="benefits-container">
            <div class="benefit-card">
                <h3><i class="fas fa-industry"></i> For Pharmaceutical Companies</h3>
                <p>Medium to large pharmaceutical companies can accelerate drug development, reduce clinical trial costs, and increase the success rate of new medications.</p>
            </div>
            
            <div class="benefit-card">
                <h3><i class="fas fa-heartbeat"></i> For Patients</h3>
                <p>Faster access to new medications, reduced risks from clinical trials, and potential development of treatments for previously incurable diseases.</p>
            </div>
            
            <div class="benefit-card">
                <h3><i class="fas fa-users"></i> Social Impact</h3>
                <p>Reduces deaths and side effects from clinical trials and addresses the problem of volunteer shortages for testing new medications.</p>
            </div>
            
            <div class="benefit-card">
                <h3><i class="fas fa-chart-pie"></i> Economic Impact</h3>
                <p>Boosts pharmaceutical company revenues, contributing to overall economic growth and development within the healthcare sector.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>VIMARSH</h3>
                <p>Revolutionizing pharmaceutical research with AI-powered analysis and prediction, making drug development faster, safer, and more efficient.</p>
            </div>
            
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#about">About</a></li>
                    <li><a href="index.php#demo">Demo</a></li>
                    <li><a href="technology.php">Technology</a></li>
                    <li><a href="index.php#team">Team</a></li>
                </ul>
            </div>
            
            <!-- <div class="footer-column">
                <h3>Resources</h3>
                <ul class="footer-links">
                    <li><a href="#">Documentation</a></li>
                    <li><a href="#">API Reference</a></li>
                    <li><a href="#">Case Studies</a></li>
                    <li><a href="#">Research Papers</a></li>
                </ul>
            </div> -->
            
            <div class="footer-column">
                <h3>Contact</h3>
                <ul class="footer-links">
                    <li><a href="mailto:info@vimarsh.com">info@vimarsh.com</a></li>
                    <li><a href="tel:+911234567890">+91 1234 567 890</a></li>
                    <li><a href="#">Support Center</a></li>
                </ul>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; 2025 VIMARSH. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Scroll animation for elements
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                    }
                });
            }, {
                threshold: 0.1
            });

            const elements = document.querySelectorAll('.tech-card, .workflow-step, .case-study');
            elements.forEach(el => {
                observer.observe(el);
                el.style.opacity = "0";
                el.style.transform = "translateY(20px)";
                el.style.transition = "opacity 0.8s ease, transform 0.8s ease";
            });

            // Add animate class to handle the animation
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.animate').forEach(el => {
                    el.style.opacity = "1";
                    el.style.transform = "translateY(0)";
                });
            });
        });
    </script>
</body>
</html>