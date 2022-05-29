<html moznomarginboxes mozdisallowselectionprint>
    <head>
        <title>Laporan Data Suppliers</title>
        <style type="text/css">
        html { font-family: "Verdana, Arial";}
            .content {
                margin: auto;
                width: 29.7cm;
                font-size: 12px;
                padding: 5px;
            }

            article{
                text-align: center;
                font-weight: bold;
            }

            .title {
                text-align: center;
                font-weight: bold;
                padding-bottom: 20px;
                padding-top: 30px;
                border-bottom: 1px solid;
            }

            .head {
                margin-top: 5px;
                margin-bottom: 10px;
                padding-bottom: 10px;
            }
            table, th, td {
                width: 1122px;
                font-size: 14px;
                border: 1px solid black;
                border-collapse: collapse;
            }

            .thanks {
                margin-top: 10px;
                padding-top: 10px;
                text-align: center;
            }

            @media print {
                @page {
                    width: 29.7cm;
                    margin: 21cm;
                }
            }
        </style>
    </head>
    <body onload="window.print()">  
        <div class="content">
            <div class="title">
            <!-- <img style='float: left; margin-left: 120px; width: 150px; height: 100px;' src='<?=site_url('assets/dist/img/photo1.png')?>'> -->
            <article >Sistem Informasi Penjualan Dan Service</article>
      <article style='font-size: 25px;'>BANDUNG COMPUTER</article>
      <article >Jl. Simpang Sungai Bilu No. 18 RT. 06 Banjarmasin Tengah, Banjarmasin 70121</article>
            </div>

            <div class="head">
            <div class=" row" style="margin-top: 10px;">
                <span style="float: right; margin-right: 50px; font-size:11px;">Dicetak oleh: <?=ucfirst($this->session->userdata('nama')) ?></span>
            </div>
            </div>

            <div class="body" style="margin-top: 20px;">
            <h4 style="font-size: 16px;text-align:center">Laporan Data Supplier</h4>    
            <table>
				<thead>
					<tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Kode Supplier</th>
						<th class="text-center">Nama</th>
						<th class="text-center">Telpon/HP</th>
						<th class="text-center">Alamat</th>
						<th class="text-center">Rekening</th>
					</tr>
				</thead>
				<tbody>
          <?php $no = 1;?>
          <?php foreach ($result as $key => $data) { ?>
				<tr>
                    <td style="text-align: center;"><?= $no++; ?></td>
                    <td style="text-align: center;"><?= $data->kd_supplier ?></td>
					<td><?= $data->nama ?></td>
                    <td style="text-align: center;"><?= $data->no_telp ?></td>
                    <td><?= $data->alamat ?></td>
					<td ><?=$data->nm_bank ?> : <br> <?=$data->no_rek?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
            </div>
            <!-- <div class="thanks">
                        ~~~| Terima Kasih |~~~
                        <br>
                        Powered By SIPKom 
                        <br>
                        <small> Sistem Informasi Penjualan Komputer</small>
            </div> -->
        </div>
    </body>
</html>