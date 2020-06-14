@extends('layouts.admin')

@push('after-style')
     <link rel="stylesheet" href="{{ asset('backend/assets/css/dataTables.bootstrap4.min.css') }}">
@endpush

@push('alert')

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
                 <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <strong class="card-title">Portfolio</strong>
                                <a href="{{ route('portfolio.create') }}" class="btn btn-primary">+ Create Portfolio</a>
                            </div>
                            <div class="card-body">
                                <table id="table" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>
                                                <a href="{{ route('portfolio.edit', $item->id) }}" class="btn btn-info">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="" data-href="{{ route('portfolio',$item->id) }}" class="btn btn-danger" data-toggle="modal"
                                                   data-target="#deletePortfolioModal"><i class="fa fa-trash"></i>
                                                </a>
                                                 <a href="{{ route('portfolio',$item->directory )}}" class="btn btn-warning">
                                                    <i class="fa fa-image"></i>
                                                </a>
                                            </td>
                                        </tr>
                                         @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- Delete Image Modal-->
                <div class="modal fade" id="deletePortfolioModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="" method="post" id="deleteportfolio">
                                <div class="modal-header d-flex align-item-start">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this Portfolio?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">All images will also deleted</div>
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
            <!-- .animated -->
       
@endsection

@push('after-script')
    
    <script src="{{ asset('backend/assets/js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
         $('#table').DataTable();
     });
    </script>
    <script>
        $('#deletePortfolioModal').on('show.bs.modal', function (e) {
            $(this).find('#deleteportfolio').attr('action', $(e.relatedTarget).data('href'));
        });
    </script>

@endpush