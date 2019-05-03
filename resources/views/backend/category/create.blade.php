@extends('layouts.template')

@section('title','Kraviti - Create Category')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h1 class="font-light card-title">
							Form Category
						</h1>
						<h6 class="card-subtitle">Here Administrator can add category</h6>
						<hr>
						<form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Category name</label>
										<input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Category name">
									</div>
									<button class="btn btn-info col-md-6" type="submit">Add</button>
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