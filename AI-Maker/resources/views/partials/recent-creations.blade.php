<section id="gallery-section" class="gallery" aria-label="Galería de creaciones recientes">
    <div class="grid">
        @foreach ($images as $image)
            <figure>
                <img class="grid-image" alt="Creation {{ $loop->index + 1 }}" src="{{ $image->url }}">
            </figure>
        @endforeach
    </div>
</section>
