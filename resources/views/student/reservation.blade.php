@extends('layouts.app')
@section('content')
    @if(isset($approved) && $approved !== null)
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
                                        <th>Odjavi se</th>
                                        </thead>
                                        <tbody>

                                            @foreach($approved as $task)

                                                <tr>
                                                    <td class="table-text">{{ $task->name }}</td>
                                                    <td class="table-text">{{ $task->name_en }}</td>
                                                    <td class="table-text">{{ $task->goal }}</td>
                                                    <td class="table-text">{{ $task->college_type }}</td>
                                                    <td>
                                                        <form action="{{url('student/' . $task->id )}}" method="POST">
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
        </div>
    @endif
    @if(isset($not_approved) && $not_approved !== null)
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
                                        <th>Odjavi se</th>
                                        </thead>
                                        <tbody>

                                        @foreach($not_approved as $task)

                                            <tr>
                                                <td class="table-text">{{ $task->name }}</td>
                                                <td class="table-text">{{ $task->name_en }}</td>
                                                <td class="table-text">{{ $task->goal }}</td>
                                                <td class="table-text">{{ $task->college_type }}</td>
                                                <td>
                                                    <form class="delete" action="{{url('student/' . $task->id )}}" method="POST">
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
        </div>
    @endif
    @endsection