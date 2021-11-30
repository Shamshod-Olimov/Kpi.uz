@extends('layout.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success" href="department/add" style="width: 200px"> Yangi kiritish </a>
            </div>
            <div class="pull-right mr-5">
                <h2>Boshqarmalar</h2>
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
            <th>Rahbariyat</th>
            <th>Boshqarma nomi</th>
        </tr>
        @foreach ($departments as $department)
            <tr>
                <td>{{ $no++ }}</td>
                <td>
                    @foreach ($leaderships as $leadership)
                        @if ($department->leadership_id == $leadership->id) {{ $leadership->name }} @endif
                    @endforeach
                </td>
                <td>{{ $department->name }}</td>
                <td class="text-right pr-5">
                    <a href="department/edit/{{ $department->id }}" class="btn btn-primary">Tahrirlash</a>
                    <a href="department/delete/{{ $department->id }}" class="btn btn-danger">O'chirish</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{-- {{ $departments->links() }} --}}
@endsection

@section('script')
<script>
    const message = document.querySelector('#alert')
    setTimeout(() => {
        message.style.display = 'none'
    }, 2000);
</script>
@endsection
