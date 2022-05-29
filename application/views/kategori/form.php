<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Kategori</small>
			</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>assets/#">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
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
                <h3 class="card-title"><?=$page?> Data Kategori</h3>
                <div class="float-right">
                    <a href="<?=site_url('kategori')?>" class="btn btn-warning">
                        <i class="fa fa-undo"></i> Kembali</a>
                </div> 
            </div>
            <div class="card-body"> 
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="<?=site_url('kategori/proses') ?>" method="post">
                        <div class="row col-md-12">
                                <div style="<?=$disp1?>" class="form-group col-md-6 ">
                                    <label for=""> Kode Kategori</label>
                                    <input type="text" value="<?=$kdsup ?>" name="kd_ktg" id="" class="form-control" readonly> 
                                </div>
                                <div style="<?=$disp2?>" class="form-group col-md-6 ">
                                    <label for=""> Kode Kategori</label>
                                    <input type="text" value="<?=$row->kd_ktg ?>" name="kdktg" id="" class="form-control" readonly> 
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="id" value="<?=$row->id_kategori ?>">
                                    <label for=""> Nama kategori *</label>
                                    <input type="text" value="<?=$row->nama ?>" name="nama" id="" class="form-control" required> 
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