/**
 **************************[main.js]**************************
 **************************[main.js]**************************
 * Created by admin on 15.08.2017.
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});






//Submit comment on click
//------------------------
$('body').on('click', '#btn-submit-comment', function(){
	//console.log('***heyeyey');
	comment_submit($(this).data('comment-route'), $(this).data('video-id'));
});

//submit contact
$('body').on('click', '#btn-submit-contact', function(){
    //console.log('***heyeyey');
    sendContactForm($(this).data('contact-route'));
});

//update profile
$('body').on('click', '#btn-update-profile', function(){
    //console.log('***heyeyey');
    updateProfile($(this).data('update-profile'));
});

$('body').on('click', '#btn-update-password', function(){
    //console.log('***heyeyey');
    updatePassword($(this).data('update-password'));
});




//Add/remove like on click
//------------------------
$('body').on('click','.btn-like', function(){
	if(!$(this).hasClass('btn-on')){
		movie_like($(this));
	}else{
		movie_unlike($(this));
	}
});

//Add/remove like on click
//------------------------
$('body').on('click','.btn-dislike', function(){
	if(!$(this).hasClass('btn-on')){
		movie_dislike($(this));
	}else{
		movie_undislike($(this));
	}
});



function comment_submit(urlCommentRoute, videoId){

	if($('#comment-text').val() === '') {
		var curr_lang = $('body').data('active-lang');
		if(curr_lang=='en'){
    	swal("Hmm", "Need to write a review, try again pls", "error");
    }else{
    	swal("Hmm", "Vous devez écrire un commentaire, Veuillez réessayer", "error");
    }
	} else {

    var token = $('meta[name="csrf-token"]').attr('content');
    var fd = new FormData;

    fd.append('_token', token);
    fd.append('video_id', videoId);
    fd.append('text', $('#comment-text').val());

    $.ajax({
        type: 'POST',
        url: urlCommentRoute,
        contentType: false,
        processData: false,
        data: fd,
        dataType: 'html',
        success: function(data){
            var rep = JSON.parse(data);
            //alert('Comment successful send!');
           // console.log(rep);
            if(rep.user.name === ''){
                userName = rep.user.email;
            } else {
                userName = rep.user.name;
            }

            $('#comment-text').val('');
            $('#comment-rate-modal').modal('hide')
            $("#new-comment-section").append('<div class="comment"><div class="img-block"><img src="'+rep.user.picture+'" alt=""></div><div class="comment-text-block"><div class="comment-name">'+userName+'</div><p class="comment-text">'+rep.text+'</p></div></div>');
        },
        error: function (data) {
            alert('error '+data);
        }
    }); 
	}//end else
}

function movie_like($btn) { 
  var likesCount = $('#likes-count').text();
  var disLikesCount = $('#dislikes-count').text(); 
  var fd = new FormData;
		//...
  fd.append('_token', '{{csrf_token()}}');
  fd.append('id', $btn.data('video-id'));
  fd.append('type', 'like');

  //...
  $.ajax({
    type: 'POST',
    url: $btn.data('route-like'),
    contentType: false,
    processData: false,
    data: fd,
    dataType: 'html',
    success: function(data){ 
      $('#likes-count, #likes-count-top').text(+likesCount + 1);
      //...
      $('.btn-like').removeClass('btn-off').addClass('btn-on');
      $('.btn-dislike').removeClass('.btn-on').addClass('btn-off');

      var rep = JSON.parse(data);
      //console.log(rep);

      if(rep.check === 1){
          $('#dislikes-count').text(+disLikesCount - 1);
      } 
    },
    error: function(data){ 
    	var curr_lang = $('body').data('active-lang');
    	if(curr_lang=='en'){
    		swal("Oh no!", "Problem \"linking\" your movie. Please try again later", "error");
    	}else{
    		swal("Oh non!", "Difficulté a \"aimer\" votre video. Veuillez réessayer plus tard", "error");
    	}  
  	}
  });
}//like

function movie_unlike($btn) { 
  var likesCount = $('#likes-count').text(); 
  var fd = new FormData;

  fd.append('_token', '{{csrf_token()}}');
  fd.append('id', $btn.data('video-id'));

  $.ajax({
    type: 'POST',
    url: $btn.data('route-unlike'),
    contentType: false,
    processData: false,
    data: fd,
    dataType: 'html',
    success: function(data){ 
      $('#likes-count, #likes-count-top').text(+likesCount - 1);
      //...
      $('.btn-like').removeClass('btn-on').addClass('btn-off');
      // $('.btn-dislike').removeClass('.btn-off').addClass('btn-on');

      var rep = JSON.parse(data); 
    },
    error: function(data){ 
    	var curr_lang = $('body').data('active-lang');
    	if(curr_lang=='en'){
    		swal("Oh no!", "Problem \"unlinking\" your movie. Please try again later", "error");
    	}else{
    		swal("Oh non!", "Difficulté a annuler l'action \"aimer\" sur votre video. Veuillez réessayer plus tard", "error");
    	}   
    }
  });
}//unlike

function movie_dislike($btn) { 
  var likesCount = $('#likes-count').text();
  var disLikesCount = $('#dislikes-count').text(); 
  var fd = new FormData;

  fd.append('_token', '{{csrf_token()}}');
  fd.append('id', $btn.data('video-id'));
  fd.append('type', 'dislike');

  $.ajax({
    type: 'POST',
    url: $btn.data('route-like'),
    contentType: false,
    processData: false,
    data: fd,
    dataType: 'html',
    success: function(data){ 
      $('#dislikes-count').text(+disLikesCount + 1);
      //...
      $('.btn-dislike').removeClass('btn-off').addClass('btn-on');
      $('.btn-like').removeClass('btn-on').addClass('btn-off');
      var rep = JSON.parse(data);
      if(rep.check === 1){
          $('#likes-count, #likes-count-top').text(+likesCount - 1);
      } 
    },
    error: function(data){ 
    	var curr_lang = $('body').data('active-lang');
    	if(curr_lang=='en'){
    		swal("Oh no!", "Problem \"dislinking\" your movie. Please try again later", "error");
    	}else{
    		swal("Oh non!", "Difficulté a \"pas aimer\" votre video. Veuillez réessayer plus tard", "error");
    	}  
    }
  });
}//dislike

function movie_undislike($btn) { 
  var disLikesCount = $('#dislikes-count').text(); 
  var fd = new FormData;

  fd.append('_token', '{{csrf_token()}}');
  fd.append('id', $btn.data('video-id'));

  $.ajax({
    type: 'POST',
    url: $btn.data('route-unlike'),
    contentType: false,
    processData: false,
    data: fd,
    dataType: 'html',
    success: function(data){ 
      $('#dislikes-count').text(+disLikesCount - 1);
      $('.btn-dislike').removeClass('btn-on').addClass('btn-off');
      var rep = JSON.parse(data); 
    },
    error: function(data){
		  var curr_lang = $('body').data('active-lang');
		  if(curr_lang=='en'){
      	swal("Oh no!", "Couldn't \"undislike\" the movie. Please try again later", "error");
      }else{
      	swal("Oh no!", "Problème enlever l'action \"pas aimer\" sur le film. Veuillez réessayer plus tard", "error");
      }
    }
  });
}//undislike


//contact form
function sendContactForm(url) {

    var fd = new FormData;

    fd.append('_token', '{{csrf_token()}}');
    fd.append('category', $('#q-category').val());
    fd.append('email', $('#user-email').val());
    fd.append('message', $('#message-text').val());
    $('#btn-submit-contact').prop('disabled', true);


    $.ajax({
      type: 'POST',
      url: url,
      contentType: false,
      processData: false,
      data: fd,
      dataType: 'html',
      success: function(data){ 
      // var rep = JSON.parse(data);
	    var curr_lang = $('body').data('active-lang');
	    if(curr_lang=='en'){
      	swal("Cool!", "Email sent successfully", "success");
      }else{
      	swal("Superbe!", "L'email a été envoyé avec succès", "success");
      }
      $('#btn-submit-contact').prop('disabled', false);
    },
    error: function(data){
	    var curr_lang = $('body').data('active-lang');
	    if(curr_lang=='en'){
      	swal("Oh no!", "Email couldn't be sent. Please try again later", "success");
      }else{
      	swal("Oh non", "L'email n'a pas pu être envoyé. Veuillez réessayer plus tard", "success");
      }
      
      $('#btn-submit-contact').prop('disabled', false);
    }
});
}

//user profile
function updateProfile(url) {

    var fd = new FormData;

    fd.append('_token', '{{csrf_token()}}');
    fd.append('name', $('#user-name').val());
    fd.append('email', $('#user-email').val());
    fd.append('phone', $('#user-phone').val());
    $('#btn-update-profile').prop('disabled', true);


    $.ajax({
        type: 'POST',
        url: url,
        contentType: false,
        processData: false,
        data: fd,
        dataType: 'html',
        success: function(data){ 
		    	var curr_lang = $('body').data('active-lang');

		    	if(curr_lang=='en'){
	          // var rep = JSON.parse(data);
	          swal("Cool!", "Profile was successfully updated", "success"); 
	        }else{
	          swal("Superbe!", "Votre profil a été mis à jour avec succès", "success");
	        }
	        $('#btn-update-profile').prop('disabled', false);
        },
        error: function(data){
		    	var curr_lang = $('body').data('active-lang');
		    	if(curr_lang=='en'){
						swal("Oh no!", "Couldn't update your profile. Please try again later", "error");
		    	}else{
		    		swal("Oh non!", "Difficulté à mettre à jour votre profile. Veuillez réessayer plus tard", "error");

		    	}
            
          $('#btn-update-profile').prop('disabled', false);
        }
    });
}

function updatePassword(url) {

    var fd = new FormData;

    fd.append('_token', '{{csrf_token()}}');
    fd.append('oldpassword', $('#old-password').val());
    fd.append('newpassword', $('#new-password').val());
    $('#btn-update-password').prop('disabled', true);


    $.ajax({
        type: 'POST',
        url: url,
        contentType: false,
        processData: false,
        data: fd,
        dataType: 'html',
        success: function(data){ 
          var rep = JSON.parse(data);
          // console.log(rep.errors);
           
		    	var curr_lang = $('body').data('active-lang');
		    	if(curr_lang=='en'){
		    		swal(rep.title, rep.message, rep.type);
		    	}else{
		    		swal("Superbe!", "Votre mot de passe a été mis à jour", "error");
		    	}   
          $('#btn-update-password').prop('disabled', false);
        },
        error: function(data){ 
		    	var curr_lang = $('body').data('active-lang');
		    	if(curr_lang=='en'){
		    		swal("Oh no!", "Couldn't update your password. Please try again later", "error");
		    	}else{
		    		swal("Oh non!", "Difficulté à mettre à jour votre mot de passe. Veuillez réessayer plus tard", "error");
		    	}  
          $('#btn-update-password').prop('disabled', false);
        }
    });
}





/**
 *
 * SEARCH AUTOCOMPLETE
 * --------------------
*/
var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};


var states = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: '/search-data'
});
//states.initialize();

$('#frame-search .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states',
  // source: substringMatcher(states)
    source: states
});













// /**
//  *
//  * INITIALIZE INTRO BACKGROUND VIDEO
//  * ---------------------------------
// */
// $('#intro-video').YTPlayer({
//   fitToBackground: true,
//   videoId: 'oJxzaBDUEB8'//youtube video ID
// });













/**
 *
 * UPDATING PACKAGE
 * ---------------------------------
*/
$('body').on('click', '#link-update-package', function(){
	document.location.href = $(this).data('route');
});

















 