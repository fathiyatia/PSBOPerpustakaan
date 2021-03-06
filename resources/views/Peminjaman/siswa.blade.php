<?php $thisPage="PeminjamanSiswa"; ?>
@extends ('navbar')

@section('content')
<title>Peminjaman Buku Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Peminjaman Buku Siswa
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a><i class="fa fa-exchange"></i> Peminjaman Buku</a></li>
        <li class="active"> Siswa</li>
    
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <!-- Tanggal Pinjam dan Kembali -->
        <?php
        $pinjam       = date("d-F-Y");
        $tujuh_hari   = mktime(0,0,0,date("n"),date("j")+7,date("Y"));
        $kembali      = date("d-F-Y", $tujuh_hari);
        ?>

          <!-- /.box -->
          <div class="box">
          <div class="box-header"> 
             <h3 class="box-title"><a href="/tambahpeminjamansiswa" type="button" class="btn btn-block btn-success" id="tombol">+ Peminjaman Buku</a></h3>
             <h3 class="box-title pull-center"><a href="/peminjamansiswa/export_excel" type="button" class="btn btn-block btn-success" id="tombol"> Export Data</a></h3>
             <h3 class="box-title pull-right"><a href="/peminjamansiswa/deletesiswa" type="button" class="btn btn-block btn-danger">Hapus Data</a></h3>
             
             
          </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kode Buku</th>
                  <th>Judul Buku</th>
                  <th>Tanggal Peminjaman</th>
                  <th>Batas Pengembalian</th>
                  <th>Tanggal Pengembalian</th>
                  <th>Status Pengembalian</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                @foreach($peminjaman as $pinjam)
                  <tr>
                    <td>{{$pinjam->Siswa->NIS}}</td>
                    <td>{{$pinjam->Siswa->Nama}}</td>
                    <td>{{$pinjam->Buku->Kode_BukuInventaris}}</td>
                    <td>{{$pinjam->Buku->Judul_Buku}}</td>
                    <td><?php echo $pinjam->created_at->format('d-F-Y')?></td>
                    <td><?php echo Carbon\Carbon::parse($pinjam->created_at)->addDays(7)->format('d-F-Y');?></td>
                    
                    @if($pinjam->created_at==$pinjam->updated_at)
                    <td><?php echo ' '?></td>
                    @else
                    <td><?php echo $pinjam->updated_at->format('d-F-Y')?></td>
                    @endif
                    
                    <td>{{$pinjam->status}}</td>

                    @if($pinjam->status=='Belum Dikembalikan')
                    <td><button type="button" class="btn btn-block btn-primary btn-sm" data-pinjamid="{{$pinjam->id}}" data-toggle="modal" data-target="#pengembalian">Belum dikembalikan</button></td>
                    @else
                    <td><button type="button" class="btn btn-block btn-primary btn-sm disabled">Sudah dikembalikan</button></td>
                    @endif                    
                  
                  </tr>
                @endforeach

                <!-- <tr>
                  <td>9987223</td>
                  <td>Siti Nurhasanah</td>
                  <td>002344</td>
                  <td>Belajar Ngoding</td>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="btn btn-block btn-primary btn-sm disabled">Sudah dikembalikan</button></td>
                </tr>

                <tr>
                  <td>9987223</td>
                  <td>Siti Nurhasanah</td>
                  <td>002344</td>
                  <td>Belajar Ngoding</td>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#pengembalian">Belum dikembalikan</button></td>
                </tr>

                <tr>
                  <td>9987223</td>
                  <td>Siti Nurhasanah</td>
                  <td>002344</td>
                  <td>Belajar Ngoding</td>
                  <td><?php echo "$pinjam"; ?></td>
                  <td><?php echo "$kembali"; ?></td>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="btn btn-block btn-primary btn-sm disabled">Sudah dikembalikan</button></td>
                </tr>

                <tr>
                  <td>9987223</td>
                  <td>Siti Nurhasanah</td>
                  <td>002344</td>
                  <td>Belajar Ngoding</td>
                  <td><?php echo "$pinjam"; ?></td>
                  <td><?php echo "$kembali"; ?></td>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#pengembalian">Belum dikembalikan</button></td>
                </tr>

                <tr>
                  <td>9987223</td>
                  <td>Siti Nurhasanah</td>
                  <td>002344</td>
                  <td>Belajar Ngoding</td>
                  <td><?php echo "$pinjam"; ?></td>
                  <td><?php echo "$kembali"; ?></td>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="btn btn-block btn-primary btn-sm disabled">Sudah dikembalikan</button></td>
                </tr>

                <tr>
                  <td>9987223</td>
                  <td>Siti Nurhasanah</td>
                  <td>002344</td>
                  <td>Belajar Ngoding</td>
                  <td><?php echo "$pinjam"; ?></td>
                  <td><?php echo "$kembali"; ?></td>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#pengembalian">Belum dikembalikan</button></td>
                </tr>

                <tr>
                  <td>9987223</td>
                  <td>Siti Nurhasanah</td>
                  <td>002344</td>
                  <td>Belajar Ngoding</td>
                  <td><?php echo "$pinjam"; ?></td>
                  <td><?php echo "$kembali"; ?></td>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="btn btn-block btn-primary btn-sm disabled">Sudah dikembalikan</button></td>
                </tr>

                <tr>
                  <td>9987223</td>
                  <td>Siti Nurhasanah</td>
                  <td>002344</td>
                  <td>Belajar Ngoding</td>
                  <td><?php echo "$pinjam"; ?></td>
                  <td><?php echo "$kembali"; ?></td>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#pengembalian">Belum dikembalikan</button></td>
                </tr>

                <tr>
                  <td>9987223</td>
                  <td>Siti Nurhasanah</td>
                  <td>002344</td>
                  <td>Belajar Ngoding</td>
                  <td><?php echo "$pinjam"; ?></td>
                  <td><?php echo "$kembali"; ?></td>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="btn btn-block btn-primary btn-sm disabled">Sudah dikembalikan</button></td>
                </tr>

                <tr>
                  <td>9987223</td>
                  <td>Siti Nurhasanah</td>
                  <td>002344</td>
                  <td>Belajar Ngoding</td>
                  <td><?php echo "$pinjam"; ?></td>
                  <td><?php echo "$kembali"; ?></td>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#pengembalian">Belum dikembalikan</button></td>
                </tr>

                <tr>
                  <td>9987223</td>
                  <td>Siti Nurhasanah</td>
                  <td>002344</td>
                  <td>Belajar Ngoding</td>
                  <td><?php echo "$pinjam"; ?></td>
                  <td><?php echo "$kembali"; ?></td>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="btn btn-block btn-primary btn-sm disabled">Sudah dikembalikan</button></td>
                </tr>

                <tr>
                  <td>9987223</td>
                  <td>Siti Nurhasanah</td>
                  <td>002344</td>
                  <td>Belajar Ngoding</td>
                  <td><?php echo "$pinjam"; ?></td>
                  <td><?php echo "$kembali"; ?></td>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#pengembalian">Belum dikembalikan</button></td>
                </tr> -->
          
            </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- Modal popup -->
  
<div class="modal fade" id="pengembalian">
       <div class="modal-dialog">
  <!-- Modal Content -->
            <div class="modal-content">
              <div class="modal-header">
                <button  type="button" data-dismiss="modal" class="close">&times;</button>
                <h3 class="modal-title">Pengembalian Buku</h3>
              </div>
              <div class="modal-body">
              <form action="/peminjamansiswa/kembalikan" method="POST" id="kembaliForm">
                {{ csrf_field() }}
                <!-- {{ method_field('DELETE') }} -->

                  <h4> Ubah status buku menjadi sudah dikembalikan? </h4>

                  <!-- <input type="hidden" name="_method" value="DELETE"> -->
                  <input type="hidden" name="pinjam_id" id="pinjam_id" value="">

                </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary"> Ya </button>
                <button type="button" class="btn btn-default"  data-dismiss="modal">Batal</button>
              </div>

            </div>
        </div>


<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- page script -->

<script>

  $('#pengembalian').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var pinjam_id = button.data('pinjamid')
      var modal = $(this)
      modal.find('.modal-body #pinjam_id').val(pinjam_id);
  })

</script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>

@endsection
