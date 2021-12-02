@extends('layout.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success" href="worker/add" style="width: 200px"> Yangi kiritish </a>
            </div>
            <div class="pull-right mr-5">
                <h2>Xodimlar</h2>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success" style="width: 40%; height: 50px" id="alert">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form class="form-inline" method="GET">
        <div class="form-group mb-2">
            <label for="filter" class="col-sm-2 col-form-label px-4">Filter</label>
            <input type="text" class="form-control" id="filter" name="filter" placeholder="Xodim ismi..." value="{{ $filter }}">
        </div>
        <button type="submit" class="btn btn-default mb-2">Filter</button>
    </form>

    <table class="table">
        <tr>
            <th>№</th>
            <th>Ismi</th>
            <th>Familyasi</th>
            <th>@sortablelink('speciality', 'Lavozimi')</th>
            <th>@sortablelink('section_id ', 'Bo\'limi')</th>
            <th>@sortablelink('status', 'Statusi')</th>
        </tr>

        @if ($workers->count() == 0)
            <tr>
                <td colspan="6">Malumot kiritilmagan</td>
            </tr>
        @endif

        @foreach ($workers as $worker)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $worker->name }}</td>
                <td>{{ $worker->surname }}</td>
                <td>{{ $worker->speciality }}</td>
                <td>
                    @foreach ($items as $section)
                        @if ($worker->section_id == $section->id) {{ $section->name }} @endif
                    @endforeach
                </td>
                <td>{{ $worker->status }}</td>
                <td class="text-right pr-5">
                    <a href="worker/edit/{{ $worker->id }}" class="btn btn-primary">Tahrirlash</a>
                    <a href="worker/delete/{{ $worker->id }}" class="btn btn-danger">O'chirish</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $workers->links() }}
    <p>
        Umumiy ma`lumot: {{ $workers->total() }} tadan  {{$workers->count()}} tasi.
    </p>
@endsection

@section('script')
<script>
    const message = document.querySelector('#alert')
    setTimeout(() => {
        message.style.display = 'none'
    }, 2000);
</script>
@endsection
