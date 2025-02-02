<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Asset Management</title>
    <!-- Menyertakan Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            color: #2d3748;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .full-screen-container {
            background: linear-gradient(135deg, #38b2ac, #3182ce);
            color: white;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
        }

        .welcome-container {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 60px;
            max-width: 700px;
            width: 100%;
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        .welcome-container:hover {
            transform: translateY(-10px);
        }

        .welcome-container h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #2d3748;
        }

        .welcome-container p {
            font-size: 1.2rem;
            color: #4a5568;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .cta-buttons .btn {
            width: 220px;
            font-weight: 600;
            font-size: 1.1rem;
            border-radius: 50px;
            padding: 12px 0;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .cta-button-primary {
            background-color: #38b2ac;
            color: white;
            border: none;
        }

        .cta-button-primary:hover {
            background-color: #319795;
            transform: translateY(-5px);
        }

        .cta-button-secondary {
            background-color: #edf2f7;
            color: #38b2ac;
            border: 2px solid #38b2ac;
        }

        .cta-button-secondary:hover {
            background-color: #38b2ac;
            color: white;
            transform: translateY(-5px);
        }

        .footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            color: #888;
            font-size: 0.9rem;
        }

    </style>
</head>
<body>

    <div class="full-screen-container">
        <div class="welcome-container">
            <h1>Selamat Datang di Asset Management</h1>
            <p>Manage your assets efficiently with our intuitive platform. Track, monitor, and report your inventory with ease.</p>
            <div class="cta-buttons d-flex justify-content-center gap-4 mt-4">
                <a href="{{ route('login') }}" class="btn cta-button-primary">Login</a>
                <a href="{{ route('register') }}" class="btn cta-button-secondary">Sign Up</a>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Asset Management Platform. All rights reserved.</p>
    </div>

    <!-- Menyertakan Bootstrap 5 JS dan Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
