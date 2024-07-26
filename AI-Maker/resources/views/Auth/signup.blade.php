<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Started - AI-Maker</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="background d-flex justify-content-center align-items-center">
        <div class="rectangle d-flex">
            <div class="left-side d-flex flex-column justify-content-between align-items-center p-4">
                <div class="form-container d-flex flex-column align-items-center mt-5">
                    <h2 class="mb-4 mt-4">Get started with AiTools</h2>
                    <div class="divider">
                        <span class="divider-text">OR</span>
                    </div>
                    <form method="POST" action="{{ route('signup') }}" class="w-100">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control mb-3" name="name" placeholder="Enter your name" required>
                            <input type="email" class="form-control mb-3" name="email" placeholder="Enter your email" required>
                            <input type="password" class="form-control mb-4" name="password" placeholder="Enter your password" required>
                            <input type="password" class="form-control mb-4" name="password_confirmation" placeholder="Confirm your password" required>
                        </div>
                        <button type="submit" class="btn btn-create-account mb-2">Create Account</button>
                    </form>
                    <p class="small mt-2">Already signed up? <a href="{{ route('login') }}">Log in</a></p>
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
