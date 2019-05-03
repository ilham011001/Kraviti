@extends('layouts.template')

@section('title','Kraviti - FAQ')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Frequently Asked Questions</h1>
                    <h6 class="card-subtitle">All Data Faq</h6>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Faq</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Faq</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($faqs as $faq)
								<tr>
									<td>{{ $loop->index + 1 }}</td>
									<td><a href="{{ route('faq.show', $faq->id) }}">{{ $faq->faq }}</a></td>
									<td class="text-center">
										<form action="{{ url('admin/category/'.$faq->id) }}" method="POST" id="myForm_{{ $faq->id }}">
											@csrf @method("DELETE")
											{{-- <input type="submit" class="btn btn-warning" value="Delete"> --}}
											<button  class="btn btn-danger btn-sm btnDelete" id="{{ $faq->id }}" 
											 type="submit">
												<i class="mdi mdi-delete"></i>
											</button>
										</form>
										<a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-info btn-sm">
											<i class="mdi mdi-tooltip-edit"></i>
										</a>
									</td>
								</tr>
								<script>
									$(document).ready(function(){
									    $('.btnDelete').on('click', function(e){
									        e.preventDefault(); //cancel default action

									        //Recuperate href value
									        var od = $(this).attr('id');
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