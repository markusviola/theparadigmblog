

initProfile = () => {
    $("input.blog-title").focusout((elem) => {
        console.log(elem);
        if ($(elem.currentTarget).val().trim() != $(elem.currentTarget).data('current')) {
            $("#blog-form").submit();
        }
    });

    $("textarea.blog-desc").focusout((elem) => {
        if ($(elem.currentTarget).val().trim() != $(elem.currentTarget).data('current')) {
            $("#blog-form").submit();
        }
    });

    $("#banner-image").click((elem) => {
        if (elem.target.tagName === 'IMG' || elem.target.tagName === 'DIV') {
            $("h2.upload-area")[0].click();
        }
    });

    $("#blog-form").submit((e) => {
        $.ajax({
            type:"PATCH",
            url: $(e.currentTarget).attr('action'),
            data: $(e.currentTarget).serialize(),
            success: function(response) {
                $("input.blog-title").data('current', response.blogTitle);
                $("textarea.blog-desc").data('current', response.blogDesc);
                notifyUser("Profile Updated!");
            },
            error: function() {
                notifyUser("Title or Description should not exceed more than 250 characters!");
            }
        });
        e.preventDefault();
    });
}

