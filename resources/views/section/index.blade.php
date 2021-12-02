@extends('layout.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success" href="section/add" style="width: 200px"> Yangi kiritish </a>
            </div>
            <div class="pull-right mr-5">
                <h2>Bo'limlar</h2>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success" style="width: 40%; height: 50px" id="alert">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table">
        <tr>
            <th>№</th>
            <th>@sortablelink('department_id', 'Boshqarma')</th>
            <th>Bo'lim nomi</th>
        </tr>

        @if ($sections->count() == 0)
            <tr>
                <td colspan="3">Malumot kiritilmagan</td>
            </tr>
        @endif

        @foreach ($sections as $section)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    @foreach ($sections as $department)
                        @if ($section->department_id == $department->id) {{ $department->name }} @endif
                    @endforeach
                </td>
                <td>{{ $section->name }}</td>
                <td class="text-right pr-5">
                    <a href="section/edit/{{ $section->id }}" class="btn btn-primary">Tahrirlash</a>
                    <a href="section/delete/{{ $section->id }}" class="btn btn-danger">O'chirish</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $sections->links() }}
    <p>
        Umumiy ma`lumot: {{ $sections->total() }} tadan  {{$sections->count()}} tasi.
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
