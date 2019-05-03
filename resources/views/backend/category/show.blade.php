@extends('layouts.template')

@section('title','Kraviti - Show Category')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">{{ $category->category }}</h1>
                    <h6 class="card-subtitle">Category detail</h6>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
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
                                    <th>Price</th>
                                    <th>Publish</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($category->products as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $product->product_code }}</td>
                                    <td><a href="{{ url('admin/product/detail/'.$product->id) }}">{{ $product->name }}</a></td>
                                    <td>{{ $product->category->category }}</td>
                                    <td>{{ $product->price }}</td>
                                    {{-- <td>{{ Str::words($product->description, $words = 1, $end = '...') }}</td> --}}
                                    <td>{{ $product->publish?"Yes":"No" }}</td>
                                    <td class="text-center">
                                        <a  href="{{ url('admin/product/delete/'.$product->id) }}" class="btn btn-danger btnDelete btn-sm"
                                        >
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                        <a href="{{ url('admin/product/edit/'.$product->id) }}" class="btn btn-info btn-sm">
                                            <i class="mdi mdi-tooltip-edit"></i>
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