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
                    <a href="{{url('/admin/createbanner')}}" class="btn btn-primary">Add Banner</a>
                    </div>
                </div>

                <div class="row gallery-grid justify-content-center">
                    @foreach ($items as $item)
                        <div class="card mr-2" style="width: 18rem;">
                            <img src="{{Storage::url($item->image)}}" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->title}}</h5>
                                <p class="card-text">{{$item->summary}}
                                </p>
                                <a href="" data-href="{{route('deletebanner', $item->id)}}" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteBannerModal"><i class="fa fa-trash"></i>
                                </a>
                                 <a href="{{route('editbanner', $item->id)}}" class="btn btn-warning">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </div>
                        </div>
                     @endforeach
                </div>    

                <!-- Delete Image Modal-->
                <div class="modal fade" id="deleteBannerModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="" method="post" id="deletebanner">
                                <div class="modal-header d-flex align-item-start">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this Banner?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Are you sure want to delete this Banner?</div>
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
            </>    

@endsection

@push('after-script')
      <script>
        $('#deleteBannerModal').on('show.bs.modal', function (e) {
            $(this).find('#deletebanner').attr('action', $(e.relatedTarget).data('href'));
        });
      </script>
@endpush