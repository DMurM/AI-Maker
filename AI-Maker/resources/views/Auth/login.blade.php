<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AI-Maker</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="background d-flex justify-content-center align-items-center">
        <div class="rectangle d-flex">
            <div class="left-side d-flex flex-column justify-content-between align-items-center p-4">
                <div class="form-container d-flex flex-column align-items-center mt-5">
                    <h2 class="mb-4 mt-4">Welcome to AI-Maker</h2>
                    <p class="mb-4">Don't have an account? <a href="signup">Signup</a></p>
                    <button class="btn btn-primary mb-4 mt-2">
                        <i class="fab fa-google"></i> Sign in with Google
                    </button>
                    <div class="divider mb-4">
                        <span class="divider-text">OR</span>
                    </div>
                    <form class="w-100" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-4">
                            <input type="email" name="email" class="form-control mb-3" placeholder="Enter your email" required>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-create-account mb-4">Login</button>
                    </form>
                    <a href="{{ url('/') }}" class="btn btn-create-account mt-4">Go back</a>
                    <p class="small mt-4">Forgot password? <a href="#">Reset here</a></p>
                </div>
            </div>
            <div class="right-side"></div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Login Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    The provided email or password is incorrect.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            @if ($errors->has('login_error'))
                $('#errorModal').modal('show');
            @endif
        });
    </script>
</body>

</html>
