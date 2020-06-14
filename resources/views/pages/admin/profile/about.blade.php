@extends('layouts.admin')
@push('after-style')
    <link rel="stylesheet" href="{{ asset('backend/assets/css/summernote-bs4.min.css') }}"> 
@endpush
@section('content')
                <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('success')}}
                                </div>
                            @elseif (Session::has('danger'))
                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('danger')}}
                                </div> 
                            @endif
                            <div class="card-header">
                                <strong>About</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('updateabout', $item->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @method('PUT')
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="title" class="form-control-label">Title</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="title" value="{{ $item->title }}" placeholder="Text" class="form-control @error('title') is-invalid @enderror">
                                            @error('titles')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="summary" class=" form-control-label">Summary</label>
                                        </div>
                                        <div class="col-12 col-md-9"><textarea name="summary" 
                                            rows="9" placeholder="" value="" class="form-control">{{ $item->summary}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="content" class=" form-control-label">Content</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="content" id="summernote" placeholder="" value="{{ old('content') }}" class="form-control">{{$item->content}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="image"
                                            class=" form-control-label">Change image</label>
                                        </div>
                                        <div class="col-sm-3"> 
                                            <img src="{{Storage::url($item->image)}}" class="img-thumbnail">
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-multiple-input" name="image" class="form-control-file mt-3">         
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </form>
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>
            <!-- .animated --> 
@push('after-script')
<script src="{{ asset('backend/assets/js/summernote-bs4.min.js') }}"></script>
<script>
    $(document).ready(function(){
    // Define function to open filemanager window
    var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
      var ui = $.summernote.ui;
      var button = ui.button({
        contents: '<i class="far fa-image"></i> ',
        tooltip: 'Insert image with filemanager',
        click: function() {

          lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
            lfmItems.forEach(function (lfmItem) {
              context.invoke('insertImage', lfmItem.url);
            });
          });

        }
      });
      return button.render();
    };

    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
    $('#summernote').summernote({
              height: 400,

       styleTags: [
    'p',
        { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
        'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
	],
      toolbar: [
        ['popovers', ['lfm']],
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ],
      buttons: {
      lfm: LFMButton
      }
    })
  });
</script>
@endpush
@endsection