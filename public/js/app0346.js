function comment_submit(e,t){if(""===$("#comment-text").val()){var a=$("body").data("active-lang");"en"==a?swal("Hmm","Need to write a review, try again pls","error"):swal("Hmm","Vous devez écrire un commentaire, Veuillez réessayer","error")}else{var n=$('meta[name="csrf-token"]').attr("content"),o=new FormData;o.append("_token",n),o.append("video_id",t),o.append("text",$("#comment-text").val()),$.ajax({type:"POST",url:e,contentType:!1,processData:!1,data:o,dataType:"html",success:function(e){var t=JSON.parse(e);""===t.user.name?userName=t.user.email:userName=t.user.name,$("#comment-text").val(""),$("#comment-rate-modal").modal("hide"),$("#new-comment-section").prepend('<div class="comment"><div class="img-block"><img src="'+t.user.picture+'" alt=""></div><div class="comment-text-block"><div class="comment-name">'+userName+'</div><p class="comment-text">'+t.text+" just now</p></div></div>")},error:function(e){alert("error "+e)}})}}function movie_like(e){var t=$("#likes-count").text(),a=$("#dislikes-count").text(),n=new FormData;n.append("_token","{{csrf_token()}}"),n.append("id",e.data("video-id")),n.append("type","like"),$.ajax({type:"POST",url:e.data("route-like"),contentType:!1,processData:!1,data:n,dataType:"html",success:function(e){$("#likes-count, #likes-count-top").text(+t+1),$(".btn-like").removeClass("btn-off").addClass("btn-on"),$(".btn-dislike").removeClass(".btn-on").addClass("btn-off");var n=JSON.parse(e);1===n.check&&$("#dislikes-count").text(+a-1)},error:function(e){var t=$("body").data("active-lang");"en"==t?swal("Oh no!",'Problem "linking" your movie. Please try again later',"error"):swal("Oh non!",'Difficulté a "aimer" votre video. Veuillez réessayer plus tard',"error")}})}function movie_unlike(e){var t=$("#likes-count").text(),a=new FormData;a.append("_token","{{csrf_token()}}"),a.append("id",e.data("video-id")),$.ajax({type:"POST",url:e.data("route-unlike"),contentType:!1,processData:!1,data:a,dataType:"html",success:function(e){$("#likes-count, #likes-count-top").text(+t-1),$(".btn-like").removeClass("btn-on").addClass("btn-off");JSON.parse(e)},error:function(e){var t=$("body").data("active-lang");"en"==t?swal("Oh no!",'Problem "unlinking" your movie. Please try again later',"error"):swal("Oh non!",'Difficulté a annuler l\'action "aimer" sur votre video. Veuillez réessayer plus tard',"error")}})}function movie_dislike(e){var t=$("#likes-count").text(),a=$("#dislikes-count").text(),n=new FormData;n.append("_token","{{csrf_token()}}"),n.append("id",e.data("video-id")),n.append("type","dislike"),$.ajax({type:"POST",url:e.data("route-like"),contentType:!1,processData:!1,data:n,dataType:"html",success:function(e){$("#dislikes-count").text(+a+1),$(".btn-dislike").removeClass("btn-off").addClass("btn-on"),$(".btn-like").removeClass("btn-on").addClass("btn-off");var n=JSON.parse(e);1===n.check&&$("#likes-count, #likes-count-top").text(+t-1)},error:function(e){var t=$("body").data("active-lang");"en"==t?swal("Oh no!",'Problem "dislinking" your movie. Please try again later',"error"):swal("Oh non!",'Difficulté a "pas aimer" votre video. Veuillez réessayer plus tard',"error")}})}function movie_undislike(e){var t=$("#dislikes-count").text(),a=new FormData;a.append("_token","{{csrf_token()}}"),a.append("id",e.data("video-id")),$.ajax({type:"POST",url:e.data("route-unlike"),contentType:!1,processData:!1,data:a,dataType:"html",success:function(e){$("#dislikes-count").text(+t-1),$(".btn-dislike").removeClass("btn-on").addClass("btn-off");JSON.parse(e)},error:function(e){var t=$("body").data("active-lang");"en"==t?swal("Oh no!",'Couldn\'t "undislike" the movie. Please try again later',"error"):swal("Oh no!",'Problème enlever l\'action "pas aimer" sur le film. Veuillez réessayer plus tard',"error")}})}function sendContactForm(e){var t=new FormData;t.append("_token","{{csrf_token()}}"),t.append("category",$("#q-category").val()),t.append("email",$("#user-email").val()),t.append("message",$("#message-text").val()),$("#btn-submit-contact").prop("disabled",!0),$.ajax({type:"POST",url:e,contentType:!1,processData:!1,data:t,dataType:"html",success:function(e){var t=$("body").data("active-lang");"en"==t?swal("Cool!","Email sent successfully","success"):swal("Superbe!","L'email a été envoyé avec succès","success"),$("#btn-submit-contact").prop("disabled",!1)},error:function(e){var t=$("body").data("active-lang");"en"==t?swal("Oh no!","Email couldn't be sent. Please try again later","success"):swal("Oh non","L'email n'a pas pu être envoyé. Veuillez réessayer plus tard","success"),$("#btn-submit-contact").prop("disabled",!1)}})}function updateProfile(e){var t=new FormData;t.append("_token","{{csrf_token()}}"),t.append("name",$("#user-name").val()),t.append("email",$("#user-email").val()),t.append("phone",$("#user-phone").val()),$("#btn-update-profile").prop("disabled",!0),$.ajax({type:"POST",url:e,contentType:!1,processData:!1,data:t,dataType:"html",success:function(e){var t=$("body").data("active-lang");"en"==t?swal("Cool!","Profile was successfully updated","success"):swal("Superbe!","Votre profil a été mis à jour avec succès","success"),$("#btn-update-profile").prop("disabled",!1)},error:function(e){var t=$("body").data("active-lang");"en"==t?swal("Oh no!","Couldn't update your profile. Please try again later","error"):swal("Oh non!","Difficulté à mettre à jour votre profile. Veuillez réessayer plus tard","error"),$("#btn-update-profile").prop("disabled",!1)}})}function updatePassword(e){var t=new FormData;t.append("_token","{{csrf_token()}}"),t.append("oldpassword",$("#old-password").val()),t.append("newpassword",$("#new-password").val()),$("#btn-update-password").prop("disabled",!0),$.ajax({type:"POST",url:e,contentType:!1,processData:!1,data:t,dataType:"html",success:function(e){var t=JSON.parse(e),a=$("body").data("active-lang");"en"==a?swal(t.title,t.message,t.type):swal("Superbe!","Votre mot de passe a été mis à jour","error"),$("#btn-update-password").prop("disabled",!1)},error:function(e){var t=$("body").data("active-lang");"en"==t?swal("Oh no!","Couldn't update your password. Please try again later","error"):swal("Oh non!","Difficulté à mettre à jour votre mot de passe. Veuillez réessayer plus tard","error"),$("#btn-update-password").prop("disabled",!1)}})}$('a[href*="#"]').not('[href="#"]').not('[href="#0"]').not('[data-toggle="collapse"]').click(function(e){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var t=$(this.hash);t=t.length?t:$("[name="+this.hash.slice(1)+"]"),t.length&&(e.preventDefault(),$("html, body").animate({scrollTop:t.offset().top},1e3,function(){var e=$(t);return e.focus(),!e.is(":focus")&&(e.attr("tabindex","-1"),void e.focus())}))}}),function(){"use strict";function e(){function e(e,t,a,n){var o=n[1],r=n[0],s=o[a.matchPassword],i=function(){return s.$viewValue};e.$watch(i,function(){r.$$parseAndValidate()}),r.$validators?r.$validators.passwordMatch=function(e){return!e&&!s.$modelValue||e===s.$modelValue}:r.$parsers.push(function(e){return r.$setValidity("passwordMatch",!e&&!s.$viewValue||e===s.$viewValue),e}),s.$parsers.push(function(e){return r.$setValidity("passwordMatch",!e&&!r.$viewValue||e===r.$viewValue),e})}var t=["^ngModel","^form"];return{restrict:"A",require:t,link:e}}angular.module("ngPassword",[]).directive("matchPassword",e),angular.module("angular.password",["ngPassword"]),angular.module("angular-password",["ngPassword"]),"object"==typeof module&&"function"!=typeof define&&(module.exports=angular.module("ngPassword"))}(),$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$("body").on("click","#btn-submit-comment",function(){comment_submit($(this).data("comment-route"),$(this).data("video-id"))}),$("body").on("click","#btn-submit-contact",function(){sendContactForm($(this).data("contact-route"))}),$("body").on("click","#btn-update-profile",function(){updateProfile($(this).data("update-profile"))}),$("body").on("click","#btn-update-password",function(){updatePassword($(this).data("update-password"))}),$("body").on("click",".btn-like",function(){$(this).hasClass("btn-on")?movie_unlike($(this)):movie_like($(this))}),$("body").on("click",".btn-dislike",function(){$(this).hasClass("btn-on")?movie_undislike($(this)):movie_dislike($(this))});var substringMatcher=function(e){return function(t,a){var n;n=[],substrRegex=new RegExp(t,"i"),$.each(e,function(e,t){substrRegex.test(t)&&n.push(t)}),a(n)}},states=new Bloodhound({datumTokenizer:Bloodhound.tokenizers.whitespace,queryTokenizer:Bloodhound.tokenizers.whitespace,prefetch:"/search-data"});$("#frame-search .typeahead").typeahead({hint:!0,highlight:!0,minLength:1},{name:"states",source:states}),$("body").on("click","#link-update-package",function(){document.location.href=$(this).data("route")});var ukumbitvApp=angular.module("ukumbitvApp",["ngAnimate"]);ukumbitvApp.config(["$interpolateProvider",function(e){e.startSymbol("<%"),e.endSymbol("%>")}]),ukumbitvApp.factory("servMovies",["$http","$log",function(e,t){var a=function(){return e.get(document.location.origin+"/get-all-movies",{cache:!0})};return{get:a}}]),ukumbitvApp.filter("searchForMovies",function(){return function(e,t){if(!t)return e;var a=[];return t=t.toLowerCase(),angular.forEach(e,function(e){e.title.toLowerCase().indexOf(t)!==-1&&a.push(e)}),a}}),ukumbitvApp.controller("InstantSearchController",["$scope","servMovies","$log",function(e,t,a){a.log("...servMovies=",t.get()),t.get().then(function(t){a.log(">>>response=",t),e.movies=t.data},function(e){a.log(">>>response(error)=",e)})}]);var validationApp=angular.module("validationApp",["ngPassword"]);validationApp.controller("mainController",["$scope",function(e){e.submitForm=function(){}}]),function(){var e=document.getElementById("morphsearch");if(null!==e){var t=e.querySelector("input.morphsearch-input"),a=e.querySelector("span.morphsearch-close"),n=isAnimating=!1,o=function(a){if("focus"===a.type.toLowerCase()&&n)return!1;morphsearch.getBoundingClientRect();n?(classie.remove(e,"open"),""!==t.value&&setTimeout(function(){classie.add(e,"hideInput"),setTimeout(function(){classie.remove(e,"hideInput"),t.value=""},300)},500),t.blur()):classie.add(e,"open"),n=!n};t.addEventListener("focus",o),a.addEventListener("click",o),document.addEventListener("keydown",function(e){var t=e.keyCode||e.which;27===t&&n&&o(e)}),e.querySelector('button[type="submit"]').addEventListener("click",function(e){e.preventDefault()})}}();