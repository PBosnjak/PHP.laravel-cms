@extends('layouts.app')

@isset($admin)
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Radovi</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="panel-body">
                            <table class="table table-striped task-table">
                                <thead>
                                    <th>ID</th>
                                    <th>Ime</th>
                                    <th>E-mail</th>
                                    <th>Uloga</th>
                                    <th>Uredi</th>
                                    <th>Obriši</th>
                                </thead>
                                <tbody>
                                @foreach($data as $user)
                                        <tr>
                                            <td class="table-text">{{ $user->id }}</td>
                                            <td class="table-text">{{ $user->name }}</td>
                                            <td class="table-text">{{ $user->email }}</td>
                                            <td class="table-text">{{ $user->roles[0]->name }}</td>
                                            <td>
                                                <!-- Task Edit Button -->
                                                <form action="{{url('admin/edit/' . $user->id )}}" method="GET" style="display: inline-block;">
                                                    {{ csrf_field() }}
                                                    <button type="submit" id="delete-user-{{$user->id}}" class="btn btn-warning">
                                                        <i class="fa fa-btn fa-edit"></i>Uredi
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{url('admin/' . $user->id )}}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button onclick="myFunction()" type="submit" id="delete-user-{{$user->id}}" class="btn btn-danger">
                                                        <i class="fa fa-btn fa-trash"></i>Obriši
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@endisset

@isset($professor)
    @section('content')
        <form action="{{url('prof/reservations')}}" method="GET" style="position: relative">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-default col-sm-offset-9">
                <i class="fa fa-btn fa-plus"></i>Prijave
            </button>
        </form>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Radovi
                        <form action="{{url('prof/new')}}" method="GET" style="position: relative">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-default col-sm-offset-9">
                                <i class="fa fa-btn fa-plus"></i>Dodaj rad
                            </button>
                        </form>
                        </div>
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
                                    <th>Uredi</th>
                                    <th>Obriši</th>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $task)
                                        <tr>
                                            <td class="table-text">{{ $task->name }}</td>
                                            <td class="table-text">{{ $task->name_en }}</td>
                                            <td class="table-text">{{ $task->goal }}</td>
                                            <td class="table-text">{{ $task->college_type }}</td>
                                            <td>
                                                <!-- Task Edit Button -->
                                                <form action="{{url('prof/edit/' . $task->id )}}" method="GET" style="display: inline-block;">
                                                    {{ csrf_field() }}
                                                    <button type="submit" id="delete-task-{{$task->id}}" class="btn btn-warning">
                                                        <i class="fa fa-btn fa-edit"></i>Uredi
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{url('prof/' . $task->id )}}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button onclick="myFunction()" type="submit" id="delete-task-{{$task->id}}" class="btn btn-danger">
                                                        <i class="fa fa-btn fa-trash"></i>Obriši
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endisset

@isset($student)
    @section('content')
        <form action="{{url('student/reservations')}}" method="GET" style="position: relative">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-default col-sm-offset-9">
                <i class="fa fa-btn fa-plus"></i>Prijave
            </button>
        </form>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Radovi

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
                                    <th>Prijavi se</th>
                                    </thead>
                                    <tbody>
                                    @if($data !== null)
                                    @foreach($data as $task)

                                        <tr>
                                            <td class="table-text">{{ $task->name }}</td>
                                            <td class="table-text">{{ $task->name_en }}</td>
                                            <td class="table-text">{{ $task->goal }}</td>
                                            <td class="table-text">{{ $task->college_type }}</td>
                                            <td>
                                                <!-- Task Edit Button -->
                                                <form action="{{url('student/reserve/' . $task->id )}}" method="GET" style="display: inline-block;">
                                                    {{ csrf_field() }}
                                                    <button type="submit" id="delete-task-{{$task->id}}" class="btn btn-warning">
                                                        <i class="fa fa-btn fa-edit"></i>Prijavi se
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>


                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endisset