/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });



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

notifyUser = (message) => {
    $('#notify-message').text(message);
    $('#notify-toast').toast('show');
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
                notifyUser("Somethign went wrong!");
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
                notifyUser("Somethign went wrong!");
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


