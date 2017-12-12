@extends('layouts.master')

@push('head')
    <link href='/css/book/index.css' rel='stylesheet'>
    <link href='/css/book/_book.css' rel='stylesheet'>
@endpush

@section('title')
	MTS Employees
@endsection

@section('content')
	@foreach($employees as $employee)
	            <div class='book cf'>
	             	<h2>{{ $employee['lastName'] }}</h2>
	            </div>
	 @endforeach
@endsection