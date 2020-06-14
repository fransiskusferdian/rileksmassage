@extends('layouts.admin')
@section('content')
                <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <strong>Create Banner</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('storebanner') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="title" class="form-control-label">Title</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="title" value="{{ old('title') }}" placeholder="Text" class="form-control @error('title') is-invalid @enderror">
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
                                                rows="9" placeholder="" value="{{ old('summary') }}" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="link" class="form-control-label">link</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="link" value="{{ old('link') }}" placeholder="Text" class="form-control @error('link') is-invalid @enderror">
                                            @error('link')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="image"
                                            class=" form-control-label">Add image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-multiple-input" name="image" class="form-control-file">
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