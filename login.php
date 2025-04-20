<?php
session_start();
if(isset($_SESSION['email'])){
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
    <title>VIMARSH - Sign In</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
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
            background-color: #f0f9ff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header and Navigation */
        header {
            background-color: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
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

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .blue-circle {
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.2) 0%, rgba(56, 189, 248, 0) 70%);
            bottom: -150px;
            left: -100px;
            z-index: -1;
        }

        .purple-circle {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.2) 0%, rgba(124, 58, 237, 0) 70%);
            top: -100px;
            right: -50px;
            z-index: -1;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-icon {
            color: var(--primary);
            font-size: 24px;
            margin-bottom: 1rem;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: #dbeafe;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .form-title {
            font-size: 2rem;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .form-subtitle {
            color: #64748b;
            font-size: 1rem;
        }

        .social-container {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .social-container a {
            border: 1px solid #ddd;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 45px;
            width: 45px;
            color: var(--dark);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .social-container a:hover {
            background-color: #f0f9ff;
            transform: translateY(-3px);
            color: var(--primary);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: #94a3b8;
            font-size: 0.9rem;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background-color: #e2e8f0;
        }

        .divider span {
            padding: 0 1rem;
        }

        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.9rem 1rem 0.9rem 3rem;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.1);
        }

        .form-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .forgot-password {
            display: block;
            text-align: right;
            color: var(--primary);
            font-size: 0.9rem;
            text-decoration: none;
            margin-bottom: 1.5rem;
            transition: color 0.3s;
        }

        .forgot-password:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
        }

        .form-footer {
            text-align: center;
            margin-top: 2rem;
            color: #64748b;
            font-size: 0.95rem;
        }

        .form-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .form-footer a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* Animation */
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

        .animate {
            animation: fadeInUp 0.8s ease backwards;
        }

        .delay-1 {
            animation-delay: 0.1s;
        }

        .delay-2 {
            animation-delay: 0.2s;
        }

        .delay-3 {
            animation-delay: 0.3s;
        }

        .delay-4 {
            animation-delay: 0.4s;
        }

        /* Remember me checkbox */
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .remember-me input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            margin-right: 8px;
            position: relative;
            cursor: pointer;
            background-color: #f8fafc;
        }

        .remember-me input[type="checkbox"]:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .remember-me input[type="checkbox"]:checked::before {
            content: "✓";
            position: absolute;
            color: white;
            font-size: 12px;
            top: 0px;
            left: 4px;
        }

        .remember-me label {
            color: #64748b;
            cursor: pointer;
        }

        /* Particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.6;
        }

        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 1.5rem;
            background-color: white;
            color: #64748b;
            font-size: 0.9rem;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
        }

        footer a {
            color: var(--primary);
            text-decoration: none;
        }

        /* Responsive */
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
            
            .login-container {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="particles" id="particles"></div>

    <header>
        <nav class="navbar">
            <a href="index.html" class="logo">VIMARSH</a>
            <div class="nav-links">
                <a href="index.php#about">About</a>
                <!-- <a href="index.php#approach">Approach</a>
                <a href="index.php#benefits">Benefits</a> -->
                <a href="index.php#demo">Demo</a>
                <a href="signup.php">Sign Up</a>
            </div>
        </nav>
    </header>

    <main class="main-content">
        <div class="login-container">
            <div class="blue-circle"></div>
            <div class="purple-circle"></div>
            
            <div class="form-header animate">
                <div class="form-icon">
                    <i class="fas fa-sign-in-alt"></i>
                </div>
                <h1 class="form-title">Welcome Back</h1>
                <p class="form-subtitle">Sign in to access your VIMARSH account</p>
            </div>
            
            <!-- <div class="social-container animate delay-1">
                <a href="#" class="social"><i class="fab fa-google"></i></a>
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div> -->
            
            <div class="divider animate delay-1">
                <span>or sign in with email</span>
            </div>
            
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group animate delay-2">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
                </div>
                
                <div class="form-group animate delay-3">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                </div>
                
                <div class="animate delay-3" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="remember-me">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>
                
                <button type="submit" name="login" class="submit-btn animate delay-4">Sign In</button>
            </form>
            
            <div class="form-footer animate delay-4">
                Don't have an account? <a href="signup.php">Sign Up</a>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 VIMARSH. All rights reserved. Developed by <a href="#">Golden Flute Team</a></p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create particles
            const particles = document.getElementById('particles');
            const colors = ['#dbeafe', '#bfdbfe', '#93c5fd', '#60a5fa', '#3b82f6'];
            
            for (let i = 0; i < 30; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random properties
                const size = Math.random() * 8 + 3;
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                const color = colors[Math.floor(Math.random() * colors.length)];
                const animationDuration = Math.random() * 10 + 5;
                const animationDelay = Math.random() * 5;
                
                // Apply styles
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}%`;
                particle.style.top = `${posY}%`;
                particle.style.backgroundColor = color;
                particle.style.animation = `float ${animationDuration}s ease-in-out ${animationDelay}s infinite`;
                
                particles.appendChild(particle);
            }
        });
    </script>
    <?php
    include "backend/connect_db.php";
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($connect_db, $_POST['email']);
        $encrypt_password = sha1(mysqli_real_escape_string($connect_db, $_POST['password']));

        $search_account = "SELECT * FROM users WHERE email = '$email' AND password = '$encrypt_password'";

        $search_account_query = mysqli_query($connect_db, $search_account);

        $search_account_count = mysqli_num_rows($search_account_query);

        if($search_account_count > 0){
            while($row = mysqli_fetch_assoc($search_account_query)){
				$_SESSION['name'] = $row['name'];
				// $_SESSION['org_mobile'] = $row['mobile'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['company_name'] = $row['company_name'];
				
				?>
				<script>
					location.replace("index.php");
				</script>
				<?php
			}
        }else{
            ?>
			<script>
				alert("Incorrect email or password...");
			</script>
			<?php
        }

    }
    ?>
</body>
</html>