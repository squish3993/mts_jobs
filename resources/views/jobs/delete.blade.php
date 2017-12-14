@extends('layouts.master')

@push('head')
    <link href='/css/Jobs/delete.css' rel='stylesheet'>
@endpush

@section('title')
    Confirm deletion
@endsection

@section('content')
    <div class="container text-center">
        <h1>Confirm deletion</h1>

        <p>Are you sure you want to delete <strong>{{ $job->eventName }}</strong>?</p>


        <form method='POST' action='/job/{{ $job->id }}'>
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small'>
        </form>

        <p class='cancel'>
            <a href='/jobs'>No, I changed my mind.</a>
        </p>
    </div>
@endsection