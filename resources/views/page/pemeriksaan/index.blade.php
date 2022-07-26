@extends('layouts.master')

@section('navPeriksa', 'active')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
    
                            <div class="" style="float: right">
                                <a href="/pemeriksaan/form" class="btn btn-sm btn-primary">Tambah Data</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table class="table table-nowrap table-sm text-center">
                                <tr>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pasien</th>
                                    <th>Keluhan</th>
                                    <th>Diagnosis</th>
                                    <th>Action</th>
                                </tr>
                                <tbody>
                                    @forelse ($periksa as $item)
                                        <tr>
                                            <th scope="row">{{ $nomor++ }}</th>
                                            <td>{{ $item->tgl_periksa }}</td>
                                            <td>{{ $item->pasiens->nm_pasien }}</td>
                                            <td>{{ $item->keluhan }}</td>
                                            <td>{{ $item->diagnosis }}</td>
                                            <td>
                                                <a href="/pemeriksaan/edit/{{ $item->id }}"
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
                                                                Yakin data Tanggal <b>{{ $item->tgl_periksa }}</b> ingin
                                                                dihapus?
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batal</button>
                                                                <form method="POST" action="/pemeriksaan/{{ $item->id }}">
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
                                            <td colspan="7">No Data</td>
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