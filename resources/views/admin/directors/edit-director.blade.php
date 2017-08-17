@extends('layouts.admin')

@section('title', 'Edit Director')

@section('content-header', 'Edit director')

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li><a href="{{route('admin.directors')}}"><i class="fa fa-suitcase"></i>Directors</a></li>
    <li class="active">Edit director</li>
@endsection

@section('content')

    @include('notification.notify')

    <div class="row">

        <div class="col-md-10">

            <div class="box box-primary">

                <div class="box-header label-primary">
                    <b style="font-size:18px;">Edit director</b>
                    <a href="{{route('admin.add.director')}}" class="btn btn-default pull-right">Add director</a>
                </div>

                <form class="form-horizontal" method="POST" enctype="multipart/form-data" role="form">

                    <div class="box-body">

                        <input type="hidden" id="directorid" name="id" value="{{$director->id}}">

                        <div class="form-group">
                            <label for="name" class="col-sm-1 control-label">{{tr('name')}}</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" value="{{$director->name}}" id="name" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bio" class="col-sm-1 control-label">BIO</label>
                            <div class="col-sm-10">
                                <textarea type="text" required class="form-control" id="bio" name="bio">{{$director->bio}}</textarea>
                            </div>
                        </div>


                    </div>


                </form>

            </div>

        </div>

    </div>
    <div class="box-footer">
        <progress id="progressbar" value="0" max="100"></progress>
        <button class="btn btn-primary btn-info-full" id="finishBtn" onclick="editDirector()">Save</button>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">
        function editDirector() {
            var fd = new FormData;

            fd.append('_token', $('#csrf-token').val());
            fd.append('name', $('#name').val());
            fd.append('bio', $('#bio').val());
            fd.append('id', $('#directorid').val());

            //fd.append('images', dropImages.join(';'));
            var progressBar = $('#progressbar');

            $.ajax({
                type: 'POST',
                url: 'update-director',
                contentType: false,
                processData: false,
                data: fd,
                dataType: 'html',
                xhr: function(){
                    var xhr = $.ajaxSettings.xhr(); // получаем объект XMLHttpRequest
                    xhr.upload.addEventListener('progress', function(evt){ // добавляем обработчик события progress (onprogress)
                        if(evt.lengthComputable) { // если известно количество байт
                            // высчитываем процент загруженного
                            var percentComplete = Math.ceil(evt.loaded / evt.total * 100);
                            // устанавливаем значение в атрибут value тега <progress>
                            // и это же значение альтернативным текстом для браузеров, не поддерживающих <progress>
                            progressBar.val(percentComplete).text('Uploaded ' + percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                success: function(data){
                    //var rep = JSON.parse(data);
                    //console.log(rep);
                    alert('Director successful edited!');
                },
                error: function (data) {
                    alert('error '+data);
                }
            });
        }

        function previewUploadedPhoto(controlID, previewID) {
            var imgWidth = 300;
            var imgHeight = 300;
            var imgSize = '300x300';
            if (document.getElementById(controlID).files) {
                var file = document.getElementById(controlID).files[0];
                if (file.type.match("image.*")) {
                    if (parseInt(file.size) <= 4 * 1024 * 1024) {
                        var reader = new FileReader();
                        reader.onload = (function (theFile) {
                            return function (e) {
                                var img = new Image();
                                img.src = e.target.result;

                                img.onload = function () {
                                    if (img.width < imgWidth || img.height < imgHeight) {
                                        $("#" + previewID).html("<b class='alert-danger'>The image size should be "+imgSize+"</b>");
                                        file.value = null;
                                    }
                                    else {
                                        $("#" + previewID).html('<img class="thumb img-responsive" src="' + e.target.result + '" title="' + theFile.name + '" style="max-width:200px" />');
                                    }
                                };
                            };
                        })(file);
                        reader.readAsDataURL(file);
                    }
                    else {
                        $("#" + previewID).html("<b class='alert-danger'>The maximum image size is 4 MB</b>");
                        file.value = null;
                    }
                }
                else {
                    $("#" + previewID).html("<b class='alert-danger'>This file is not an image. please choose the image</b>");
                    file.value = null;
                }
            }
        }

    </script>






@endsection