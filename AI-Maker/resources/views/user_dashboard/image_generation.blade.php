<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Generation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Image Generation</h1>
        <form id="image-generation-form">
            @csrf
            <div class="form-group">
                <label for="prompt">Prompt</label>
                <input type="text" class="form-control" id="prompt" name="prompt" required>
            </div>
            <div class="form-group">
                <label for="negative_prompt">Negative Prompt</label>
                <input type="text" class="form-control" id="negative_prompt" name="negative_prompt">
            </div>
            <div class="form-group">
                <label for="style_selections">Style Selections</label>
                <select class="form-control" id="style_selections" name="style_selections[]" multiple>
                    <option value="Fooocus V2">Fooocus V2</option>
                    <option value="Fooocus Enhance">Fooocus Enhance</option>
                    <option value="Fooocus Sharp">Fooocus Sharp</option>
                </select>
            </div>
            <div class="form-group">
                <label for="performance_selection">Performance Selection</label>
                <select class="form-control" id="performance_selection" name="performance_selection">
                    <option value="Speed">Speed</option>
                    <option value="Quality">Quality</option>
                </select>
            </div>
            <div class="form-group">
                <label for="aspect_ratios_selection">Aspect Ratios Selection</label>
                <input type="text" class="form-control" id="aspect_ratios_selection" name="aspect_ratios_selection" required>
            </div>
            <div class="form-group">
                <label for="image_number">Image Number</label>
                <input type="number" class="form-control" id="image_number" name="image_number" required>
            </div>
            <button type="submit" class="btn btn-primary">Generate Image</button>
        </form>
        <div id="generated-image" class="mt-4"></div>
    </div>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/image_generation.js') }}"></script>
</body>
</html>
