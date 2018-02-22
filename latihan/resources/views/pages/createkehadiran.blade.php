@extends('app')
@section('content')
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  Tambah Kehadiran
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="col-lg-6">
                    <form role="form" action="{{url('kehadiran/create')}}" method="POST">
                      {{ csrf_field() }}
                        <div class="form-group" {{ $errors->has('karyawan_no') ? ' has-error' : '' }}>
                            <label>Nama</label>
                            <select class="form-control" name="karyawan_no">
                              <option value="">-------</option>
                              @foreach ($karyawan as $data)
                                  <option value="{{$data->no}}">{{$data->nama}}</option>
                              @endforeach
                            </select>

                            @if ($errors->has('karyawan_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('karyawan_no') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group" {{ $errors->has('hari_tanggal') ? ' has-error' : '' }}>
                            <label>Hari Tanggal</label>
                            <input type="date" name="hari_tanggal" class="form-control">
                            @if ($errors->has('hari_tanggal'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('hari_tanggal') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group" {{ $errors->has('jam_datang') ? ' has-error' : '' }}>
                            <label>Jam Datang</label>
                            <input type="time" class="form-control" name="jam_datang">

                            @if ($errors->has('jam_datang'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('jam_datang') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group" {{ $errors->has('jam_pulang') ? ' has-error' : '' }}>
                            <label>Jam Pulang</label>
                            <input type="time" class="form-control timepicker" name="jam_pulang">

                            @if ($errors->has('jam_pulang'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('jam_pulang') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-6 -->
  </div>
@endsection
