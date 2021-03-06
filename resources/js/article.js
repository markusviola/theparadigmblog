initArticle = () => {

    var md = require('markdown-it')({
        html: true,
        linkify: true,
        typographer: true
    });

    renderMarkDown = (message, elemName) => {
        $(`#${elemName}`).html(md.render(message));
    }

    mirrorMarkDown = (elem) => {
        renderMarkDown($(elem).val(), "output-markdown");
    }

    mirrorTitle = (elem) => {
        if($(elem).val()) {
            renderMarkDown($(elem).val(), "output-title");
        } else {
            renderMarkDown("Make a good title...", "output-title");
        }
    }

    checkChanges = () => {
        $("#title").keyup();
        $("#body").keyup();
    }

    reloadElement = (element) => {
        $(element).load(`${location.href} ${element}>*`,'');
    }

    adjustCardHeight = () => {
        let height = $('#writing-card').height()*0.75;
        $('#output-markdown').height(height);
    }

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
        $('#button-progress').show(230);
        $.ajax({
            type:"POST",
            url: $(e.currentTarget).attr('action'),
            data: $(e.currentTarget).serialize(),
            success: function() {
                reloadElement('#post-comments');
                $('#comment-body').val('');
                $('#button-progress').hide(200);
            },
            error: function(xhr, status, error) {
                const errStatus = JSON.parse(xhr.status);
                const unAuth = '#unauth-access';
                if (errStatus == 401) {
                    window.location.href = `/login${unAuth}`;
                } else notifyUser("Please write your comment first");
                $('#button-progress').hide(200);
            }
        });
        e.preventDefault();
    });

    $("#confirm-delete-comment").submit((e) => {
        $('#comment-deletion-modal').modal('hide');
        $.ajax({
            type:"DELETE",
            url: $(e.currentTarget).attr('action'),
            data: $(e.currentTarget).serialize(),
            success: function(response) {
                if (response.onPost) {
                    reloadElement('#post-comments');
                } else {
                    reloadElement('#admin-post-comments');
                }
                notifyUser("Comment deleted successfully");
            },
            error: function(xhr, status, error) {
                var err = JSON.parse(xhr.responseText);
                console.log(err.message);
                notifyUser("Unable to delete comment.");
            }
        });
        e.preventDefault();
    });

    $("#confirm-delete-post").submit((e) => {
        $('#post-deletion-modal').modal('hide');
        let deleteHash = "#post-delete"
        let postControlPage = '/posts';
        let profilePage = '/profile'
        $.ajax({
            type:"DELETE",
            url: $(e.currentTarget).attr('action'),
            data: $(e.currentTarget).serialize(),
            success: function(response) {
                if (response.onPost) {
                    if (response.isAdmin) {
                        window.location.href = `${postControlPage}${deleteHash}`
                    } else {
                        window.location.href = `${profilePage}/${response.url}${deleteHash}`
                    }
                } else {
                    if (response.isAdmin) {
                        reloadElement('#admin-posts');
                    } else {
                        reloadElement('#profile-posts');
                    }
                    notifyUser("Article deleted!");
                }
            },
            error: function(xhr, status, error) {
                var err = JSON.parse(xhr.responseText);
                console.log(err.message);
                notifyUser("Unable to delete post.");
            }
        });
        e.preventDefault();
    });

}


