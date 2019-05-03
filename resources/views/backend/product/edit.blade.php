@extends('layouts.template')

@section('title','Kraviti - Edit Product')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h1 class="font-light card-title">Form Product</h1>
						<h6 class="card-subtitle">Here Administrator can add product</h6>
						<hr>
						<form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
							@csrf @method('patch')
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Product Code</label>
										<input type="text" class="form-control" name="product_code" value="{{ $product->product_code }}" disabled>
									</div>
									<div class="form-group">
										<label for="">Name</label>
										<input type="text" class="form-control" name="name" value="{{ $product->name }}">
									</div>
									<div class="form-group">
										<label for="">Category</label>
										<select name="category_id" class="form-control">
											<option value="">Select a category</option>
											@foreach ($categories as $category)
											@if ($category->id == $product->category_id)
												<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
											@else
												<option value="{{ $category->id }}">{{ $category->name }}</option>
											@endif
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label for="">Price</label>
										<input type="text" class="form-control" name="price" value="{{ $product->price }}">
									</div>
									<div class="form-group">
										<label for="">Publish</label>
										<select name="publish" class="form-control">
											<option value="1" {{ $product->publish?"checked":"" }}>Yes</option>
											<option value="0" {{ !$product->publish?"checked":"" }}>No</option>
										</select>
									</div>
									<button class="btn btn-info col-md-6" type="submit">Update</i></button>
									<br>
									<br>
									@include('component.alert_error')
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="">Description</label>
										<textarea name="description" id="" cols="30" rows="3" class="form-control">{{ $product->description }}</textarea>
									</div>
									<div class="form-group" id="addImage">
										<label for="">Image</label>
										<input type="file" class="dropify" name="image">
										<p style="color: red">Upload if you want to change</p>
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