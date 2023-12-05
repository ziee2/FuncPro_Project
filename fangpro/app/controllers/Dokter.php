<?php

class Dokter extends Controller {
  public function index()
  {
    $data["judul"] = "Data Dokter";
    $data["dokter"] = $this->model("Dokter_model")->getAllDokter();
    $this->view("templates/header", $data);
    $this->view("Dokter/index", $data);
    $this->view("templates/footer");
  }

  public function tambahDokter()
  {
    if ($this->model("Dokter_model")->tambahDataDokter($_POST) > 0){
      Flasher::setFlash('Data Dokter', 'berhasil', 'diubah', 'success');
      header("Location:" . BASEURL . "/Dokter");
      exit;
    } else{
      Flasher::setFlash('Data Dokter', 'gagal', 'ditambahkan', 'danger');
      header("Location:" . BASEURL . "/Dokter");
      exit;
    }
  }

  public function getUbahDokter()
  {
    echo json_encode($this->model("Dokter_model")->getDokterById($_POST["id"]));
  }

  public function editDokter()
  {
    if ($this->model("Dokter_model")->ubahDataDokter($_POST) > 0){
      Flasher::setFlash('Data Dokter', 'berhasil', 'diubah', 'success');
      header("Location:" . BASEURL . "/Dokter");
      exit;
    } else{
      Flasher::setFlash('Data Dokter', 'gagal', 'diubah', 'danger');
      header("Location:" . BASEURL . "/Dokter");
      exit;
    }
  }

  public function searchDataDokter()
  {
    $keyword = $_POST["search"] ?? '';
    $data["judul"] = "Data Dokter";
    $data["dokter"] = $this->model("Dokter_model")->searchDokter($keyword);
    $this->view("templates/header", $data);
    $this->view("Dokter/index", $data);
    $this->view("templates/footer");

  }

  public function sortingPasien()
  {
    $sortColumns = ['nama_Dokter', 'spesialisasi', 'alamat', 'telepon'];
    $sort = isset($_POST['sort']) && in_array($_POST['sort'], $sortColumns) ? $_POST['sort'] : 'nama_Dokter';
    $order = isset($_SESSION['order']) ? $_SESSION['order'] : 'ASC';

    if (isset($_POST['sort']) && $_POST['sort'] === $sort) {
        $order = $order === 'ASC' ? 'DESC' : 'ASC';
    } else {
        $order = 'ASC';
    }
    $_SESSION['sort'] = $sort;
    $_SESSION['order'] = $order;

    $data["judul"] = "Data Dokter";
    $data["psn"] = $this->model("Dokter_model")->sortingDataDokter($sort, $order);
    $this->view("templates/header", $data);
    $this->view("Dokter/index", $data);
    $this->view("templates/footer");
  }
}