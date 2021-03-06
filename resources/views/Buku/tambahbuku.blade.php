<?php $thisPage="Buku"; ?>
@extends ('navbar')

@section('content')
<title>Tambah Buku</title>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah buku
      </h1>
      <ol class="breadcrumb">
        <li><a href="/buku"><i class="fa fa-book"></i>  Bahan Pustaka</a></li>
        <li class="active">Tambah Buku</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Bahan Pustaka</h3>
            </div>
            <!-- /.box-header -->

            @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif

            <!-- form start -->
            <form action="/buku/tambahbuku/proses" method="POST" enctype="multipart/form-data" role="form">
             {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul Buku</label>
                  <input name="Judul_Buku" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Gambar Buku</label>
                  <input type="file" id="exampleInputFile" name="Gambar">

                  <p class="help-block">Format file : PNG,JPG,JPEG</p>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Kode Buku Inventaris</label>
                  <input name="Kode_BukuInventaris" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Kode Buku Lemari</label>
                  <input name="Kode_BukuLemari" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                  <label>Kategori Buku</label>
                  <select name="Kategori" class="form-control">
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Fiksi">Fiksi</option>
                    <option value="Non_Fiksi">Non Fiksi</option>
                    <option value="Agama">Agama</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Jenis Pustaka</label>
                  <select name="JenisPustaka" class="form-control">
                    <option value="Buku">Buku</option>
                    <option value="Modul">Modul</option>
                    <option value="Jurnal">Jurnal</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Pengarang</label>
                  <input name="Pengarang" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Buku</label>
                  <input name="Jumlah_Buku" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Keterangan</label>
                  <input name="Keterangan" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

  <!-- /.content-wrapper -->


    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- page script -->

@endsection
