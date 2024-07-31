$(document).ready(function() {
    $('#image-generation-form').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'),  // Assuming the form action attribute contains the correct URL
            type: 'POST',
            data: formData,
            success: function(response) {
                if(response.image_url) {
                    $('#generated-image').html('<img src="' + response.image_url + '" alt="Generated Image" class="img-fluid">');
                } else {
                    $('#generated-image').html('<p>No image generated.</p>');
                }
            },
            error: function(xhr) {
                $('#generated-image').html('<p>An error occurred while generating the image.</p>');
            }
        });
    });
});
