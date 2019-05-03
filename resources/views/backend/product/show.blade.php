@extends('layouts.template')

@section('title','Kraviti - Show Product')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-light card-title">{{ $product->name }}</h1>
                    <h6 class="card-subtitle">Product detail</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Name</h3>
                            <p>{{ $product->name }}</p>
                            <h3>Category</h3>
                            <p>{{ $product->category->category }}</p>
                            <h3>Price</h3>
                            <p>{{ $product->price }}</p>
                            <h3>Description</h3>
                            <p>{{ $product->description }}</p>
                            
                                <a href="{{ route('product.edit', $product->id) }}">Edit</a>
                            
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('images/product/'.$product->image) }}" alt="No image" class="img-responsive">
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
                    <h2>Form answer</h2>
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

<script type="text/javascript">
            var mySlider = $('#slider4').ubislider({
                arrowsToggle: true,
                type: 'ecommerce',
                hideArrows: true,
                autoSlideOnLastClick: true,
                modalOnClick: true
            }); 
            $('#slider5').ubislider({
                bullets: true
            }); 

            $("#checkId").click(function(){
                alert('ok'+mySlider);
            })
</script>

@endsection