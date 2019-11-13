/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(document).ready(function(){

	//display the session messagges
	if(document.getElementById('session_message')){
		swal("Did it!", $('#session_message').text(), "success");
	}
	if(document.getElementById('session_errorMessage')){
		swal("Error!", $('#session_errorMessage').text(), "error");
	}
	//display message for each form action
	$('form').submit(function(){
		swal("Loading", "Processing the Action", "info");
	});

	//hide tweet
	$('.hideTweet').click(function(){
	//sweetAlert
	  var user_id = $(this).data('userId');
	  var tweet_id = $(this).data('tweetId');
	  var url = $(this).data('url');
	  var alert_ = $(this).data('alert');
	  swal({
			title: "Are you sure?",
			text: $(this).attr('title'),
			type: "warning",
			showCancelButton: true,
			confirmButtonText: "Yes, "+alert_,
			cancelButtonText: "No, Cancel!",
			closeOnConfirm: false,
			closeOnCancel: false
			}, function(isConfirm) {
			  if (isConfirm) {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					type:'POST',
					url: url+tweet_id+'/'+user_id,
					statusCode: {
						403: function (xhr) {
							swal("Unauthorized Action!", "No permissions", "error");
						}
					},
					success:function(data){
						swal({title: "Hidden!", text: "The tweet has been "+alert_+".", type: "success"},function(){
							location.reload();
						});
					 
					},
					onerror:function(e){
						console.log(e);
						swal("Something was wrong!", "The tweet couldn't be "+alert_+".", "error");
					},
				});
			} else {
				swal("Canceled", "the process was canceled!", "error");
				}
			});
	});
});