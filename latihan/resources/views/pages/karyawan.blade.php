@extends('app')
@section('content')
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  Data karyawan
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-4 pull-right">

                      <form class="" action="{{url('karyawan/search')}}" method="get">
                        <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                        </span>
                        </div>
                      </form>


                  </div>
                </div>


                  <div class="table-responsive">
                    <a href="{{url('karyawan/add')}}"><button type="button" class="btn btn-primary">Tambah</button></a>
                      <table class="table table-striped table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Jenis Kelamin</th>
                                  <th>Jabatan</th>
                                  <th>No HP</th>
                                  <th>Alamat</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @if (count($karyawan))
                              @foreach ($karyawan as $data)
                              <tr>
                                  <td>{{$data->no}}</td>
                                  <td>{{$data->nama}}</td>
                                  <td>{{$data->jenis_kelamin}}</td>
                                  <td>{{$data->jabatan}}</td>
                                  <td>{{$data->no_hp}}</td>
                                  <td>{{$data->alamat}}</td>
                                  <td>
                                    <a href="{{url('karyawan/edit/'. $data->no)}}"><button type="button" class="btn btn-info">Ubah</button></a>
                                    <a href="{{url('karyawan/delete/'. $data->no)}}" onclick="return confirm('Apakah anda ingin membatalkan Permohonan ?')"><button type="button" class="btn btn-danger">Hapus</button></a>
                                  </td>
                              </tr>
                              @endforeach

                          </tbody>
                      </table>
                      {!! $karyawan->links() !!}
                    @endif
                  </div>
                  <!-- /.table-responsive -->
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-6 -->
  </div>
@endsection
