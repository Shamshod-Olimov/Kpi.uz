@extends('layout.app')
@section('content')

<div><a class="btn btn-primary" style="width: 150px" href="/section"> Orqaga </a></div>
    <div class="card card-primary col-md-6" style="margin-left: 15vw; margin-top: -6vh; height: 73vh">
        <div class="card-header" style="width: 102.5%; margin-left: -7.5px">
            <h3 class="card-title"> Bo'limni tahrirlash </h3>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Kiritish bilan bog'liq xatolik. <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @foreach ($sections as $section)
            <form action="/section/edit/{{ $section->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="department_id" class="col-4"> Boshqarma </label>
                        <select class="col-8 form-control" id="department_id" name="department_id" >
                            @foreach ($departments as $department)
                                @if ($section->department_id == $department->id)
                                    <option value="{{ $department->id }}" selected>
                                        {{ $department->name }}
                                    </option>
                                @else
                                    <option value="{{ $department->id }}"> {{ $department->name }} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-4"> Nomi </label>
                        <input type="text" class="col-8 form-control" id="name" name="name" value="{{ $section->name }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin: 10px 10px 15px 20px"> Saqlash </button>
            </form>
        @endforeach


    </div>
@endsection
