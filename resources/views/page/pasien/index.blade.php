@extends('layouts.master')

@section('navPasien', 'active')

@section('content')

<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="" style="float: right">
                            <a href="/pasien/form" class="btn btn-sm btn-primary">Tambah Data</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-nowrap table-sm text-center">
                            <tr>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Pasien</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Action</th>
                            </tr>
                            <tbody>
                                @forelse ($pasien as $item)
                                    <tr>
                                        <th scope="row">{{ $nomor++ }}</th>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->nm_pasien }}</td>
                                        <td>{{ $item->tmpt_lahir }}</td>
                                        <td>{{ $item->tgl_lahir }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>
                                            <a href="/pasien/edit/{{ $item->id }}"
                                                class="btn btn-success btn-sm">edit</a>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#modal-default{{ $item->id }}">
                                                hapus
                                            </button>

                                            {{-- Modal Hapus --}}
                                            <div class="modal fade" id="modal-default{{ $item->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Peringatan</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Yakin data Pasien <b>{{ $item->nm_pasien }}</b> ingin
                                                            dihapus?
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <form method="POST" action="/pasien/{{ $item->id }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-primary">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>

@endsection