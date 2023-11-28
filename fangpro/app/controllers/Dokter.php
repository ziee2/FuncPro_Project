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
}