
@extends('layouts.dashboard.user')
@section('title','Product List')
@section('breadcrumb')
<li class="breadcrumb-item">Products</a></li>
@endsection
@section('content')
<x-flash-message></x-flash-message>
<a href="{{ route('user.products.create') }}" class="btn-primary">create product</a>
    
<form action="{{ URL::current() }}" method="get" class="row q-3 mt-3 mb-3">
    <div class="col-md-4">
        <input type="text" name="name" class="form-control" placeholder="Search by name" value="{{ request()->query('name') }}">
    </div>
    <div class="col-md-3">
        <select name="status" class="form-control">
            <option value="">All Statuses</option>
            <option {{ request()->query('status') == 'active' ? 'selected' : '' }} value="active">Active</option>
            <option {{ request()->query('status') == 'inactive' ? 'selected' : '' }} value="inactive">Inactive</option>
        </select>
    </div>
    <button type="submit" class="btn-primary col-md-2">Search</button>
    <button 
    type="button" 
    class="btn btn-secondary mx-2" 
    onclick="location.href='{{ route('user.products.index') }}'"
>
    Reset
</button>
</form>


<table>
        <thead>
            <tr>
                <th>ID</th>
                
                <th>Name</th>
                <th>Users Count</th>
                <th>Price</th>
                <th>Category</th>
                <th>Store</th>
                <th>Status</th>
                <th>Description</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->users_count}}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->category->name ?? 'N/A' }}</td>
                    <td>{{ $item->store->name ?? 'N/A' }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->description }}</td>
                    <td><a href="{{ route('user.products.edit',$item->id) }}" class="btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('user.products.destroy',$item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-primary">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->appends(request()->query())->links() }}
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
        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td{
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
    @endpush  
    @push('scripts')
        <script>
            document.getElementById('resetBtn').addEventListener('click', function() {
                window.location.href = "{{ route('user.products.index') }}";
            });
        </script>