@extends('layouts.template')

@section('title','Kraviti - Contact')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Contact data</h1>
                    <h6 class="card-subtitle">All Data Contact</h6>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($contacts as $contact)
								<tr>
									<td>{{ $loop->index + 1 }}</td>
									<td>{{ $contact->full_name }}</td>
									<td>{{ $contact->email }}</td>
									<td>{{ $contact->subject }}</td>
									<td>{{ $contact->message }}</td>
									<td class="text-center">
										<a  href="{{ url('admin/contact/delete/'.$contact->id) }}" class="btn btn-danger btnDelete btn-sm"
										>
											<i class="mdi mdi-delete"></i>
										</a>
									</td>
								</tr>
								<script>
									$(document).ready(function(){
									    $('.btnDelete').on('click', function(e){
									        e.preventDefault(); //cancel default action

									        //Recuperate href value
									        var href = $(this).attr('href');
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
									            window.location.href = href;
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