<section class="mi my-4 mx-5">
    <div class="container">
        <a href="" class="btn btn-primary float-end mt-4" id="tm" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-print"></i> Print</a>
        <h1>Layanan Pelanggan</h1>
        <h6>Informasi mengenai pencatatan data Layanan Pelanggan</h6>
        <hr>
        <select class="form-select mb-3" name="" id="">
            <option value="">Surat Masuk Terbaru</option>
            <option value="">adaaja</option>
            <option value="">adaaja</option>
            <option value="">adaaja</option>
        </select>
        <table class="table table-hover table-responsive-md" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">No Agenda</th>
                    <th scope="col">Tanggal Surat</th>
                    <th scope="col">Pengirim</th>
                    <th scope="col">Jenis Klaim</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
			<?php $n = 1;
                foreach ($masuk as $ms) : ?>
                    <tr>
                        <td><?= $n ?></td>
                        <td><?= $ms->no_agenda ?></td>
                        <td><?= $ms->tgl_surat ?></td>
                        <td><?= $ms->pengirim ?></td>
                        <td><?= $ms->claim ?></td>
                        <td><?= $ms->catatan ?></td>
                        <td>
                            <a class="btn btn-primary" href=""><i class="fa fa-info"></i></a>
                        </td>
                    </tr>
                <?php $n++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
