@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        {{isset($book) ? 'Edit a book' : 'Add a book'}}
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{$error}}
                </li>

                @endforeach
            </ul>
        </div>

        @else

        @endif
        <form action="{{isset($book)?route('books.update', $book->id):route('books.store')}}" method="POST">
            @csrf
            @if (isset($book))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" autocomplete="off"
                    value="{{isset($book)?$book->name:''}}" placeholder="eg. Native Son by Richard Wright">
                <label for="isbn">ISBN</label>
                <input type="text"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                    class="form-control" name="isbn" autocomplete="off" value="{{isset($book)?$book->isbn:''}} "
                    placeholder="eg. 9780061148507">
            </div>
            <div class="form-group">
                <button class="btn btn-success">
                    {{isset($book) ? 'Update' : 'Add'}}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
