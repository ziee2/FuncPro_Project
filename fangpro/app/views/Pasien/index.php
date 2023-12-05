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
    <div class="main--content">
        <div class="row">
            <div class="col-lg-6">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <div class="header--wrapper">
            <div class ="header--title">
                <h2>Data Pasien</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <form method="post" action="<?= BASEURL; ?>/Pasien/searchDataPasien">
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
            <h3 class="main--title">Data Pasien</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>Poli</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( $data["psn"] as $psn) : ?>
                            <tr>
                                <td><?= $psn['ID_Pasien']; ?></td>
                                <td><?= $psn['nama']; ?></td>
                                <td><?= $psn['jenis_kelamin']; ?></td>
                                <td><?= $psn['Tanggal_Lahir']; ?></td>
                                <td><?= $psn['Alamat']; ?></td>
                                <td><?= $psn['Poli']; ?></td>
                                <td><?= $psn['Status']; ?></td>
                                <td><a href="<?= BASEURL; ?>/Pasien/editPasien/<?= $psn['ID_Pasien']; ?>" class="badge text-bg-success float-right tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $psn['ID_Pasien']; ?>">Edit</a></td>
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
                    <h1 class="modal-title fs-5" id="formModalLabel">Edit Data Pasien</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL ?>/Pasien/editPasien" method="post">
                    <input type="hidden" name="ID_Pasien" id="ID_Pasien">

                    <!-- Elemen formulir untuk Nama Pasien -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <!-- Elemen formulir untuk Jenis Kelamin -->
                    <div class="mb-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" aria-label="Default select example" required>
                            <option value="L" selected>Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <!-- Elemen formulir untuk TTL -->
                    <div class="mb-3">
                        <label for="Tanggal_Lahir" class="form-label">TTL</label>
                        <input type="text" class="form-control" id="Tanggal_Lahir" name="Tanggal_Lahir" required>
                    </div>

                    <!-- Elemen formulir untuk Alamat -->
                    <div class="mb-3">
                        <label for="Alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="Alamat" name="Alamat" required>
                    </div>

                    <!-- Elemen formulir untuk Poli -->
                    <div class="mb-3">
                        <label for="Poli">Poli</label>
                        <select class="form-select" id="Poli" name="Poli" aria-label="Default select example" required>
                            <option value="Umum" selected>Umum</option>
                            <option value="Penyakit Dalam">Penyakit Dalam</option>
                            <option value="Anak">Anak</option>
                            <option value="Saraf">Saraf</option>
                            <option value="Kandungan dan Ginekologi">Kandungan dan Ginekologi</option>
                            <option value="Bedah">Bedah</option>
                            <option value="Kulit dan Kelamin">Kulit dan Kelamin</option>
                            <option value="THT">THT</option>
                            <option value="Mata">Mata</option>
                            <option value="Psikiater">Psikiater</option>
                            <option value="Gigi">Gigi</option>
                        </select>
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
