@extends('layouts.template')

@section('title','Kraviti - Order')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Order</h1>
                    <h6 class="card-subtitle">All Data Order</h6>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($orders as $order)
								<tr>
									<td>{{ $loop->index + 1 }}</td>
									<td><a href="{{ route('order.show', $order->id) }}">{{ $order->full_name }}</a></td>
									<td>{{ $order->email }}</td>
									<td>{{ $order->subject }}</td>
									<td class="text-center">
										<form action="{{ route('order.destroy', $order->id) }}" method="POST" id="myForm_{{ $order->id }}">
                                            @csrf @method("DELETE")
                                            {{-- <input type="submit" class="btn btn-warning" value="Delete"> --}}
                                            <button  class="btn btn-danger btn-sm btnDelete" id="{{ $order->id }}" 
                                             type="submit">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </form>
									</td>
								</tr>
								<script>
									$(document).ready(function(){
                                        $('.btnDelete').on('click', function(e){
                                            
                                            var id = $(this).attr('id');
                                            e.preventDefault(); //cancel default action

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