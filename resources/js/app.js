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

$(document).on("click", ".delete-modal", (elem) => {
    const id = $(elem.currentTarget).data('id');
    const type = $(elem.currentTarget).data('type');
    switch (type) {
        case 'post':
            $('#delete-confirmation')
            .attr('action', '/posts/' + id);
            break;
        case 'comment':
            $('#delete-confirmation')
            .attr('action', '/comments/' + id);
            break;
        default:
            console.log("Delete type not specified!")
            break;
    }     
});

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

$("#banner-image").click((e) => {
    if (e.target.tagName === 'IMG' || e.target.tagName === 'DIV') {
        $("h2.upload-area")[0].click();  
    }
});

notifyUser = (message) => {
    $('#notify-message').text(message);
    $('#notify-toast').toast('show');
}

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


