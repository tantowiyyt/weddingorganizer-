@extends('admin')

	@section('title', 'Welcome to Admin Panel | Tambah Paket Wedding')

  @section('stylesheets')
    <script type="text/javascript" src="{{ asset('js/tinymce/jquery.tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.dev.js') }}"></script>
    <script>
      var editor_config = {
        path_absolute : "/",
        selector: "textarea.my-editor",
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
          var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
          var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

          var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }

          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
          });
        }
      };

      tinymce.init(editor_config);
    </script>
  @endsection

	@section('content')

	<div class="col-md-8">
       
       <h1>Tambah Paket Wedding</h1>          
       
       {!! Form::open(array('action' => 'WeddingPaketController@store', 'files' => true)) !!}

        {{ Form::label('jenis_paket', 'Nama Paket Wedding : ') }}
        {{ Form::text('jenis_paket', null, ['class' => 'form-control']) }}

        {{ Form::label('harga', 'Harga : ', ['style' => 'margin-top:20px']) }}
        {{ Form::number('harga', null, ['class' => 'form-control']) }}

        {{ Form::label('deskripsi', 'Deskripsi : ', ['style' => 'margin-top:20px']) }}
        {{ Form::textarea('deskripsi', null, ['class' => 'form-control my-editor']) }}

        {{ Form::submit('Tambah', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:20px; margin-bottom:30px']) }} 
	</div>   

	@endsection

	@section('scripts')
		
	@endsection