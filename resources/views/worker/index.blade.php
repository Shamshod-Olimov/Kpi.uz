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

    <?php $no = 1 ?>

    <table class="table">
        <tr>
            <th>№</th>
            <th>Ismi</th>
            <th>Familyasi</th>
            <th>Lavozimi</th>
            <th>Bo'limi</th>
            <th>Statusi</th>
        </tr>
        @foreach ($workers as $worker)
            <tr>
                <td>{{ $no++ }}</td>
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
    {{-- {{ $users->links() }} --}}
@endsection

@section('script')
<script>
    const message = document.querySelector('#alert')
    setTimeout(() => {
        message.style.display = 'none'
    }, 2000);
</script>
@endsection
