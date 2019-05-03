@extends('layouts.template')

@section('title','Kraviti - Show Hope')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-light card-title">{{ $hope->title }}</h1>
                    <h6 class="card-subtitle">Product detail</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Title</h3>
                            <p>{{ $hope->title }}</p>
                            <h3>Description</h3>
                            <p>{{ $hope->description }}</p>
                            <h3>Created at</h3>
                            <p>{{ $hope->created_at->format('m-d-Y') }}</p>
                            
                                <a href="{{ route('hope.edit', $hope->id) }}">Edit</a>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('images/hope/'.$hope->image) }}" alt="No image" class="img-responsive">
                        </div>
					</div>
                </div>
            </div>
        </div>
    </div>
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