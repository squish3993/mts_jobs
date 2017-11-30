@extends('welcome')

@push('head')
    <link href='/css/book/index.css' rel='stylesheet'>
    <link href='/css/book/_book.css' rel='stylesheet'>
@endpush

@section('title')
    Jobs database
@endsection

@section('content')

    <h1>Add a new job</h1>

    <form method='POST' action='/job'>

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='eventName'>* Event Name</label>
        <input type='text' name='eventName' id='eventName'>
        
        <label for='name'>* Employee Name</label>
        <input type='text' name='name' id='name'>
        
        <label for='department'>* Department</label>
        <input type='text' max='4' name='department' id='department'>
        
        <label for='dateAndTime'>* Date and Time </label>
        <input type='text' max='4' name='dateAndTime' id='dateAndTime'>
        
        <label for='location'>* Location</label>
        <input type='text' max='4' name='location' id='location'>
        
        <input type='submit' value='Add Job' class='btn btn-primary btn-small'>
    </form>


@endsection