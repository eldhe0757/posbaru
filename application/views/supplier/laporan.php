<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Suppliers</small>
			</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>dashboard/">Home</a></li>
              <li class="breadcrumb-item active">Data Supplier</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="card card-indigo card-outline">
            <div class="card-header">
                <h3 class="card-title">Data Supplier</h3>
                <div class="float-right">
                </div>
            </div>

            <div style="margin-top: 5px;margin-left: 675px;">
            <div style="width: 200px; margin-left: 400px">
            <a href="<?=site_url('supplier/cetak')?>" class="btn btn-success btn-flat" target="_blank"><i class="fa fa-print"></i> Cetak</a>
            </div>
            </div>
            
            <div class="card-body">
            <table style="margin-top: 10px;" class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
                            <th>#</th>
                            <th>Kode Supplier</th>
                            <th>Nama</th>
                            <th>Telepon/HP</th>
                            <th>Alamat</th>
                            <th>No. Rekening</th>
					</tr>
				</thead>
				<tbody>
          <?php $no = 1;?>
          <?php foreach ($result as $key => $data) { ?>
						<tr>
              <td class="text-center"><?= $no++; ?></td>
              <td class="text-center"><?= $data->kd_supplier ?></td>
							<td><?= $data->nama ?></td>
              <td><?=$data->alamat?></td>
                            <td><?= $data->no_telp ?></td>
							<td><?=$data->nm_bank ?> : <br> <?=$data->no_rek?></td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>
				</tfoot>
			</table>
            </div>
        </div>
    </div>