<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Background</title>
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
                        <h1 class="h2">Background Diffusion</h1>
                        <p>Automatically remove the background and generate an ideal background based on templates or text.</p>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Credits: {{ Auth::user()->credits }}</button>
                    </div>
                </header>
                <div class="row mb-4">
                    <div class="col-md-7 d-flex justify-content-center">
                        <form id="upload-form" action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="upload-area text-center p-5" style="border: 1px dashed #ccc;" onclick="document.getElementById('image-input').click()">
                                <input type="file" id="image-input" name="image" style="display: none;" onchange="handleFileUpload(event)">
                                <i class="fas fa-upload fa-2x mb-2"></i>
                                <p>Click to upload or drag and drop</p>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5">
                        <h3>Config</h3>
                        <!-- Aquí pueden ir las configuraciones adicionales -->
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 d-flex justify-content-center">
                        <img id="uploaded-image" src="" alt="Uploaded Image" style="display: none; max-width: 100%; height: auto; border-radius: 10px; border: 1px solid #ccc;">
                        <div id="loading-spinner" class="spinner-border text-primary" role="status" style="display: none;">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        async function handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                // Mostrar la imagen cargada
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('uploaded-image').src = e.target.result;
                    document.getElementById('uploaded-image').style.display = 'block';
                };
                reader.readAsDataURL(file);

                // Mostrar el spinner de carga
                document.getElementById('loading-spinner').style.display = 'block';

                const formData = new FormData();
                formData.append('file', file);

                try {
                    const response = await fetch('http://192.168.50.159:7000/api/remove', {
                        method: 'POST',
                        body: formData
                    });

                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }

                    const blob = await response.blob();
                    const url = URL.createObjectURL(blob);
                    const link = document.createElement('a');
                    link.href = url;
                    link.download = 'output.png';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    URL.revokeObjectURL(url);
                } catch (error) {
                    console.error('There was a problem with your fetch operation:', error);
                } finally {
                    // Ocultar el spinner de carga
                    document.getElementById('loading-spinner').style.display = 'none';
                }
            }
        }
    </script>
</body>

</html>
