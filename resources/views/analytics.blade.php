@extends('layouts.app')

@section('content')
	<div class="container mt-3">
	<table class="table">
		<tr>
			<th>title</th>
			<th>data</th>
		</tr>
		<tr>
			<td>Visitors</td>
			<td>
			@foreach($visitors as $item)	
				<span>Date: {{$item->date}}</span>	
				<br>
				<span>Count: {{$item->visitors}} </span>
				<br><br>
				
			@endforeach
			</td>
		</tr>
		<tr>
			<td>Online</td>
			<td>
				{{$online}}
			</td>
		</tr>
		<tr>
			<td>Applications</td>
			<td>
				@foreach($applications as $item)
					{{$item}}
				@endforeach
			</td>
		</tr>
	</table>
	</div>
@endsection