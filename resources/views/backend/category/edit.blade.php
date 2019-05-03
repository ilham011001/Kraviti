@extends('layouts.template')

@section('title','Kraviti - Edit Kraviti')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h1 class="font-light card-title">
							Form Category
						</h1>
						<h6 class="card-subtitle">Here Administrator can update the category</h6>
						<hr>
						<form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
							@csrf @method('patch')
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Category name</label>
										<input class="form-control" type="text" name="name" value="{{ $category->name }}" placeholder="Category name">
									</div>
									<button class="btn btn-info" type="submit">Update</button>
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