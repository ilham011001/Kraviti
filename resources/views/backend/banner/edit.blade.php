@extends('layouts.template')

@section('title','Kraviti - Edit Banner')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h1 class="font-light card-title">
							Form Banner
						</h1>
						<h6 class="card-subtitle">Here Administrator can add banner</h6>
						<hr>
						<form action="{{ route('banner.update', $banner->id) }}" method="post" enctype="multipart/form-data">
							@csrf @method('patch')
							<div class="row">
								<div class="col-md-6">
									<div class="form-group" id="addImage">
										<label for="">Image</label>
										<input type="file" class="dropify" name="image">
									</div>
									<button class="btn btn-info col-md-6" type="submit">Update</button>
								</div>
								<div class="col-md-6">
									<div class="form-group" id="addImage">
										<label for="">Your image</label>
										<img src="{{ asset('images/banner/'.$banner->name) }}" alt="No image..." class="img-responsive">
									</div>
								</div>
								@include('component.alert_error')
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection