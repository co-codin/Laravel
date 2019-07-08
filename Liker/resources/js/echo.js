Echo.channel('posts')
    .listen('PostCreated', (e) => {
        console.log(e);
    })
