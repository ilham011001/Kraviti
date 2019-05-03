@extends('layouts.template')

@section('title','Kraviti - Create Product')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h1 class="font-light card-title">Form Product</h1>
						<h6 class="card-subtitle">Here Administrator can add product</h6>
						<hr>
						<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Product Code</label>
										<input type="text" class="form-control" name="product_code" value="{{ old('product_code') }}">
									</div>
									<div class="form-group">
										<label for="">Name</label>
										<input type="text" class="form-control" name="name" value="{{ old('name') }}">
									</div>
									<div class="form-group">
										<label for="">Category</label>
										<select name="category_id" class="form-control">
											<option value="">Select a category</option>
											@foreach ($categories as $category)
												<option value="{{ $category->id }}">{{ $category->name }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label for="">Price</label>
										<input type="text" class="form-control" name="price" value="{{ old('price') }}">
									</div>
									<div class="form-group">
										<label for="">Publish</label>
										<select name="publish" class="form-control">
											<option value="1">Yes</option>
											<option value="0">No</option>
										</select>
									</div>
									<button class="btn btn-info col-md-6" type="submit">Add</i></button>
									<br>
									<br>
									@include('component.alert_error')
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="">Description</label>
										<textarea name="description" id="" cols="30" rows="3" class="form-control">{{ old('description') }}</textarea>
									</div>
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