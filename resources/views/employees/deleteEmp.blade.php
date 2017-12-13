@extends('layouts.master')

@section('title')
    Confirm deletion
@endsection

@section('content')
    <h1>Confirm deletion</h1>

    <p>Are you sure you want to delete <strong>{{ $employee->lastname.', '.$employee->firstName }}</strong>?</p>


    <form method='POST' action='/employee/{{ $employee->id }}'>
        
        {{ method_field('delete') }}
        {{ csrf_field() }}

        <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small'>
    </form>

    <p class='cancel'>
        <a href='/employees'>No, I changed my mind.</a>
    </p>

@endsection