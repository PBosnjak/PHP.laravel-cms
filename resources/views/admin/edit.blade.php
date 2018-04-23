@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Uredi zadatak
                </div>
                <div class="panel-body">
                    <!-- New Task Form -->
                    <form action="{{url('admin/' . $user->id)}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Ime</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('user') ? old('user') : $user->name }}" >
                            </div>
                        </div>

                        <!-- Task Description -->
                        <div class="form-group">
                            <label for="task-description" class="col-sm-3 control-label">E-mail</label>
                            <div class="col-sm-6">
                                <input type="text" name="email" id="task-description" class="form-control" value="{{ old('user') ? old('user') : $user->email }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="project-price" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">
                                <input type="text" name="password" id="project-price" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="choose-team" class="col-sm-3 control-label">Uloga</label>
                            <div class="col-sm-6 ">
                                <select id="finished-project" class="form-control" name="role">
                                    <option value="3">Student </option>
                                    <option value="2">Profesor</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-save"></i>Spremi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection