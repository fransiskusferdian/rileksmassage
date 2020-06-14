@extends('layouts.admin')
@section('content')
                <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add Team</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('storeteam') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="name" class="form-control-label">Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="position" class="form-control-label">Position</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="position" value="{{ old('position') }}" class="form-control @error('position') is-invalid @enderror">
                                            @error('position')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">                                      
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                </div>
                                                <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                                                @error('email')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                </div>
                                                <input type="text" name="site" value="{{ old('site') }}" class="form-control @error('site') is-invalid @enderror" placeholder="Site" aria-label="Site" aria-describedby="basic-addon1">
                                                @error('site')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">                                        
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                </div>
                                                <input type="text" name="instagram" value="{{ old('instagram') }}" class="form-control @error('instagram') is-invalid @enderror" placeholder="Instagram" aria-label="Instagram" aria-describedby="basic-addon1">
                                                @error('instagram')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">                                   
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                </div>
                                                <input type="text" name="facebook" value="{{ old('facebook') }}" class="form-control @error('facebook') is-invalid @enderror" placeholder="Facebook" aria-label="Facebook" aria-describedby="basic-addon1">
                                                @error('facebook')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="col col-md-3"></div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                </div>
                                                <input type="text" name="twitter" value="{{ old('twitter') }}" class="form-control @error('twitter') is-invalid @enderror" placeholder="Twitter" aria-label="Twitter" aria-describedby="basic-addon1">
                                                @error('twitter')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">           
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                </div>
                                                <input type="text" name="linkedin" value="{{ old('linkedin') }}" class="form-control @error('linkedin') is-invalid @enderror" placeholder="Linkedin" aria-label="Linkedin" aria-describedby="basic-addon1">
                                                @error('linkedin')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                </div>
                                                <input type="text" name="youtube" value="{{ old('youtube') }}" class="form-control @error('youtube') is-invalid @enderror" placeholder="Youtube" aria-label="Youtube" aria-describedby="basic-addon1">
                                                @error('youtube')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                </div>
                                                <input type="text" name="otherlink" value="{{ old('otherlink') }}" class="form-control @error('otherlink') is-invalid @enderror" placeholder="Otherlink" aria-label="Otherlink" aria-describedby="basic-addon1">
                                                @error('otherlink')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="intro" class=" form-control-label">Intro</label>
                                        </div>
                                        <div class="col-12 col-md-9"><textarea name="intro" 
                                                rows="9" placeholder="" value="{{ old('intro') }}" class="form-control"></textarea>
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