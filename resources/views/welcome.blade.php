@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:100px">
    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto possimus odio aperiam sunt, ex adipisci? Expedita ad accusantium delectus minus doloribus rem quaerat officia voluptate omnis sit, dolorum soluta ratione!</p>
            <a href="{{ route('home')}}" class="btn btn-outline-primary btn-lg">Create My Resume</a>
        </div>
    </div>
</div>
@endsection
