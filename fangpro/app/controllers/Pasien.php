<?php

class Pasien extends Controller {
  public function index()
  {
    $data["judul"] = "Data Pasien";
    $data["psn"] = $this->model("Pasien_model")->getAllPasien();
    $this->view("templates/header", $data);
    $this->view("Pasien/index", $data);
    $this->view("templates/footer");
  }

  public function tambahPasien()
  {
    if ($this->model("Pasien_model")->tambahDataPasien($_POST) > 0){
      Flasher::setFlash('Data Pasien', 'berhasil', 'ditambahkan', 'success');
      header("Location:" . BASEURL . "/Pasien");
      exit;
    } else{
      Flasher::setFlash('Data Pasien', 'gagal', 'ditambahkan', 'danger');
      header("Location:" . BASEURL . "/Pasien");
      exit;
    }
  }

  public function getUbahPasien()
  {
    echo json_encode($this->model("Pasien_model")->getPasienById($_POST["id"]));
  }

  public function editPasien()
  {
    if ($this->model("Pasien_model")->ubahDataPasien($_POST) > 0){
      Flasher::setFlash('Data Pasien', 'berhasil', 'diubah', 'success');
      header("Location:" . BASEURL . "/Pasien");
      exit;
    } else{
      Flasher::setFlash('Data Pasien', 'gagal', 'diubah', 'danger');
      header("Location:" . BASEURL . "/Pasien");
      exit;
    }
  }

  public function searchDataPasien()
  {
    $keyword = $_POST["search"] ?? '';
    $data["judul"] = "Data Pasien";
    $data["psn"] = $this->model("Pasien_model")->searchPasien($keyword);
    $this->view("templates/header", $data);
    $this->view("Pasien/index", $data);
    $this->view("templates/footer");

  }

  public function sortingPasien()
  {
    $sortColumns = ['ID', 'nama', 'jenis_kelamin', 'Tanggal_Lahir', 'Alamat', 'Poli', 'Status'];

    // Ambil nilai sort dari $_POST atau gunakan default 'nama' jika tidak ada
    $sort = isset($_POST['sort']) && in_array($_POST['sort'], $sortColumns) ? $_POST['sort'] : 'nama';
    $order = isset($_SESSION['order']) ? $_SESSION['order'] : 'ASC';

    // Jika sort yang dipilih sama dengan sort sebelumnya, ubah urutan
    if (isset($_POST['sort']) && $_POST['sort'] === $sort) {
        $order = $order === 'ASC' ? 'DESC' : 'ASC';
    } else {
        // Jika sort berbeda, reset urutan ke 'ASC'
        $order = 'ASC';
    }
    // Simpan sort dan order di dalam session
    $_SESSION['sort'] = $sort;
    $_SESSION['order'] = $order;

    $data["judul"] = "Data Pasien";
    $data["psn"] = $this->model("Pasien_model")->sortingDataPasien($sort, $order);
    $this->view("templates/header", $data);
    $this->view("Pasien/index", $data);
    $this->view("templates/footer");
  }
}