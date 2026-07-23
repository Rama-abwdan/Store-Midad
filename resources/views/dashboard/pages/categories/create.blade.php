

@extends('layout.dashboard')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">Categories</a></li>
<li class="breadcrumb-item"><a href="{{ route('dashboard.categories.create') }}">Create</a></li>
@endsection
@section('title','Create Category')
@section('content')
@if ($errors -> any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<div class="container-fluid">
    <a href="{{ route('dashboard.categories.index') }}"class="btn btn-primary mb-3">Categories</a>
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Create Category </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('dashboard.categories.store') }}" method="post">
                    @csrf
                    @include('dashboard.pages.categories._form',['translations'=>$translations ?? []])
                    
                    
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
    