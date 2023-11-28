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
        
        <form action="<?= BASEURL; ?>/Dokter/tambahDokter" method="post">
            
            <!-- Elemen formulir untuk Nama Pasien -->
            <div class="mb-3">
                <label for="nama_Dokter" class="form-label">Nama Dokter</label>
                <input type="text" class="form-control" id="nama_Dokter" name="nama_Dokter" required>
            </div>

            <!-- Elemen formulir untuk spesialisasi -->
            <div class="mb-3">
                <label for="spesialisasi">Spesialisasi</label>
                <select class="form-select" id="spesialisasi" name="spesialisasi" aria-label="Default select example" required>
                    <option value="Penyakit Dalam" selected>Penyakit Dalam</option>
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

            <!-- Elemen formulir untuk alamat -->
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>

            <!-- Elemen formulir untuk telepon -->
            <div class="mb-3">
                <label for="telepon" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" required>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" name="submit">Tambah Data</button>
        </form>
    </div>

