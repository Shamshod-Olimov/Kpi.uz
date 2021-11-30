@extends('layout.app')
@section('content')

<div><a class="btn btn-primary" style="width: 150px" href="/department"> Orqaga </a></div>
    <div class="card card-primary col-md-6" style="margin-left: 15vw; margin-top: -6vh; height: 73vh">
        <div class="card-header" style="width: 102.5%; margin-left: -7.5px">
            <h3 class="card-title"> Boshqarmani tahrirlash </h3>
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
        @foreach ($departments as $department)
        <form action="/department/edit/{{ $department->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="leadership_id" class="col-4"> Rahbariyat </label>
                    <select class="col-8 form-control" id="leadership_id" name="leadership_id" >
                        @foreach ($leaderships as $leadership)
                            @if ($department->leadership_id == $leadership->id)
                                <option value="{{ $leadership->id }}" selected>
                                    {{ $leadership->name }}
                                </option>
                            @else
                                <option value="{{ $leadership->id }}"> {{ $leadership->name }} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-4"> Boshqrma nomi </label>
                    <input type="text" class="col-8 form-control" id="name" name="name" value="{{ $department->name }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="margin: 10px 10px 15px 20px"> Saqlash </button>
        </form>
        @endforeach
    </div>
@endsection
