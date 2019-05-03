@extends('layouts.template')

@section('title','Kraviti - Create FAQ')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h1 class="font-light card-title">
							Form Faq
						</h1>
						<h6 class="card-subtitle">Here Administrator can add faq</h6>
						<hr>
						<script>
							var id = 1;
						</script>
						<form action="{{ route('faq.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Question</label>
										<input class="form-control" type="text" name="faq" value="{{ old('faq') }}" placeholder="Question">
									</div>
									<div class="form-group" id="addElement">
										<label for="">Answer</label>
										<input class="form-control" type="text" name="answer1" value="{{ old('answer') }}" placeholder="Answer">
										<input type="hidden" name="countAnswer" value="1" id="countAnswer">
									</div>
									<button class="btn btn-info right" type="button" id="btnAnswer">Add answer</button>
									<button class="btn btn-info col-md-6" type="submit">Finish and save</button>
								</div>
								@include('component.alert_error')
							</div>
						</form>
						<script>
							$("#btnAnswer").click(function(){
								id++;
								var answer = "answer " + id;
								var name   = "answer"+id;
								$("#addElement").append("<input class='form-control' type='text' name='"+name+"' placeholder='"+answer+"' style='margin-top:5px'>");
								$("#countAnswer").val(id);
							})
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection