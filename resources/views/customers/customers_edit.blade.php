@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center h-100">
        <div class="col-3">
            <form class="bg-light p-3 rounded-3" action="{{route('customer.update', $customer->customer_id)}}" method="POST">
                @CSRF
                @method('PATCH')
                <h1 class="h3">Edit</h1>
                <div class="form-group mb-2">
                    <label>ID: {{$customer->customer_id}}</label>
                </div>
                <div class="form-group mb-2">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="Name" id="Name" value="{{$customer->customer_name}}">
                </div>
                <div class="form-group mb-2">
                    <label for="Phone">Phone</label>
                    <input type="text" class="form-control" name="Phone" id="Phone" value="{{$customer->customer_phone}}">
                </div>
                <div class="form-group mb-2">
                    <label for="Email">Email</label>
                    <input type="text" class="form-control" name="Email" id="Email" value="{{$customer->customer_email}}">
                </div>
                <div class="form-group my-4 d-flex justify-content-between">
                    <button type="button" class="btn btn-light btn-sm" onclick='location.href="{{route('customer')}}"'>Back</button>
                    <div>
                        
                        <input type="submit" class="btn btn-success btn-sm" name="update" id="update" value="Update">
                    </div>
                    
                </div>
            </form>
        </div>
        
    </div>
@endsection