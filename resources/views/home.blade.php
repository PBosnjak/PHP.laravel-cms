@extends('layouts.app')

@isset($admin)
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Korisnici</div>

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
        profesor
    @endsection
@endisset