@extends('layout.app')

@section('content')

    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success" style="width: 40%; height: 50px" id="alert">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <?php $no = 1 ?>

    <table class="table text-left">
        <tr>
            <th>№</th>
            <th>Rahbariyat</th>
            <th>Boshqarma</th>
            <th>Bo'lim</th>
            <th>Lavozim</th>
            <th>Xodimlar</th>
            <th style="min-width:200px" class="table text-center">O'z vaqtida bajarilgan<br>topshiriqar ulushi<br>(foizda)</th>
            <th style="min-width:200px" class="table text-center">Ijro intizomi<br>talablariga rioya<br>etilganligi uchun ballar<br>(15-60 ballgacha)</th>
            <th style="min-width:200px" class="table text-center">Tashabbuskorlik<br>uchun ballar<br>(15 ballgacha)</th>
            <th style="min-width:200px" class="table text-center">Yuqori turuvchi rahbar<br>tomonidan belgilangan<br>qo'shimcha ballar<br>(25 ballgacha)</th>
            <th style="min-width:200px" class="table text-center">Umumiy ball</th>
            <th style="min-width:200px" class="table text-center">Ustama foiz miqdori</th>
            <th style="min-width:140px"></th>
        </tr>

        @foreach ($informations as $information)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $information->leadership }}</td>
            <td>{{ $information->department }}</td>
            <td>{{ $information->section }}</td>
            <td>{{ $information->speciality }}</td>
            <td>{{ $information->worker }}</td>
            <td>{{ $information->done }}</td>
            <td>{{ $information->executive_discipline }}</td>
            <td>{{ $information->initiative }}</td>
            <td>{{ $information->extra }}</td>
            <td>{{ $information->total }}</td>
            <td>{{ $information->kpi_per }}</td>
            <td class="text-right pr-5">
                <a href="calculator/delete/{{ $information->id }}" class="btn btn-danger">O'chirish</a>
            </td>
        </tr>
        @endforeach
    </table>

@endsection

@section('script')
<script>
    const message = document.querySelector('#alert')
    setTimeout(() => {
        message.style.display = 'none'
    }, 2000);
</script>
@endsection
