

@extends('layouts.dashboard.user')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('user.products.index') }}">Products</a></li>
<li class="breadcrumb-item"><a href="{{ route('user.products.edit',$product->id) }}">{{ $product->name }}</a></li>
@endsection
@section('title','Edit Product')
@section('content')

<div class="container-fluid">
    <a href="{{ route('user.products.index') }}"class="btn btn-primary mb-3">Products</a>
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Edit Product </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('user.products.update', $product->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @include('user.pages.products._form')
                    
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>

        </div>

        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
@endsection
@push('styles')
    <style>
        .btn-primary{
            display: inline-block;
            padding: 10px 20px;
            font-size: 16xp;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
        .container{
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px
        }
        .form{
            display: flex;
            flex-direction: column;
        }
        .form-control{
            margin-bottom: 15px;
        }
        .form-control label{
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-control input,
        .form-control textarea{
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-control button{
            align-self: flex-start;
            cursor: pointer;
        }
        </style>
@endpush
    