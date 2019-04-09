<script>
    let drop = new Dropzone('#file', {
        createImageThumbnails: false,
        addRemoveLinks: true,
        url: '{{ route('upload.store', $file) }}',
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
        }
    })
</script>
