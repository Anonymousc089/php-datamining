@extends('adminlte::page')

@section('title', 'Prediksi Diabetes')

@section('content_header')

<meta name="csrf-token" content="{{ csrf_token() }}">


  <ol class="breadcrumb">
    <li><a href="/admin/data-training"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Prediksi Data</li>
  </ol>
    
@stop


@section('content')


    <div class="row mt-1" >
            <div class="col-md-12">

            <div class="box box-light">

               <button type="button" id="add-data" class="btn btn-info pull-right mt-1 mr-1">Tambah Data</button>
    <h1 class="ml-1">Prediksi Diabetes Mellitus</h1>
    
       @if(session()->has('message'))
    <div class="ml-1 mr-1 alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
            {{-- Validasi --}}
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                        <strong>{{ 'Wrong Input Format!' }}</strong>
                </ul>
            </div>
            @endif
            {{-- End Validasi --}}
    <div class="table-responsive">
        <table class="table table-striped table-bordered"  id="table-target" style="width:100%;">
            <thead>
              <tr>    
                <th>No.Rekam</th>
                <th>Umur</th>
                <th>JK</th>
                <th>Hamil</th>
                <th>Riwayat</th>
                <th>Keturunan</th>
                <th>Trias</th>
                <th>Ulkus</th>
                <th>TD</th>
                <th>Lila</th>
                <th>IMT</th>
                <th>GDS</th>
                <th>GDP</th>
                <th>GD2PP</th>
                <th>Kolesterol</th>
                <th>Hasil Prediksi</th>
                <th>Probabilitas</th>
                <th>Tindakan</th>
                <th>Hapus Data</th>
              </tr>
            </thead>
           
          </table>
    </div>

            </div>

            </div>
    </div>


       <!-- Modal -->
  <div class="modal fade " id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">
      
        <!-- Modal content-->
        <div class="modal-content ">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambahkan Data</h4>
          </div>
          <div class="modal-body">
            {{-- Validasi --}}
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- End Validasi --}}
   <form action="" id="form-edit-pasien" method="POST" >
              <div class="form-group">
                  <label for="usr">No.Rekam</label>
                  <input type="text" class="form-control" name="norekam" id="norekam" required>
              </div>
              <div class="form-group">
                <label for="usr">Umur</label>
                <input type="text" class="form-control" name="umur" id="umur" required>
              </div>
              <div class="form-group">
                <label for="usr">Jenis Kelamin</label>
               <select class="form-control" name="jk" required>
                  <option value="L">Laki - Laki</option>
                  <option value="P">Perempuan</option>
                </select>
            </div>
                <div class="form-group">
                    <label for="usr">Hamil</label>
                   <select class="form-control" name="hamil" required>
                      <option value="hamil">Hamil</option>
                      <option value="tdk">Tidak</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="usr">Riwayat Penyakit</label>
                 <select class="form-control" name="riwayat" required>
                    <option value="ada">Ada</option>
                    <option value="tdk">Tidak</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="usr">Keturunan</label>
                 <select class="form-control" name="keturunan" required>
                    <option value="ada">Ada</option>
                    <option value="tdk">Tidak</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="usr">Trias</label>
                 <select class="form-control" name="trias" required>
                    <option value="ada">Ada</option>
                    <option value="tdk">Tidak</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="usr">Ulkus</label>
                 <select class="form-control" name="ulkus" required>
                    <option value="ada">Ada</option>
                    <option value="tdk">Tidak</option>
                  </select>
                </div>
                    <div class="form-group">
                        <label for="usr">TD:</label>
                        <input type="text" class="form-control" name="td" id="td" required>
                      </div>
                      <div class="form-group">
                        <label for="usr">Lila:</label>
                        <input type="text" class="form-control" name="lila" id="lila" required>
                      </div>
                      <div class="form-group">
                        <label for="usr">IMT:</label>
                       <input type="text" class="form-control" name="imt" id="imt" required>
                      </div>
                      <div class="form-group">
                        <label for="usr">GDS:</label>
                       <input type="text" class="form-control" name="gds" id="imt" required>
                      </div>
                      <div class="form-group">
                        <label for="usr">GDP:</label>
                       <input type="text" class="form-control" name="gdp" id="gdp" required>
                      </div>
                      <div class="form-group">
                        <label for="usr">GD2PP:</label>
                       <input type="text" class="form-control" name="gd2pp" id="gd2pp" required>
                      </div>
                      <div class="form-group">
                        <label for="usr">Kolesterol:</label>
                       <input type="text" class="form-control" name="kolesterol" id="kolesterol" required>
                      </div>
                        @csrf
                        <input type="hidden" name="_method" value="POST">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                        </form>

                                    
            {{--  --}}
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>

    {{-- modal --}}



@stop

@section('css')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@stop
@section('js')
<script>
  $("#add-data").click(function (e) { 
    e.preventDefault();
    $("#myModal").modal();
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
     var table =$('#table-target').DataTable( {
       "order": [[ 1, "asc" ]],
        dom: 'Blfrtip',
        buttons: [
        ],
     "ajax": "data-target/to-json",
        "columns": [
            { data: 'norekam' },
            { data :'umur' },
            { data :'jk' },
            { data :'hamil' },
            { data :'riwayat' },
            { data :'keturunan' },
            { data :'trias' },
            { data :'ulkus' },
            { data : 'td' },
            { data : 'lila' },
            { data : 'imt' },
            { data : 'gds' },
            { data : 'gdp' },
            { data : 'gd2pp' },
            { data : 'kolesterol' },
            { data : 'prediksi_penyakit' },
            { data : 'probabilitas'},
            { data : 'tindakan' },
            {"defaultContent": "<button class='btn-block btn btn-danger delete-data center col-centered'>Hapus Data!</button>"}
        ],
    } );
    $('#table-target tbody').on( 'click', '.delete-data', function () {
        var data = table.row( $(this).parents('tr') ).data();

        var confirmation = confirm("Data akan di hapus permanen.Apakah anda ingin melanjutkan?");

        if (confirmation) {
            $.ajax({
                method: "POST",
                url: window.location.href + "/" + data.id,
                data: { 
                      _method     :     "delete"       
                 }    
              })
                .done(function( data ) {
                    alert("Data Berhasil Di Hapus");
                    $('#table-target').DataTable().ajax.reload();  
                });
               
           }
       
    } );

});
  </script>
@stop

