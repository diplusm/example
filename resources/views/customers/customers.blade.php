@extends('layouts.app')

@section('content')
    <div class="container mt-3">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->customer_id}}</td>
                <td>{{$customer->customer_name}}</td>
                <td>{{$customer->customer_phone}}</td>
                <td>{{$customer->customer_email}}</td>
                <td><button class="btn btn-primary btn-sm" id="{{$customer->customer_id}}" onclick='location.href="{{route('customer.edit', ['id' => $customer->customer_id])}}"'>Edit</button></td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection