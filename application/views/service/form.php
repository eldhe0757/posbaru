<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Service</small>
			</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>assets/#">Home</a></li>
              <li class="breadcrumb-item active">Service</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="card card-<?=$warna?> card-outline">
            <div class="card-header">
                <h3 class="card-title"><?=$page?> Data Service</h3>
                <!-- <div class="float-right">
                    <a href="<?=site_url('Service')?>" class="btn btn-warning">
                        <i class="fa fa-undo"></i> Kembali</a>
                </div>  -->
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-3">
                        <form action="<?=site_url('service/proses') ?>" method="post">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <input type="hidden" name="id" value="">
                                    <label for=""> Nomor Service </label>
                                    <input type="text" value="<?=$noserv?>" name="no_service" id="no_service" class="form-control" readonly> 
                                </div>
                                
                                <div class="form-group col-md-4" style="margin-left: 50px;">
                                    <label for=""> Customer </label>
                                    <div class="form-group input-group">
                                    <input type="hidden" id="id_customer">
                                    <input type="text" id="nama" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-flat" data-toggle="modal" data-target="#mcust">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for=""> Kategori </label>
                                    <select style="width: 210px;" name="kategori" id="kategori" class="form-control">
                                        <option value="">- Pilih -</option>    
                                        <option value="Laptop">Laptop</option>
                                        <option value="Komputer">Komputer</option>
                                        <option value="Printer">Printer</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4" style="margin-left: 50px;">
                                    <label for=""> Barang </label>
                                    <input type="text" value="" name="nama_barang" id="nama_barang" class="form-control"> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for=""> Kelengkapan </label>
                                    <textarea name="kelengkapan" id="kelengkapan"  rows="2" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-md-4" style="margin-left: 50px;">
                                    <label for=""> Keluhan </label>
                                    <textarea name="keluhan" id="keluhan"  rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for=""> Kerusakan </label>
                                    <textarea name="kerusakan" id="kerusakan"  rows="2" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-md-4" style="margin-left: 50px;">
                                    <label for=""> Sparepart </label>
                                    <textarea name="sparepart" id="sparepart" rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for=""> Biaya Service </label>
                                    <input type="number" value="" name="biaya_service" id="biaya_service" class="form-control" required> 
                                </div>
                                <div class="form-group col-md-4" style="margin-left: 50px;">
                                    <label for=""> Uang Muka </label>
                                    <input type="number" value="" name="dp" id="dp" class="form-control" required> 
                                </div>
                            </div>
                        
                            <div class="form-group float-right">
                                <button type="reset" class="btn btn-info">
                                    <i class="fa fa-paper-plane"></i> reset</button>
                                <button type="submit" name="<?=$page?>" class="btn btn-info">
                                    <i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mcust">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row col-md-12">
            <div class="col-md-4">
                <label for="">Nama</label>
                <input name="kdcs" id="kdcs" type="hidden" value="<?=$kcs?>"  class="form-control update">
                <input name="namacust" id="namacust" type="text"  class="form-control nama">
            </div>
            <div class="col-md-4">
                <label for="">Alamat</label>
                <input name="alamat" id="alamat" type="text"  class="form-control alamat">
            </div>
            <div class="col-md-4">
                <label for="">Telpon/HP</label>
                <input name="hp" id="hp" type="number"  class="form-control hp">
            </div>
            <div style="margin-left: 390px; margin-top:10px">
                <button name="addcust" id="addcust" class="btn btn-primary insert">Tambah</button>
            </div>
	</div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table3" style="width: 100%;" > 
                    <thead>
                        <tr>
                            <td>Kode Customer</td>
                            <td>Nama</td>
                            <td>Actions</td> 
                        </tr>
                    </thead>
                    <tbody id="show_data">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  

<script>
$(document).ready(function(){
    tampil();
    $('#table3').DataTable();

    function tampil(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url()?>service/tampilkandata',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].kd_cust+'</td>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td style="text-align:right;">'+
                                '<button class="btn btn-xs btn-info" id="pcust"data-id="'+data[i].id_customer+'"data-nama="'+data[i].nama+'"data-hp="'+data[i].no_telp+'"><i class="fa fa-check"></i> Pilih</button>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }

        $('#addcust').on('click', function () {
    var kdcs = $('#kdcs').val();
    var nm = $('#namacust').val();
    var al = $('#alamat').val();
    var hp = $('#hp').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('service/simpan_cust')?>",
        dataType: "JSON",
        data: { kdcs: kdcs, namacust: nm, alamat: al, hp : hp },
        success: function (data) {
           
           $('#namacust').val("");
           $('#alamat').val("");
           $('#hp').val("");
           $(".update").empty().append(data);
           tampil();
           count();
     }
   });
   return false;
});

    $(document).on('click', '#pcust', function(){
      $('#id_customer').val($(this).data('id'));
      $('#nama').val($(this).data('nama'));
      $('#mcust').modal('hide');
    });
      });

      function count(){
          var $g = $('#kdcs').val();
          $t = substr($g,9);

          $n = $t + 1;
            $no = sprintf("%'.04d", $n);
            $('#kdcs').val($no);
      }

</script>