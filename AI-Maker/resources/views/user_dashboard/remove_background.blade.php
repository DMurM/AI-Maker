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
                        <h1 class="h2">Background Remover</h1>
                        <p>Automatically remove the background and generate an ideal background based on templates or text.</p>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Credits: {{ Auth::user()->credit }}</button>
                    </div>
                </header>
                <div class="row mb-4">
                    <div class="col-md-8">
                        <form id="upload-form" action="#" method="POST" enctype="multipart/form-data" class="w-100">
                            @csrf
                            <div class="upload-area text-center p-5 mb-3" style="border: 1px dashed #ccc;" onclick="document.getElementById('image-input').click()">
                                <input type="file" id="image-input" name="image" style="display: none;" onchange="displayUploadedFile(event)">
                                <i class="fas fa-upload fa-2x mb-2"></i>
                                <p>Click to upload or drag and drop</p>
                            </div>
                            <div class="row">
                                <div class="col-6 d-flex flex-column align-items-center">
                                    <img id="uploaded-image" src="" alt="Uploaded Image" class="image mb-2">
                                </div>
                                <div class="col-6 d-flex flex-column align-items-center">
                                    <img id="processed-image" src="" alt="Processed Image" class="image mb-2">
                                    <div id="loading-spinner" class="spinner-border text-primary" role="status" style="display: none;">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <a id="download-btn" href="#" class="btn btn-success mt-2" download="output.png" style="display: none;">Download</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="config-panel">
                            <div class="form-group">
                                <label for="output-name">Output Name:</label>
                                <input type="text" id="output-name" name="output_name" class="form-control" placeholder="output">
                            </div>
                            <div class="form-group">
                                <label for="output-format">Output Format:</label>
                                <select id="output-format" name="output_format" class="form-control">
                                    <option value="png">PNG</option>
                                    <option value="jpg">JPG</option>
                                    <option value="jpeg">JPEG</option>
                                    <option value="bmp">BMP</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alpha-matting">Alpha Matting:</label>
                                <select id="alpha-matting" name="alpha_matting" class="form-control">
                                    <option value="false">No</option>
                                    <option value="true">Yes (recommended for detailed edges)</option>
                                </select>
                            </div>
                            <div class="text-center mt-3">
                                <button type="button" id="remove-bg-btn" class="btn btn-danger" onclick="removeBackground()" disabled>Remove Background</button>
                            </div>
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
        let uploadedFile;

        function displayUploadedFile(event) {
            uploadedFile = event.target.files[0];
            if (uploadedFile) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('uploaded-image').src = e.target.result;
                    document.getElementById('uploaded-image').style.display = 'block';
                    document.getElementById('remove-bg-btn').disabled = false;
                };
                reader.readAsDataURL(uploadedFile);
            }
        }

        async function removeBackground() {
            if (!uploadedFile) return;

            document.getElementById('loading-spinner').style.display = 'block';

            const formData = new FormData();
            formData.append('file', uploadedFile);

            const outputName = document.getElementById('output-name').value || 'output';
            const outputFormat = document.getElementById('output-format').value;
            const alphaMatting = document.getElementById('alpha-matting').value === 'true';

            formData.append('output_name', `${outputName}.${outputFormat}`);
            formData.append('output_format', outputFormat);
            formData.append('alpha_matting', alphaMatting);

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
                document.getElementById('processed-image').src = url;
                document.getElementById('processed-image').style.display = 'block';

                const downloadBtn = document.getElementById('download-btn');
                downloadBtn.href = url;
                downloadBtn.download = `${outputName}.${outputFormat}`;
                downloadBtn.style.display = 'block';
            } catch (error) {
                console.error('There was a problem with your fetch operation:', error);
            } finally {
                document.getElementById('loading-spinner').style.display = 'none';
            }
        }
    </script>
</body>

</html>
