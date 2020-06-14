@extends('layouts.admin')
@section('content')
                <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <strong>Edit Banner</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('updatebanner', $banner->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @method('PUT')
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="title" class="form-control-label">Title</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="title" value="{{ $banner->title }}" placeholder="Text" class="form-control @error('title') is-invalid @enderror">
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
                                            rows="9" placeholder="" value="" class="form-control">{{ $banner->summary}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="link" class="form-control-label">link</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="link" value="{{ $banner->link }}" class="form-control @error('link') is-invalid @enderror">
                                            @error('link')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                         <div class="col col-md-3"><label for="image"
                                            class=" form-control-label">Change image</label>
                                        </div>
                                        <div class="col-sm-3"> 
                                            <img src="{{Storage::url($banner->image)}}" class="img-thumbnail">
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-multiple-input" name="image" class="form-control-file mt-3">         
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
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
       
@endsection