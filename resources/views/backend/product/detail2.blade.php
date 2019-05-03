@extends('layouts.template')

@section('title','Data Ekstra Kulikuler')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="font-light card-title">Product Detail</h3>
                            <h6 class="card-subtitle">Product code : <span style="color: red">{{ $product->product_code }}</span></h6>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-md-10 offset-1">
                                <div class="row">
                                <div class="col-md-6">
                                <h3>Name</h3>
                                    <p>{{ $product->name }}</p>
                                    <h3>Category</h3>
                                    <p>{{ $product->category->category }}</p>
                                    <h3>Price</h3>
                                    <p>{{ $product->price }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h3>Publish</h3>
                                    <p>{{ $product->publish?"Yes":"No" }}</p>
                                    <h3>Description</h3>
                                    <p>{{ $product->description }}</p>
                                    <div class="row">
                                        <a href="#" class="col-md-4" data-toggle="modal" data-target="#myModal">Add image</a>
                                        <a href="{{ url('admin/product/edit/'.$product->id) }}" class="col-md-4 offset-1">Edit</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-12">
                                <h3 class="font-light card-title">Image</h3>
                                
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($product->imageProducts as $image)
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('images/product/'.$image->name) }}" alt="No image" class="img-responsive" style="width: 50%;">
                                    <a  href="{{ url('admin/imageProduct/delete/'.$image->id) }}" class=" btnDelete btn-sm"
                                        >
                                            Delete
                                    </a>
                                </div>
                                <script>
                                    $(document).ready(function(){
                                        $('.btnDelete').on('click', function(e){
                                            e.preventDefault(); //cancel default action

                                            //Recuperate href value
                                            var href = $(this).attr('href');
                                            //pop up
                                            swal({
                                                title: "Are you sure ??",
                                                text: "Data will be permanently deleted", 
                                                icon: "warning",
                                                buttons: true,
                                                dangerMode: true,
                                            })
                                            .then((willDelete) => {
                                              if (willDelete) {
                                                window.location.href = href;
                                              }
                                            });
                                        });
                                        });
                                </script>
                            @endforeach
                        </div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModal">
    <form action="{{ url('admin/imageProduct/save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <h3>Form image</h3>
                </div>
                <a href="#" data-dismiss="modal" class="close">&times;</a>
            </div>
            <div class="modal-body">
                <div class="form-group" id="addImage">
                    <label for="">Image</label>
                    <input type="file" class="dropify" name="image">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Add</button>
            </div>
        </div>
    </div>
    </form>
</div>

@include('component.alert_error')

@endsection