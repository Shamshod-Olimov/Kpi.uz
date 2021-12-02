@extends('layout.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success" href="leadership/add" style="width: 200px"> Yangi kiritish </a>
            </div>
            <div class="pull-right mr-5">
                <h2> Rahbariyat tarkibi </h2>
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
            <th>Nomi</th>
        </tr>

        @if ($leaderships->count() == 0)
            <tr>
                <td colspan="2">Malumot kiritilmagan</td>
            </tr>
        @endif

        @foreach ($leaderships as $leadership)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $leadership->name }}</td>
                <td class="text-right pr-5">
                    <a href="leadership/edit/{{ $leadership->id }}" class="btn btn-primary">Tahrirlash</a>
                    <a href="leadership/delete/{{ $leadership->id }}" class="btn btn-danger">O'chirish</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $leaderships->links() }}
    <p>
        Umumiy ma`lumot: {{ $leaderships->total() }} tadan  {{$leaderships->count()}} tasi.
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
