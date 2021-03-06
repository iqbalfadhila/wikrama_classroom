@extends('teacher.template.dashboard')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div>
                <h2>Task</h2>
            </div>
        </div>           
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('teacher.task.create') }}"> Create New Task</a>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
           
            <table class="table table-bordered" id="table">
                <thead class="thead-dark" align="center">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Teacher_id</th>
                        <th>Rombel</th>
                        <th>lesson</th>
                        <th>upload</th>
                        <th>Deadline</th>
                        <th>Description</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->teacher->name }}</td>
                            <td>{{ $task->rombel->rombel }}</td>
                            <td>{{ $task->lesson->lesson }}</td>
                            <td>{{ $task->upload }}</td>
                            <td>{{ $task->deadline }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->file }}</td>
                            <td>
                                <form action="{{ route('teacher.task.destroy', $task->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('teacher.task.edit', $task->id) }}" class="btn btn-success btn-sm "><i class="fa fa-pen"></i></a>          
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    {!! $tasks->links() !!}
        </div>
    </div>
</div>
@endsection