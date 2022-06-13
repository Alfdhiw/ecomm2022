<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newmenumodal">Add New Data</a>

    <form action="" method="POST">
        <div class="mb-3">
            <input type="text" name="search" id="search" autofocus placeholder="Cari Disini">
            <button type="submit" name="cari" id="cari">Cari</button>

        </div>
    </form>
    <div id="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Kode</th>
                            <th>Makanan</th>
                            <th>Jenis Makanan</th>
                            <th>Stok</th>
                            <th>Harga</th>
                        </tr>
                        <?php
                        if (!empty($model['makanan'])) { // Jika data pada database tidak sama dengan empty (alias ada datanya)
                            foreach ($model['makanan'] as $data) { // Lakukan looping pada variabel makanan dari controller
                                echo "<tr>";
                                echo "<td>" . $data->kode . "</td>";
                                echo "<td>" . $data->makanan . "</td>";
                                echo "<td>" . $data->jenis_makanan . "</td>";
                                echo "<td>" . $data->stok . "</td>";
                                echo "<td>" . $data->harga . "</td>";
                                echo "</tr>";
                            }
                        } else { // Jika data tidak ada
                            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                        }
                        ?>
                    </table>
                </div>
                <?php
                // Tampilkan link-link paginationnya
                echo $model['pagination'];
                ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->