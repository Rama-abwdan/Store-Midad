

@extends('layout.dashboard')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard.stores.index') }}">Stores</a></li>
<li class="breadcrumb-item"><a href="{{ route('dashboard.stores.edit',$store->id) }}">{{ $store->name }}</a></li>
@endsection
@section('title','Edit Store')
@section('content')

<div class="container-fluid">
    <a href="{{ route('dashboard.stores.index') }}"class="btn btn-primary mb-3">Stores</a>
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Edit Store </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('dashboard.stores.update', $store->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @include('dashboard.pages.stores._form')
                    
                    
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
    