<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, sans-serif;
        }

        body {
            background: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .container {
            max-width: 600px;
            text-align: center;
        }

        .error-code {
            font-size: 120px;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 2rem;
        }

        .illustration {
            width: 100%;
            max-width: 400px;
            height: 200px;
            margin: 2rem auto;
            position: relative;
        }

        .caveman {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 120px;
        }

        .caveman-body {
            width: 60px;
            height: 80px;
            background: #fbbf24;
            border-radius: 30px;
            position: relative;
        }

        .caveman-head {
            width: 40px;
            height: 40px;
            background: #92400e;
            border-radius: 50%;
            position: absolute;
            top: -20px;
            left: 10px;
        }

        .caveman-face {
            width: 30px;
            height: 30px;
            background: #fbbf24;
            border-radius: 50%;
            position: absolute;
            top: 5px;
            left: 5px;
        }

        .rope {
            position: absolute;
            width: 200px;
            height: 2px;
            background: #92400e;
            top: 40px;
            left: -60px;
        }

        .stone {
            position: absolute;
            width: 40px;
            height: 60px;
            background: #e5e7eb;
            border-radius: 10px;
        }

        .stone-left {
            left: 0;
            top: 20px;
        }

        .stone-right {
            right: 0;
            top: 20px;
        }

        .bush {
            position: absolute;
            width: 30px;
            height: 20px;
            background: #3b82f6;
            border-radius: 15px 15px 0 0;
            bottom: 0;
        }

        .bush-left {
            left: 40px;
        }

        .bush-right {
            right: 40px;
        }

        .title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #111827;
        }

        .description {
            font-size: 1.1rem;
            color: #4b5563;
            margin-bottom: 2rem;
        }

        .home-button {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .home-button:hover {
            background: #2563eb;
        }

        @media (max-width: 640px) {
            .error-code {
                font-size: 80px;
            }

            .title {
                font-size: 2rem;
            }

            .illustration {
                height: 150px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="error-code">404</h1>
        
        <div class="illustration">
            <div class="stone stone-left"></div>
            <div class="stone stone-right"></div>
            <div class="caveman">
                <div class="caveman-body">
                    <div class="caveman-head">
                        <div class="caveman-face"></div>
                    </div>
                </div>
                <div class="rope"></div>
            </div>
            <div class="bush bush-left"></div>
            <div class="bush bush-right"></div>
        </div>

        <h2 class="title">Look like you're lost</h2>
        <p class="description">The page you are looking for is not available!</p>
        
        <button class="home-button" onclick="goHome()">Go to Home</button>
    </div>

    <script>
        function goHome() {
            window.location.href = 'index.php';
        }
    </script>
</body>
</html>