<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AI-Maker</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/resources/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="background d-flex justify-content-center align-items-center">
        <div class="rectangle d-flex">
            <div class="left-side d-flex flex-column justify-content-between align-items-center p-4">
                <div class="form-container d-flex flex-column align-items-center mt-5">
                    <h2 class="mb-4 mt-4">Welcome to AiTools</h2>
                    <p class="mb-4">Don't have an account? <a href="get_started.html">Signup</a></p>
                    <button class="btn btn-primary mb-2 mt-2">
                        <i class="fab fa-google"></i> Sign in with Google
                    </button>
                    <button class="btn btn-primary mb-2">
                        <i class="fab fa-facebook-f"></i> Sign in with Facebook
                    </button>
                    <button class="btn btn-primary mb-4">
                        <i class="fab fa-apple"></i> Sign in with Apple
                    </button>
                    <div class="divider">
                        <span class="divider-text">OR</span>
                    </div>
                    <form class="w-100">
                        <div class="form-group">
                            <input type="email" class="form-control mb-3" placeholder="Enter your email" required>
                            <input type="password" class="form-control mb-4" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-create-account mb-2">Login</button>
                    </form>
                    <p class="small mt-2">Forgot password? <a href="#">Reset here</a></p>
                </div>
            </div>
            <div class="right-side"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
