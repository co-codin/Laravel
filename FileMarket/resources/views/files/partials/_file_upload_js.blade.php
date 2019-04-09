<script>
    let drop = new Dropzone('#file', {
        createImageThumbnails: false,
        addRemoveLinks: true,
        url: '{{ route('upload.store', $file) }}',
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
        }
    })

    drop.on('success', function (file, response) {
        file.id = response.id
    })

    drop.on('removedfile', function (file) {
        axios.delete('/{{ $file->identifier }}/upload/' + file.id)
             .catch(function (error) {
                 drop.emit('addedfile', {
                     id: file.id,
                     name: file.name,
                     size: file.size
                 })
             })
    })
</script>
