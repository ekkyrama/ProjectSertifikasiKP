@extends('adminlte::page')

@section('title', 'List Data Analog User')

@section('content_header')
    <h1 class="m-0 text-dark">List Data User</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('analogs.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Film</th>
                            <th>Keterangan Cuci</th>
                            <th>Total Harga</th>
                            <th>Link Album Analog</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($analogs as $key => $analog)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$analog->nama_film}}</td>
                                <td>{{$analog->keterangan_cuci}}</td>
                                <td>{{$analog->total_harga}}</td>
                                <td>{{$analog->link_album}}</td>
                                <td>
                                    <a href="{{route('analogs.edit', $analog)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('analogs.destroy', $analog)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush
