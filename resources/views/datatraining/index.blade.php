@extends('adminlte::page')

@section('title', 'Data Training')

@section('content_header')

<meta name="csrf-token" content="{{ csrf_token() }}">


  <ol class="breadcrumb">
    <li><a href="/admin/data-training"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Training</li>
  </ol>
    
@stop


@section('content')
    <div class="row mt-1" >
            <div class="col-md-12">

            <div class="box box-light">

                    <button type="button" id="import" class="btn btn-success pull-right mt-1 mr-1">Import Dari Excel</button>
                    <button type="button" id="hapus" class="btn btn-success pull-right mt-1 mr-1 delete-data">Hapus</button>

                {{-- <button type="button" class="btn btn-primary pull-right mt-1 mr-1">Add New Data</button> --}}


    <h1 class="ml-1">List Data Training</h1>
    @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if($message = Session::get('success'))
              <div class='alert alert-success alert-block'>
                <button type='button' class='close' data-dismiss="alert">x</button>
              <strong>{{$message}}</strong>
              </div>
            @endif
    <div class="table-responsive">
        <table class="table table-striped"  id="table-training" style="width:100%;">
            <thead>
              <tr> 
                <th>No.</th>
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
                <th>Penyakit</th>
                
                
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
            <h4 class="modal-title">Upload Data Excel</h4>
          </div>
          <div class="modal-body">
              <form action="{{ route('data-training-import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-primary">Import Data</button>
            </form>
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
  $("#import").click(function (e) { 
    e.preventDefault();
    $("#myModal").modal();
    
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

});


$(document).ready(function () {

    var table =$('#table-training').DataTable( {

       "order": [[ 7, "asc" ]],
        dom: 'Blfrtip',
        buttons: [
            // {

            //     extend: 'print',
            //     text: 'Print ',
            //     autoPrint: true,
            //     orientation: 'landscape',
            //     exportOptions: {
            //         columns: [ 0, 1, 2, 3 ,4 ,5 ,6 ],
            //         modifier: {
            //             page: 'current',
            //             columns: ':visible',
                        
            //         }
            //     },
            //     customize: function (win) {
            //         $(win.document.body).find('table').addClass('display').css('font-size', '15px');
            //         $(win.document.body).find('h1').css('text-align','center').addClass('header');
            //         $(win.document.body).find('.header').html('Daftar Pasien');
            //         /* $(win.document.body).find('button').css('display','none'); */
            //         /* $(win.document.body).find('h1').html('Hello'); */
            //     },
              
            // },
            // {
            //     extend: 'excelHtml5',
            //     orientation: 'landscape',
            //     exportOptions: {
            //         columns: [ 0, 1, 2, 3 ,4 ,5 ,6 ],
            //         modifier: {
            //             page: 'current',
            //             columns: ':visible',
                        
            //         }
                    
            //     }, customize: function ( xlsx ) {
            //         var sheet = xlsx.xl.worksheets['sheet1.xml'];
 
            //             // jQuery selector to add a border
                        
            //             $('row c[r*="10"]', sheet).attr( 's', '25' );
            //        }
                
            // }
           

        ],
     "ajax": "data-training/to-json",
        "columns": [
            { data :'norekam' },
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
            { data : 'penyakit' },
            //{ data : 'batch' },
            //{"defaultContent": "<button class='btn-block btn btn-danger delete-data center col-centered'>Hapus Data!</button>"}
        ],
        
    } );

    // $('#tablePasien tbody').on( 'click', '.lihat-data', function () {
    //     var data = table.row( $(this).parents('tr') ).data();

    //     $(".lihat-data").attr("href", "pasien/detailpasien=" +data.id);
        
    //     console.log(data);
    // } );



    $('.delete-data').click(function () {
      var data = table.row( $(this).parents('tr') ).data();

      var confirmation = confirm("Data akan di hapus permanen.Apakah anda ingin melanjutkan?");

      if (confirmation) {
        $.ajax({
        method: "POST",
        url: window.location.href + "/hapusin",
        data: { 
              _method     :     "delete"       
         }    
      })
        .done(function( data ) {
            $('#table-training').DataTable().ajax.reload();  
        });
       
   }
    } );

});




  </script>

@stop