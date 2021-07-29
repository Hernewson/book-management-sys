@extends('layouts.app')

@section('content')
@if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
<div class="d-flex justify-content-end mb-2">
    <a href="{{route('books.create')}}" class="btn btn-success">Add new</a>
</div>
<div class="card card-default">
    <div class="card-header">
        My books
    </div>
    <div class="card-body">
        @if ($books->count() > 0)
        <table class="table">
            <thead>
                <th>Name</th>
                <th>ISBN</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>
                        <a href="{{route('books.show', $book->id)}}">{{$book->name}}</a>
                    </td>
                    <td>
                        {{$book->isbn}}
                    </td>
                    <td>
                        <a href=" {{route('books.edit', $book->id)}} " class="btn btn-sm btn-info">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="handleDelete( {{$book->id}} )">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
                @else
                <h3 class="text-center">
                    No Books yet.
                </h3>
                @endif
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post" id="deleteBookForm">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Remove Book?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-bold">
                                Are you sure you want to remove this book?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go
                                back.</button>
                            <button type="submit" class="btn btn-primary">Yes, Remove.</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function handleDelete(id){
            var form = document.getElementById('deleteBookForm');
            form.action = '/books/' + id;
            $('#deleteModal').modal('show');

        }
</script>

@endsection
