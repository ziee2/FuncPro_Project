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
}