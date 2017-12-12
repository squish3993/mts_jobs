@extends('layouts.master')

@push('head')
    <link href='/css/book/index.css' rel='stylesheet'>
    <link href='/css/book/_book.css' rel='stylesheet'>
@endpush

@section('title')
	MTS Jobs
@endsection

@section('content')
	@foreach($jobs as $job)
	            <div class='book cf'>
	             	<h2>{{ $job['eventName'] }}</h2>
	             	<a href='/job/{{ $job['id'] }}/edit'>Edit</a> |
	             	<a href='/job/{{ $job['id'] }}/delete'>Delete</a>
	            </div>
	 @endforeach
@endsection
