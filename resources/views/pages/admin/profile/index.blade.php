@extends('layouts.admin')
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
                                <strong>Profile</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{route('profile.update', $item->id)}}" method="post">
                                    @method('put')
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name"><i class="fas fa-globe"></i>&nbsp;Company
                                                Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{$item->name}}">
                                            <small
                                                class="form-text text-danger"></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email"><i class="fas fa-at"></i>&nbsp;Company Email
                                                Address</label>
                                            <input type="text" class="form-control" id="email"
                                                name="email" value="{{$item->email}}">
                                            <small
                                                class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address"><i class="fas fa-home"></i>&nbsp;Company
                                            Address</label>
                                        <input type="text" class="form-control" id="address"
                                            name="address" value="{{$item->address}}">
                                        <small
                                            class="form-text text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="link_gmap"><i class="fas fa-map-marked-alt"></i>&nbsp;Google Map
                                            Location Link </label>
                                        <input type="text" class="form-control" id="link_gmap" name="link_gmap"
                                            value="{{$item->link_gmap}}">
                                        <small class=" form-text text-muted">Please enter valid Google map Link to
                                            Company Location</small>
                                        <small class="form-text text-danger"></small>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="phone"><i class="fas fa-phone"></i>&nbsp;Company Phone
                                                Number</label>
                                            <input type="text" class="form-control" id="companyphone"
                                                name="phone" value="{{$item->phone}}">
                                            <small
                                                class="form-text text-danger"></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="link_whatsapp"><i class="fab fa-whatsapp-square"></i>&nbsp;Company
                                                Whatsapp Link</label>
                                            <input type="text" class="form-control" id="link_whatsapp" name="link_whatsapp"
                                                value="{{$item->link_whatsapp}}">
                                            <small class="form-text text-muted">Please enter valid Whatsapp Link</small>
                                            <small class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook"><i class="fab fa-facebook"></i>&nbsp;Company Facebook
                                            Account</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook"
                                            value="{{$item->facebook}}">
                                        <small class="form-text text-muted">Please enter valid Facebook Account
                                            Link</small>
                                        <small class="form-text text-danger"></small>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="instagram"><i class="fab fa-instagram"></i>&nbsp;Company
                                                Instagram Account</label>
                                            <input type="text" class="form-control" id="instagram" name="instagram"
                                                value="{{$item->instagram}}">
                                            <small class="form-text text-muted">Please enter valid Instagram Account
                                                Link</small>
                                            <small class="form-text text-danger"></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="youtube"><i class="fab fa-youtube"></i>&nbsp;Company Youtube
                                                Channel</label>
                                            <input type="text" class="form-control" id="youtube" name="youtube"
                                                value="{{$item->youtube}}">
                                            <small class="form-text text-muted">Please enter valid Whatsapp Link</small>
                                            <small
                                                class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i>Update
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