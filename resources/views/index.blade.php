@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">TODO LIST</h5>
                <form action="{{ route('todo.store') }}" method="POST">
                    @csrf
                    <label for="inputTitle" class="form-label">List</label>
                    <input type="text" class="form-control" name="title">
                    <button class="btn btn-primary mt-2" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            @forelse ($todo as $row)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $row->title }}</h5>
                            <p class="card-text">Status: {{ $row->status }}</p>
                            <form action="{{ route('todo.update', $row->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select mb-2">
                                    <option value="Todo" {{ $row->status === 'Todo' ? 'selected' : '' }}>Todo</option>
                                    <option value="In progress" {{ $row->status === 'In progress' ? 'selected' : '' }}>In
                                        Progress</option>
                                    <option value="Complete" {{ $row->status === 'Complete' ? 'selected' : '' }}>Complete
                                    </option>
                                </select>
                                <button type="submit" class="btn btn-warning btn-sm">Update Status</button>
                            </form>
                            <form action="{{ route('todo.destroy', $row->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <p class="card-text">Data Masih Kosong</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
