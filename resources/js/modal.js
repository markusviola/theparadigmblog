$(".delete-modal").click((elem) => {
    const id = $(elem.currentTarget).data('id');
    const type = $(elem.currentTarget).data('type');
    const onPost = $(elem.currentTarget).data('on-post');
    const pageQuery = `?onPost=${(onPost == true ? 'true' : 'false')}`; 
    switch (type) {
        case 'post':
            $('#delete-confirmation')
            .attr('action', '/posts/' + id + pageQuery);
            break;
        case 'comment':
            $('#delete-confirmation')
            .attr('action', '/comments/' + id + pageQuery);
            break;
        default:
            console.log("Delete type not specified!")
            break;
    }     
});
