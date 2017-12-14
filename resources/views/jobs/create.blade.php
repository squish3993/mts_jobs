@extends('layouts.master')

@push('head')
    <link href='/css/Jobs/create.css' rel='stylesheet'>
@endpush

@section('title')
	Add a Job
@endsection

@section('content')

    <div class='container text-center'>
    
        <h1>Add a New Job</h1>
        <div class='details'>* Required fields</div>

        <form method='POST' action='/jobs'>

            {{ csrf_field() }}

            <div class='form-group row'>
                <label for='eventName' class='col-sm-2 col-form-label'>* Event Name</label>
                <div class='col-sm-5'>
                    <input type='text' class ='form-control' name='eventName' id='eventName'>
                </div>
                @include('modules.error', ['fieldName' => 'eventName'])
            </div>

            <div class='form-group row'>
                <label for='name' class='col-sm-2 col-form-label'>* Your Name</label>
                <div class='col-sm-5'>
                    <input type='text' class ='form-control' name='name' id='name'>
                </div>
                 @include('modules.error', ['fieldName' => 'name'])
            </div>
            
            <div class='form-group row'>
                <label for='department' class='col-sm-2 col-form-label'>* Department</label>
                <div class='col-sm-5'>
                    <input type='text' class ='form-control' name='department' id='department'>
                </div>
                 @include('modules.error', ['fieldName' => 'department'])
            </div>

            <div class='form-group row'>
                <label for='location' class='col-sm-2 col-form-label'>* Location</label>
                <div class='col-sm-5'>
                    <input type='text' class ='form-control' name='location' id='location'>                     
                </div>
                @include('modules.error', ['fieldName' => 'location'])
            </div>

            @include('modules.datetime')
            @include('modules.error', ['fieldName' => 'dateAndTime'])

            <div class='form-group row'>
                <label for='numOnJob' class='col-sm-2 col-form-label'>* How many People do you need</label>
                <div class='col-sm-5'>
                    <select class ='form-control' name='numOnJob' id='numOnJob'>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                 @include('modules.error', ['fieldName' => 'numOnJob'])
            </div>
                
            <div class='form-group row'>
                <label for='specs' class='col-sm-2 col-form-label'>* Tell Us About Your Job</label>
                <div class='col-sm-5'>
                    <textarea class ='form-control' rows='3' name='specs' id='specs'></textarea>
                </div>
                 @include('modules.error', ['fieldName' => 'specs'])
            </div>

            
                
            <input type='submit' value='Add Job' class='btn btn-primary btn-small'>
        </form>
    </div>
@endsection