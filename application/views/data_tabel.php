<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
</head>

<body>

  <div class="container">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>NO</th>
          <th>QRCode</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Telepon</th>
          <th>Kelamin</th>
          <th>Waktu</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
      foreach ($data_guru as $data_guru) : ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><img width="100px"
              src="<?= base_url()?>/assets/qrcode/qrcode.php?s=qr&d=<?= $data_guru['nik']?><br><?= $data_guru['nama']?><br><?= $data_guru['status']?>&sf=8&ms=r&md=0.8"
              alt="">
          </td>
          <td><?= $data_guru['nik'];?></td>
          <td><?= $data_guru['nama'];?></td>
          <td><?= $data_guru['alamat'];?></td>
          <td><?= $data_guru['telepon'];?></td>
          <td><?= $data_guru['kelamin'];?></td>
          <td><?= $data_guru['waktu'];?></td>
          <td><?= $data_guru['status'];?></td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot>
        <tr>
          <th>NO</th>
          <th>QRCode</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Telepon</th>
          <th>Kelamin</th>
          <th>Waktu</th>
          <th>Status</th>
        </tr>
      </tfoot>
    </table>
  </div>

</body>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
  $('#example').DataTable();
});
</script>

</html>