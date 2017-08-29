<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,500i,700,900" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('r/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('r/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('r/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('r/img/favicon/manifest.json')}}">
    <link rel="mask-icon" href="{{asset('r/img/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('r/css/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('r/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('r/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('r/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('r/css/media.css')}}">
    <link rel="stylesheet" href="{{asset('packages/sweetalert/sweetalert.css')}}">
    {{--<link rel="stylesheet" href="{{asset('r/css/less.css')}}">--}}
    <link rel="stylesheet" href="{{asset('r/css/passfield.min.css')}}">
    <link>
</head>
<body>
    @yield('layout')

</body>
    <script type="text/javascript" src="{{asset('r/js/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('r/js/passfield.min.js')}}"></script>
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js"></script>
    <script type="text/javascript" src="{{asset('r/js/slick.min.js')}}"></script>
    <!-- lightbox librairy
    <script type="text/javascript" src="{{asset('r/js/jquery.colorbox-min.js')}}"></script>
  -->

		<!-- auto complete librairy -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>

    <script type="text/javascript" src="{{asset('r/js/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('r/js/Google-play-menu.js')}}"></script>
    <script type="text/javascript" src="{{asset('packages/sweetalert/sweetalert.min.js')}}"></script>
    <script>


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

var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
  'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
  'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
  'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
  'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
  'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
  'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
  'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
  'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
];

$('#frame-search .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states',
  source: substringMatcher(states)
});










    
        var searchData;
        var searchList = '';

        $( '.search-list' ).click(function(event) {
            $( '#search-input' ).val(event.target.text);
            $('.search-list-block').css('display', 'none');

            console.log(event.target.text);
        });
        $( '#search-input' ).focus(function() {
            $('.search-list-block').css('display', 'block');
        });
        $('#search-input').focusout(function(){
            setTimeout(function(){ $('.search-list-block').css('display', 'none'); }, 300);
        });





        function getSearchData() {
            $.ajax({
                type: 'POST',
                url: '{{route('search-data')}}',
                contentType: false,
                processData: false,
                data: {},
                dataType: 'html',
                success: function(data){
                    var rep = JSON.parse(data);

                    searchData = rep;

                    rep.forEach(function(item, i, rep) {
                        searchList = searchList+'<li><a href="#">'+item.word+'</a></li>';
                    });

                    $(".search-list").html(searchList);


                },
                error: function(data){
                    console.log('error ' + data);
                }
            });
        }

        $(function(){
            $("#search-input").keyup(function(){
                var search = $("#search-input").val();


                var positiveArr = searchData.filter(function(word) {
                    if(word.word.toLowerCase().indexOf(search.toLowerCase()) === -1){
                        return false
                    } else {
                        return true;
                    }

                });
                var newSearchList = '';
                positiveArr.forEach(function(item, i, positiveArr) {
                    newSearchList = newSearchList+'<li><a href="#">'+item.word+'</a></li>';
                });

                $(".search-list").html(newSearchList);
                return false;
            });
        });


    </script>
@yield('scripts')
</html>