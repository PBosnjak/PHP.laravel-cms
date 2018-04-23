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
                    <form action="{{url('prof/' . $task->id)}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Naziv</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') ? old('task') : $task->name }}" >
                            </div>
                        </div>

                        <!-- Task Description -->
                        <div class="form-group">
                            <label for="task-name-en" class="col-sm-3 control-label">Naziv na engleskom</label>
                            <div class="col-sm-6">
                                <input type="text" name="name_en" id="task-name-en" class="form-control" value="{{ old('task') ? old('task') : $task->name_en }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task-goal" class="col-sm-3 control-label">Naziv na engleskom</label>
                            <div class="col-sm-6">
                                <input type="text" name="goal" id="task-goal" class="form-control" value="{{ old('task') ? old('task') : $task->goal }}">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="task-type" class="col-sm-3 control-label">Uloga</label>
                            <div class="col-sm-6 ">
                                <select id="task-type" class="form-control" name="college_type">
                                    <option value="preddiplomski">Preddiplomski</option>
                                    <option value="diplomski">Diplomski</option>
                                    <option value="stručni">Stručni</option>
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