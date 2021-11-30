@extends('layout.app')
@section('content')

<div><a class="btn btn-primary" style="width: 150px" href="/leadership"> Orqaga </a></div>
    <div class="card card-primary col-md-6" style="margin-left: 15vw; margin-top: -6vh; height: 73vh">
        <div class="card-header" style="width: 102.5%; margin-left: -7.5px">
            <h3 class="card-title"> Rahbariyat tarkibini qo'shish </h3>
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
        <form action="/leadership/add" method="POST" enctype="multipart/form-data">
            {{-- {{ csrf_field() }} --}}
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-4"> Nomi </label>
                    <input type="text" class="col-8 form-control" id="name" name="name">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="margin: 10px 10px 15px 20px"> Qo'shish </button>
        </form>
    </div>
@endsection
