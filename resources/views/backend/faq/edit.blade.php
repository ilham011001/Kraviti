@extends('layouts.template')

@section('title','Kraviti - Edit FAQ')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h1 class="font-light card-title">
							Form Faq
						</h1>
						<h6 class="card-subtitle">Here Administrator can update the faq</h6>
						<hr>
						<script>
							var id = 1;
						</script>
						<form action="{{ route('faq.update', $faq->id) }}" method="post" enctype="multipart/form-data">
							@csrf @method('patch')
							<div class="row">
								<div class="col-md-8">
									<div class="form-group col-md-10">
										<label for="">Faq</label>
										<input class="form-control" type="text" name="faq" value="{{ $faq->faq }}" placeholder="Faq">
									</div>
									<div class="form-group col-md-12" id="addElement">
										<label for="">Answer</label>
										@foreach ($faq->faqAnswers as $answer)
											@php
												$index = $loop->index + 1;
												$name = "answer".$index;
												$place = "Answer ".$index;
											@endphp
											<input class="form-control" type="text" name="{{ $name }}" value="{{ $answer->answer }}" placeholder="{{ $place }}" style="margin-top: 5px">

										@endforeach

										<input type="hidden" name="countAnswer" value="1" id="countAnswer">
									</div>
									
									<div class="col-md-12">
										<button class="btn btn-info" type="submit">Update</i></button>
									</div>
									

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