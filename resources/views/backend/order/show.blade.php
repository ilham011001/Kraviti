@extends('layouts.template')

@section('title','Kraviti - Show Order')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="font-light card-title">Order</h1>
                    <h6 class="card-subtitle">Order detail</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Full Name</h3>
                            <p>{{ $order->full_name }}</p>
                            <h3>Email</h3>
                            <p>{{ $order->email }}</p>
                            <h3>Subject</h3>
                            <p>{{ $order->subject }}</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Message</h3>
                            <p>{{ $order->message }}</p>
                            <h3>Created at</h3>
                            <p>{{ $order->created_at->format('m-d-Y') }}</p>
                        </div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('component.alert_error')

@endsection