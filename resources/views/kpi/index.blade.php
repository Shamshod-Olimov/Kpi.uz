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
        </tr>

        @foreach ($workers as $worker)


        <?php
            $status = $worker->status;
            $worker_name = "$worker->name" . " " . "$worker->surname";
            $name = 'Blabla';
        ?>

        @foreach ($kpis as $kpi)
            @if ($kpi->worker == $worker_name)
                <div style="display: none">
                    {{ $name = $kpi->worker }}
                </div>
            @endif
        @endforeach

        @if ($status == 'Aktiv' && $worker_name != $name)
            <form method="POST" action="/calculator">
            @csrf
            <tr>
                <td>{{ $no++ }}</td>
                <td>
                @foreach ($sections as $section)
                @foreach ($departments as $department)
                @foreach ($leaderships as $leadership)
                    @if ($department->leadership_id == $leadership->id && $section->department_id == $department->id && $worker->section_id == $section->id )
                        <input
                            style="border:none"
                            type="text"
                            id="leadership"
                            name="leadership"
                            value="{{ $leadership->name }}"
                            placeholder="{{ $leadership->name }}"
                            readonly>
                    @else

                    @endif
                @endforeach
                @endforeach
                @endforeach
                </td>

                <td>
                @foreach ($sections as $section)
                @foreach ($departments as $department)
                    @if ($section->department_id == $department->id && $worker->section_id == $section->id)
                        <input
                            style="border:none"
                            type="text"
                            id="department"
                            name="department"
                            value="{{ $department->name }}"
                            placeholder="{{ $department->name }}"
                            readonly>
                    @else

                    @endif
                @endforeach
                @endforeach
                </td>

                <td>
                @foreach ($sections as $section)
                    @if ($worker->section_id == $section->id)
                        <input
                            style="border:none"
                            type="text"
                            id="section"
                            name="section"
                            value="{{ $section->name }}"
                            placeholder="{{ $section->name }}"
                            readonly>
                    @else

                    @endif
                @endforeach
                </td>

                <td><input style="border:none" type="text" name="speciality" value="{{ $worker->speciality }}" placeholder="{{ $worker->speciality }}" readonly></td>
                <td><input style="border:none" type="text" name="worker" value="{{ $worker->name }} {{ $worker->surname }}" placeholder="{{ $worker->name }} {{ $worker->surname }}" readonly></td>
                <td><input type="number" class="form-control" name="a" min="0" max="100" value="{{ $a }}"></td>
                <td><input type="number" class="form-control" name="b" min="0" max="60" value="{{ $b }}"></td>
                <td><input type="number" class="form-control" name="c" min="0" max="15" value="{{ $c }}"></td>
                <td><input type="number" class="form-control" name="d" min="0" max="25" value="{{ $d }}"></td>
                <td>
                    <button type="submit" class="btn btn-success" style="width: 150px"> Hisoblash </button>
                </td>

                <td>
                    @if (isset($all))
                    <p>{{ $all }}ball</p>
                    @endif
                </td>
                <td>
                    @if (isset($percent))
                    <p>{{ $percent }}%</p>
                    @endif
                </td>
            </tr>
            </form>
        @endif
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
