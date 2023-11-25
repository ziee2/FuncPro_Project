<div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li>
                <a href="<?= BASEURL ?>/Home">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= BASEURL ?>/Pasien">
                    <i class="fas fa-table"></i>
                    <span>Data Pasien</span>
                </a>
            </li>
            <li>
                <a href="<?= BASEURL ?>/Dokter">
                    <i class="fas fa-table"></i>
                    <span>Data Dokter</span>
                </a>
            </li>
            <li>
                <a href="<?= BASEURL ?>/Apoteker">
                    <i class="fas fa-table"></i>
                    <span>Data Apoteker</span>
                </a>
            </li>
            <li>
                <a href="<?= BASEURL ?>/InsertData">
                    <i class="fas fa-table-columns"></i>
                    <span>Tambah Data</span>
                </a>
            </li>
            <li class="logout">
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="main--content">
        <div class="header--wrapper">
            <div class ="header--title">
                <h2>Data Dokter</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <form method="post" action="<?= BASEURL; ?>/Dokter/searchDataDokter">
                        <i class="fas fa-search"></i>
                        <input type="text" id="search" name="search" placeholder="Search" autocomplete="off">
                        <button type="submit" id="tombolCari">Search</button>
                    </form>
                    <!-- Ganti kelas "fasolid" menjadi "fas" -->
                </div>
                <img src="./image/img.jpg" alt=""/>
            </div>            
        </div>
        <div class="tabular--wrapper">
            <h3 class="main--title">Data Dokter</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Dokter</th>
                            <th>Spesialisasi</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( $data["dokter"] as $Dokter) : ?>
                            <tr>
                                <td><?= $Dokter['ID_Dokter']; ?></td>
                                <td><?= $Dokter['nama']; ?></td>
                                <td><?= $Dokter['spesialisasi']; ?></td>
                                <td><?= $Dokter['alamat']; ?></td>
                                <td><?= $Dokter['telepon']; ?></td>
                                <td><a href="<?= BASEURL; ?>/Dokter/editDokter/<?= $Dokter['ID_Dokter']; ?>" class="badge text-bg-success float-right tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $Dokter['ID_Dokter']; ?>">Edit</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="formModalLabel">Edit Data Dokter</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL ?>/Dokter/editDokter" method="post">
                    <input type="hidden" name="ID_Dokter" id="ID_Dokter">

                    <!-- Elemen formulir untuk Nama Pasien -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Dokter</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <!-- Elemen formulir untuk Jenis Kelamin -->
                    <div class="mb-3">
                        <label for="spesialisasi">Spesialisasi</label>
                        <select class="form-select" id="spesialisasi" name="spesialisasi" aria-label="Default select example" required>
                            <option value="L" selected>Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <!-- Elemen formulir untuk TTL -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>

                    <!-- Elemen formulir untuk Alamat -->
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                    </div>

                    <!-- Elemen formulir untuk Poli -->
                    <div class="mb-3">
                        <label for="Poli" class="form-label">Poli</label>
                        <input type="text" class="form-control" id="Poli" name="Poli" required>
                    </div>

                    <!-- Elemen formulir untuk Status -->
                    <div class="mb-3">
                        <label for="Status">Status Pembayaran</label>
                        <select class="form-select" id="Status" name="Status" aria-label="Default select example" required>
                            <option value="Lunas" selected>Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
