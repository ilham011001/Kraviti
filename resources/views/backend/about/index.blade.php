@extends('layouts.template')

@section('title','Kraviti - About')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-light card-title">About Us</h1>
                    {{-- <h6 class="card-subtitle">Product detail</h6> --}}
                    <hr>
                    <div class="row col-sm-12">
                        <h4><a href="{{ route('about.edit', 1) }}">Edit</a></h4>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-10 offset-1">
                            <img src="{{ asset('images/about/'.$about->image) }}" alt="No image" class="img-responsive">
                        </div>
                        <div class="col-md-6 offset-3" style="margin-top: 10px">
                            <h3>Description</h3>
                            <p>{{ $about->description }}</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Visi</h3>
                            <p>{{ $about->vision }}</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Misi</h3>
                            <p>{{ $about->mission }}</p>
                        </div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('component.alert_error')

@endsection