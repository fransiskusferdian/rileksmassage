@extends('layouts.admin')

@push('after-style')
    <style>
          .img-wrap {
            position: relative;
            display: inline-block;
        }

        .img-wrap .close {
            position: absolute;
            top: 2px;
            right: 2px;
            z-index: 100;
            background-color: #FFF;
            padding: 5px 5px 5px;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            opacity: .2;
            text-align: center;
            font-size: 18px;
            line-height: 10px;
            border-radius: 50%;
        }

        .img-wrap:hover .close {
            opacity: 1;
        }

    </style>    
@endpush

@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
     </div>
@elseif (Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        {{Session::get('danger')}}
     </div> 
@endif
       <!-- Animated -->
            <div class="animated fadeIn gallery-section">
                <div class="row mb-5">
                    <div class="col">
                        <a href="" data-toggle="modal" data-target="#addImagesModal" class="btn btn-primary">Add
                            Image/s</a>
                    </div>
                </div>

                <div class="row gallery-grid justify-content-center">
                    @foreach ($items as $item)
                    <div class="col-xl-3 col-sm-6 gallery-item mt-3">
                        <div class="img-wrap">
                            <a href="" data-href="{{ route('delete',$item->id) }}" 
                                style="text-decoration : none; color : inherit;" data-toggle="modal"
                                data-target="#deleteImageModal"><span class="close">X<i
                                        class="far fa-trash-alt"></i></span>
                            </a>
                            <img src="{{ Storage::url($item->image) }}" alt="">
                        </div>
                    </div>
                     @endforeach
                </div>    
               

                <!--Add Images Modal -->
                <div class="modal fade" id="addImagesModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header d-flex align-item-start">
                              <h4 class="Add Images" id="staticBackdropLabel">Add Images</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                         </div>
                       <form action="{{ route('addimages', $directory) }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        @csrf
                        @method('put')
                       <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class=" form-group row">
                                        <div class="col-sm-12">
                                            <h5>Images</h5>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="images" name="images[]" multiple>
                                                {{-- <input type="file" id="file-multiple-input" name="images[]" multiple class="form-control-file"> --}}
                                                <label class="custom-file-label" for="images">Choose files</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                  </div>
                </div>
                 <!-- End Add Images -->


                <!-- Delete Image Modal-->
                <div class="modal fade" id="deleteImageModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="" method="post" id="deleteimage">
                                <div class="modal-header d-flex align-item-start">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this Image?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Are you sure want to delete this image?</div>
                                <div class="modal-footer">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" type="submit">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Delete Image Modal-->
            </div>    

@endsection

@push('after-script')
      <script>
        $('#deleteImageModal').on('show.bs.modal', function (e) {
            $(this).find('#deleteimage').attr('action', $(e.relatedTarget).data('href'));
        });
      </script>
@endpush