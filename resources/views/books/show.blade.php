@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-5">
        {{$book->name}}
    </h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    Details
                </div>
                <div class="card-body">
                    Currently, we have only book name: {{$book->name}} and it's ISBN number as {{$book->isbn}}.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
