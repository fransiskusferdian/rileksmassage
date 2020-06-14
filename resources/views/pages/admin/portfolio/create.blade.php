@extends('layouts.admin')
@section('content')
                <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add Portfolio</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('portfolio.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="name" class="form-control-label">Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Text" class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="category_id"
                                                class=" form-control-label">Category</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="sub_category_id" class="form-control">
                                                <option value="">Please select</option>
                                                @foreach ($categories as $category)
                                                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="content" class=" form-control-label">Content</label>
                                        </div>
                                        <div class="col-12 col-md-9"><textarea name="content" 
                                                rows="9" placeholder="" value="{{ old('content') }}" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="images"
                                                class=" form-control-label">Add images</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-multiple-input" name="images[]" multiple class="form-control-file">
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