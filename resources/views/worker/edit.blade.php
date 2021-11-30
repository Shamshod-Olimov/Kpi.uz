@extends('layout.app')
@section('content')

<div><a class="btn btn-primary" style="width: 150px" href="/worker"> Orqaga </a></div>
    <div class="card card-primary col-md-6" style="margin-left: 15vw; margin-top: -6vh; height: 73vh">
        <div class="card-header" style="width: 102.5%; margin-left: -7.5px">
            <h3 class="card-title">Update worker</h3>
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
        @foreach ($workers as $worker)
        <form action="/worker/edit/{{ $worker->id }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-4"> Ism </label>
                    <input type="text" class="col-8 form-control" id="name" name="name" value="{{ $worker->name }}">
                </div>
                <div class="form-group row">
                    <label for="surname" class="col-4"> Familya </label>
                    <input type="text" class="col-8 form-control" id="surname" name="surname" value="{{ $worker->surname }}">
                </div>
                <div class="form-group row">
                    <label for="speciality" class="col-4"> Lavozimi </label>
                    <select class="col-8 form-control" id="speciality" name="speciality" >
                        <option value="Yetakchi mutaxassis" @if('Yetakchi mutaxassis' == $worker->speciality) selected @endif> Yetakchi mutaxassis </option>
                        <option value="Bosh mutaxassis" @if('Bosh mutaxassis' == $worker->speciality) selected @endif> Bosh mutaxassis</option>
                        <option value="Bo'lim boshlig'i" @if("Bo'lim boshlig'i" == $worker->speciality) selected @endif> Bo'lim boshlig'i </option>
                      </select>
                </div>
                <div class="form-group row">
                    <label for="section_id" class="col-4"> Bo'limi </label>
                    <select class="col-8 form-control" id="section_id" name="section_id" >
                        @foreach ($items as $section)
                            @if ($worker->section_id == $section->id)
                                <option value="{{ $section->id }}" selected>
                                    {{ $section->name }}
                                </option>
                            @else
                                <option value="{{ $section->id }}"> {{ $section->name }} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-4"> Statusi </label>
                    <select class="col-8 form-control" id="status" name="status" >
                        <option value="Aktiv" @if('Aktiv' == $worker->status) selected @endif> Aktiv </option>
                        <option value="Tatilda" @if('Tatilda' == $worker->status) selected @endif> Tatilda </option>
                      </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="margin: 10px 10px 15px 20px"> Saqlash </button>
        </form>
        @endforeach
    </div>
@endsection
