@extends('layouts.master')

@section('title', 'Form Edit Pemeriksaan')
@section('navPeriksa', 'active')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="/pemeriksaan/{{$periksa->id}}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tanggal</label>
                                        <input type="date" value="{{ $periksa->tgl_periksa }}" name="tgl" class="form-control"
                                            id="exampleInputPassword1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Pasien</label>
                                        <select name="nama" class="form-control">
                                            <option value="{{$periksa->pasiens_id}}">-Pilih Pasien-</option>
                                            @foreach ($pasien as $item)
                                                <option value="{{$item->id}}">{{$item->nm_pasien}}</option>  
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Keluhan</label>
                                        <input type="text" value="{{ $periksa->keluhan }}" name="keluhan" class="form-control"
                                            id="exampleInputPassword1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Diagnosis</label>
                                        <input type="text" value="{{ $periksa->diagnosis }}" name="diagnosis" class="form-control"
                                            id="exampleInputPassword1">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endsection
