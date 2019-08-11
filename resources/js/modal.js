
prepareDeletion = (elem) => {
    const id = $(elem).data('id');
    const type = $(elem).data('type');
    const onPost = $(elem).data('on-post');
    const pageQuery = `?onPost=${(onPost == true ? 'true' : 'false')}`;
    console.log(type);

    switch (type) {
        case 'post':
            $('#confirm-delete-post')
            .attr('action', '/posts/' + id + pageQuery);
            break;
        case 'comment':
            $('#confirm-delete-comment')
            .attr('action', '/comments/' + id + pageQuery);
            break;
        default:
            console.log("Delete type not specified!")
            break;
    }
}
