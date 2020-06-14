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
                                <strong class="card-title">Category</strong>
                                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newCategoryModal">+ New Category</a>
                            </div>
                            <div class="card-body">
                                <table id="table" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td value="{{ $item->name }}">{{ $item->name }}</td>
                                            <td>
                                                <a href="" data-href="{{ route('category.update',$item->id) }}" data-value="{{$item->name}}" class="btn btn-info"  data-toggle="modal"
                                                   data-target="#updateCategoryModal">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="" data-href="{{ route('category.destroy',$item->id) }}" class="btn btn-danger" data-toggle="modal"
                                                   data-target="#deleteCategoryModal"><i class="fa fa-trash"></i>
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
                <div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            
                                <div class="modal-header d-flex align-item-start">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">You can rename it instead of delete this category</div>
                                <div class="modal-footer">
                                    <form action="" method="post" id="deletecategory">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" type="submit">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Delete Image Modal-->
                </div>

                 <!-- New Category Modal-->
                <div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('category.store') }}" method="post" id="newcategory">
                                @csrf
                                <div class="modal-header d-flex align-item-start">
                                    <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                 <div class="modal-body">
                                     <div class="form-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="category" value="{{ old('name') }}" name="name" placeholder="category name">
                                        @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                     </div>
                                </div>
                                 <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Delete Image Modal-->

                 <!-- Update Category Modal-->
                <div class="modal fade" id="updateCategoryModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="" method="post" id="updatecategory">
                                @method('put')
                                @csrf
                                <div class="modal-header d-flex align-item-start">
                                    <h5 class="modal-title" id="exampleModalLabel">Rename Category</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                 <div class="modal-body">
                                     <div class="form-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="category" value="{{ old('name') }}" name="name" placeholder="category name">
                                        @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                     </div>
                                </div>
                                 <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Update Category Modal-->
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
        $('#deleteCategoryModal').on('show.bs.modal', function (e) {
            $(this).find('#deletecategory').attr('action', $(e.relatedTarget).data('href'));
        });
    </script>

    <script>
        $('#updateCategoryModal').on('show.bs.modal', function (e) {
            $(this).find('#updatecategory').attr('action', $(e.relatedTarget).data('href'));
            $(this).find('#category').attr('value', $(e.relatedTarget).data('value'));
        });
    </script>

@endpush