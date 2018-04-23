@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dodaj novi rad
                </div>

                <div class="panel-body">



                    <form action="{{ url('prof/new') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Naziv rada</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" >
                            </div>

                        </div>

                        <!-- Task Description -->
                        <div class="form-group">
                            <label for="task-name-en" class="col-sm-3 control-label">Naziv rada na engleskom</label>
                            <div class="col-sm-6">
                                <input type="text" name="name_en" id="task-name-en" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="task-goal" class="col-sm-3 control-label">Cilj</label>
                            <div class="col-sm-6">
                                <input type="text" name="goal" id="task-goal" class="form-control" >
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

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Dodaj rad
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection