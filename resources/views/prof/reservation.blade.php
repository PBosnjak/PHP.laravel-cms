@extends('layouts.app')
@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Prihvaćeni Radovi

                            <div class="panel-body">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="panel-body">
                                    <table class="table table-striped task-table">
                                        <thead>
                                        <th>Naziv</th>
                                        <th>Name</th>
                                        <th>Cilj</th>
                                        <th>Tip studija</th>
                                        <th>Student</th>
                                        <th>Poništi prijavu</th>
                                        </thead>
                                        <tbody>

                                        @foreach($data as $user)
                                            @foreach($user->tasks as $task )
                                                @if($task->pivot->approved)
                                            <tr>
                                                <td class="table-text">{{ $task->name }}</td>
                                                <td class="table-text">{{ $task->name_en }}</td>
                                                <td class="table-text">{{ $task->goal }}</td>
                                                <td class="table-text">{{ $task->college_type }}</td>
                                                <td class="table-text">{{ $user->name }}</td>
                                                <td>
                                                    <form action="{{url('prof/task/' . $task->id )}}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <input type="hidden" name="user" value="{{ $user->id }}">
                                                        <button onclick="myFunction()" type="submit" id="delete-task-{{$task->id}}" class="btn btn-danger">
                                                            <i class="fa fa-btn fa-trash"></i>Poništi
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                                @endif
                                            @endforeach
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Prijavljeni Radovi

                            <div class="panel-body">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="panel-body">
                                    <table class="table table-striped task-table">
                                        <thead>
                                        <th>Naziv</th>
                                        <th>Name</th>
                                        <th>Cilj</th>
                                        <th>Tip studija</th>
                                        <th>Student</th>
                                        <th>Odobri prijavu</th>
                                        </thead>
                                        <tbody>

                                        @foreach($data as $user)
                                            @foreach($user->tasks as $task )
                                                @if($task->pivot->approved === null)
                                                    <tr>
                                                        <td class="table-text">{{ $task->name }}</td>
                                                        <td class="table-text">{{ $task->name_en }}</td>
                                                        <td class="table-text">{{ $task->goal }}</td>
                                                        <td class="table-text">{{ $task->college_type }}</td>
                                                        <td class="table-text">{{ $user->name }}</td>
                                                        <td>
                                                            <form action="{{url('prof/task/' . $task->id )}}" method="POST">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="user" value="{{ $user->id }}">
                                                                <button  type="submit" id="update-task-{{$task->id}}" class="btn btn-warning">
                                                                    <i class="fa fa-btn fa-trash"></i>Odobri
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection