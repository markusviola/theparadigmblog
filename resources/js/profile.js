$("input.blog-title").focusout((elem) => {
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

$("#like-form").submit((e) => {
    $('#like-btn').prop('disabled', true);
    const likeInput = $(e.currentTarget).serializeArray();
    const likeStatus = likeInput.find(a => a.name == "likeStatus");
    const likeId = likeInput.find(a => a.name == "likeId");
    if(likeStatus.value == 0) {
        $.ajax({
            type:"POST",
            url: '/likes',
            data: $(e.currentTarget).serialize(),
            success: function(likeId) {
                const currLikeCount = $("#like-count").text();
                $("#like-count").text(parseInt(currLikeCount) + 1);
                $("#like-icon").removeClass("unliked-post");
                $("#like-icon").addClass("liked-post");
                $("#likeStatus").val(1);
                $("#likeId").val(likeId);
                $('#like-btn').prop('disabled', false);
            },
            error: function() {
                window.location = "/login#unauth-access"
            }
        });
    } else {
        $.ajax({
            type:"DELETE",
            url: '/likes/'+ likeId.value,
            data: $(e.currentTarget).serialize(),
            success: function() {
                const currLikeCount = $("#like-count").text();
                $("#like-count").text(parseInt(currLikeCount) - 1);
                $("#like-icon").removeClass("liked-post");
                $("#like-icon").addClass("unliked-post");
                $("#likeStatus").val(0);
                $('#like-btn').prop('disabled', false);
            },
            error: function() {
                window.location = "/login#unauth-access"
            }
        });
    }
    e.preventDefault();
})

$("#blog-form").submit((e) => {
    $.ajax({
        type:"PATCH",
        url: $(e.currentTarget).attr('action'),
        data: $(e.currentTarget).serialize(),
        success: function(response) {
            $("input.blog-title").data('current', response['blogTitle']);
            $("textarea.blog-desc").data('current', response['blogDesc']);
            notifyUser("Profile Updated!");
        },
        error: function() {
            notifyUser("Title & Description should be filled to save changes!");
        }
    });
    e.preventDefault();
});