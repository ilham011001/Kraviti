@extends('layouts.template')

@section('title','Kraviti - Show FAQ')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-light card-title">Frequently Asked Questions</h1>
					<h6 class="card-subtitle">Detail faq and answer</h6>
                    	
					<hr>

                    <h3>{{ $faq->faq }}</h3>
                    @foreach ($faq->faqAnswers as $answer)
                    <div class="col-md-12">
                    	<div class="row">
	                    	<div class="col-md-11">
	                    		<p style="margin-left: 15px;">>&nbsp;&nbsp;{{ $answer->answer }}</p>
	                    	</div>
	                    	<div class="col-md-1">
	                    		<form action="{{ url('admin/faqAnswer/'.$answer->id) }}" method="POST" id="myForm">
                                    @csrf @method("DELETE")
                                    {{-- <input type="submit" class="btn btn-warning" value="Delete"> --}}
                                    <button  class="btn btn-danger btn-sm"
                                     type="submit">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </form>
	                    	</div>
                    	</div>
                    </div>
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
                </div>
                <div class="card-footer text-right">
                	<a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add answer</a>
                	<a href="{{ url('admin/faq/'.$faq->id.'/edit') }}" class="btn btn-info">Edit Faq</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModal">
	<form action="{{ url('admin/faqAnswer') }}" method="POST">
		@csrf
		<input type="hidden" name="faq_id" value="{{ $faq->id }}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title">
					<h2>Form answer</h2>
				</div>
				<a href="#" data-dismiss="modal" class="close">&times;</a>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="">Answer</label>
					<input class="form-control" type="text" name="answer" value="{{ old('answer') }}" placeholder="Answer">
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-info">Add</button>
			</div>
		</div>
	</div>
	</form>
</div>
@endsection