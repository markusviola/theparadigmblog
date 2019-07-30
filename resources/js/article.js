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
            success: function(response) {
                const currLikeCount = $("#like-count").text();
                $("#like-count").text(parseInt(currLikeCount) + 1);
                $("#like-icon").removeClass("unliked-post");
                $("#like-icon").addClass("liked-post");
                $("#likeStatus").val(1);
                $("#likeId").val(response.like_id);
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

$("#comment-form").submit((e) => {
    $.ajax({
        type:"POST",
        url: $(e.currentTarget).attr('action'),
        data: $(e.currentTarget).serialize(),
        success: function(response) {
            reloadElement('#post-comments')
            // console.log(response);
            // $().load(location.href + '#post-comments');
            
            // $(commentList).fadeOut(500, function(){
            //     commentList.html(response.success).fadeIn().delay(2000);

            // });
        },
        error: function(xhr, status, error) {
            var err = JSON.parse(xhr.responseText);
            console.log(err.message);
            // notifyUser("Title or Description should not exceed more than 250 characters!");
        }
    });
    e.preventDefault();
});

