@extends('layout.app')
@section('content')

<div><a class="btn btn-primary" style="width: 150px" href="/worker"> Orqaga </a></div>
    <div class="card card-primary col-md-6" style="margin-left: 15vw; margin-top: -6vh; height: 73vh">
        <div class="card-header" style="width: 102.5%; margin-left: -7.5px">
            <h3 class="card-title"> Xodim qo'shish </h3>
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
        <form action="/worker/add" method="POST" enctype="multipart/form-data">
            {{-- {{ csrf_field() }} --}}
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-4"> Ism </label>
                    <input type="text" class="col-8 form-control" id="name" name="name">
                </div>
                <div class="form-group row">
                    <label for="surname" class="col-4"> Familya </label>
                    <input type="text" class="col-8 form-control" id="surname" name="surname">
                </div>
                <div class="form-group row">
                    <label for="speciality" class="col-4"> Lavozimi </label>
                    <select class="col-8 form-control" id="speciality" name="speciality" >
                        <option value="Yetakchi mutaxassis"> Yetakchi mutaxassis </option>
                        <option value="Bosh mutaxassis"> Bosh mutaxassis</option>
                        <option value="Bo'lim boshlig'i"> Bo'lim boshlig'i </option>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="section_id" class="col-4"> Bo'limi </label>
                    <select class="col-8 form-control" id="section_id" name="section_id" >
                        @foreach ($items as $section)
                            <option value="{{ $section->id }}"> {{ $section->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-4"> Statusi </label>
                    <select class="col-8 form-control" id="status" name="status" >
                        <option value="Aktiv"> Aktiv </option>
                        <option value="Tatilda"> Tatilda </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="margin: 10px 10px 15px 20px"> Qo'shish </button>
            </div>
        </form>
    </div>
    @endsection
