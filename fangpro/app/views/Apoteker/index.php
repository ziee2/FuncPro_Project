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
            <li  class="active">
                <a href="<?= BASEURL ?>/InsertDataPasien">
                    <i class="fas fa-table-columns"></i>
                    <span>Tambah Data Pasien</span>
                </a>
            </li>
            <li  class="active">
                <a href="<?= BASEURL ?>/InsertDataDokter">
                    <i class="fas fa-table-columns"></i>
                    <span>Tambah Data Dokter</span>
                </a>
            </li>
            <li  class="active">
                <a href="<?= BASEURL ?>/InsertDataApoteker">
                    <i class="fas fa-table-columns"></i>
                    <span>Tambah Data Apoteker</span>
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
                <h2>Data Apoteker</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <form method="post" action="<?= BASEURL; ?>/Apoteker/searchDataApoteker">
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
            <h3 class="main--title">Data Apoteker</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Apoteker</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( $data["Apoteker"] as $Apoteker) : ?>
                            <tr>
                                <td><?= $Apoteker['ID_Apoteker']; ?></td>
                                <td><?= $Apoteker['nama_Apoteker']; ?></td>
                                <td><?= $Apoteker['alamat']; ?></td>
                                <td><?= $Apoteker['telepon']; ?></td>
                                <td><a href="<?= BASEURL; ?>/Apoteker/editApoteker/<?= $Apoteker['ID_Apoteker']; ?>" class="badge text-bg-success float-right tampilModalUbahApoteker" data-bs-toggle="modal" data-bs-target="#formModalApoteker" data-id="<?= $Apoteker['ID_Apoteker']; ?>">Edit</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="formModalApoteker" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="formModalLabel">Edit Data Apoteker</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL ?>/Apoteker/editApoteker" method="post">
                    <input type="hidden" name="ID_Apoteker" id="ID_Apoteker">

                    <!-- Elemen formulir untuk Nama Pasien -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Apoteker</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
