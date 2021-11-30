@extends('layout.app')
@section('content')

<div><a class="btn btn-primary" style="width: 150px" href="/section"> Orqaga </a></div>
    <div class="card card-primary col-md-6" style="margin-left: 15vw; margin-top: -6vh; height: 73vh">
        <div class="card-header" style="width: 102.5%; margin-left: -7.5px">
            <h3 class="card-title"> Bo'lim qo'shish </h3>
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
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/section/add" method="POST" enctype="multipart/form-data">
            {{-- {{ csrf_field() }} --}}
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="department_id" class="col-4"> Boshqarma </label>
                    <select class="col-8 form-control" id="department_id" name="department_id" >
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"> {{ $department->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-4"> Bo`lim </label>
                    <input type="text" class="col-8 form-control" id="name" name="name">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="margin: 10px 10px 15px 20px"> Qo'shish </button>
        </form>
    </div>
@endsection
