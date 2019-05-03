@extends('layouts.template')
@section('title','Kraviti - Dashboard')
@section('content')
	<div class="container">

		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h3 class="font-light card-title">Welcome to admin kraviti</h3>
					</div>
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="font-light card-title">Dashboard Administrator</h3>
				<h6 class="card-subtitle">All Web usage data</h6>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="card card-info card-inverse">
					<div class="box text-center">
						<h1 class="font-light text-white">{{ $category }}</h1>
						<h6 class="text-white">Category</h6>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card card-dark card-inverse">
					<div class="box text-center">
						<h1 class="font-light text-white">{{ $product }}</h1>
						<h6 class="text-white">Product</h6>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card card-success card-inverse">
					<div class="box text-center">
						<h1 class="font-light text-white">{{ $hope }}</h1>
						<h6 class="text-white">Patch a Hope</h6>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card card-megna card-inverse">
					<div class="box text-center">
						<h1 class="font-light text-white">{{ $faq }}</h1>
						<h6 class="text-white">Frequently Asked Questions</h6>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card card-warning card-inverse">
					<div class="box text-center">
						<h1 class="font-light text-white">{{ $order }}</h1>
						<h6 class="text-white">Order</h6>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card card-primary card-inverse">
					<div class="box text-center">
						<h1 class="font-light text-white">{{ $banner }}</h1>
						<h6 class="text-white">Banner</h6>
					</div>
				</div>
			</div>
		</div>
		{{-- <div class="row">
			<div class="col-sm-12">
				<h3 class="font-light card-title">Dashboard Order</h3>
				<h6 class="card-subtitle">All the following query data</h6>
			</div>
		</div> --}}
		{{-- <div class="row">
			<div class="col-sm-12">
				<div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($orders as $row)
							<tr>
								<td>{{ $loop->index + 1 }}</td>
								<td>{{ $row->full_name }}</td>
								<td>{{ $row->email }}</td>
								<td>{{ $row->subject }}</td>
								<td>{{ $row->message }}</td>
							</tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
			</div>
		</div> --}}
			</div>
		</div>
	</div>
@endsection