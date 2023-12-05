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
        
        <form action="<?= BASEURL; ?>/Pasien/tambahPasien" method="post">
            
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

            <!-- Tombol Submit -->
            <div class="d-grid gap-2">
                <button class="btn btn-secondary" type="submit" name="submit">Tambah Data</button>
            </div>
        </form>
    </div>

