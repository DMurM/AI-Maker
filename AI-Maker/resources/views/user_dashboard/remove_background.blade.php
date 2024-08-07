<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Image Generator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/remove_background.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <x-sidebar /> <!-- Side-bar add component -->
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <header class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div>
                        <h1 class="h2">Remove Background</h1>
                        <p>Upload an image and remove its background automatically.</p>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Credits: {{ Auth::user()->credits }}</button>
                    </div>
                </header>
            </main>
        </div>
    </div>
</body>

</html>
