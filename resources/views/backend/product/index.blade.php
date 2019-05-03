@extends('layouts.template')

@section('title','Kraviti - Product')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Product</h1>
                    <h6 class="card-subtitle">All Data Product</h6>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Publish</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Publish</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($products as $product)
								<tr>
									<td>{{ $loop->index + 1 }}</td>
									<td>{{ $product->product_code }}</td>
									<td><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
									<td>{{ $product->category->name }}</td>
									{{-- <td>{{ Str::words($product->description, $words = 1, $end = '...') }}</td> --}}
									<td>{{ $product->publish?"Yes":"No" }}</td>
									<td class="text-center">
										<form action="{{ route('product.destroy', $product->id) }}" method="POST" id="myForm_{{ $product->id }}">
											@csrf @method("DELETE")
											{{-- <input type="submit" class="btn btn-warning" value="Delete"> --}}
											<button  class="btn btn-danger btn-sm btnDelete" id="{{ $product->id }}" 
											 type="submit">
												<i class="mdi mdi-delete"></i>
											</button>
										</form>
										<a href="{{ route('product.edit', $product->id) }}" class="btn btn-info btn-sm">
											<i class="mdi mdi-tooltip-edit"></i>
										</a>
									</td>
								</tr>
								<script>
									$(document).ready(function(){
									    $('.btnDelete').on('click', function(e){
									        e.preventDefault(); //cancel default action

									        //Recuperate href value
									        var id = $(this).attr('id');
									        //pop up
									        swal({
									            title: "Are you sure ??",
									            text: "Data will be permanently deleted", 
									            icon: "warning",
									            buttons: true,
									            dangerMode: true,
									        })
									        .then((willDelete) => {
									          if (willDelete) {
									            $("#myForm_"+id).submit();
									          }
									        });
									    });
									    });
								</script>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection