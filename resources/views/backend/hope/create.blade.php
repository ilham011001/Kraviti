@extends('layouts.template')

@section('title','Kraviti - Create Hope')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h1 class="font-light card-title">Form Hope</h1>
						<h6 class="card-subtitle">Here Administrator can add hope</h6>
						<hr>
						<form action="{{ route('hope.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Title</label>
										<input type="text" class="form-control" name="title" value="{{ old('title') }}">
									</div>
									<div class="form-group">
										<label for="">Description</label>
										<textarea name="description" id="" cols="30" rows="4" class="form-control">{{ old('description') }}</textarea>
									</div>
									<button class="btn btn-info col-md-6" type="submit">Add</i></button>
									<br>
									<br>
									@include('component.alert_error')
								</div>
								<div class="col-sm-6">
									<div class="form-group" id="addImage">
										<label for="">Image</label>
										<input type="file" class="dropify" name="image">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection