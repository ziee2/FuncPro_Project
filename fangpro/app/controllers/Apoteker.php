<?php

class Apoteker extends Controller {
  public function index()
  {
    $data["judul"] = "Data Apoteker";
    $data["Apoteker"] = $this->model("Apoteker_model")->getAllApoteker();
    $this->view("templates/header", $data);
    $this->view("Apoteker/index", $data);
    $this->view("templates/footer");
  }

  public function tambahApoteker()
  {
    if ($this->model("Apoteker_model")->tambahDataApoteker($_POST) > 0){
      Flasher::setFlash('Data Apoteker', 'berhasil', 'ditambahkan', 'success');
      header("Location:" . BASEURL . "/Apoteker");
      exit;
    } else{
      Flasher::setFlash('Data Apoteker', 'gagal', 'ditambahkan', 'danger');
      header("Location:" . BASEURL . "/Apoteker");
      exit;
    }
  }

  public function getUbahApoteker()
  {
    echo json_encode($this->model("Apoteker_model")->getApotekerById($_POST["id"]));
  }

  public function editApoteker()
  {
    if ($this->model("Apoteker_model")->ubahDataApoteker($_POST) > 0){
      Flasher::setFlash('Data Apoteker', 'berhasil', 'diubah', 'success');
      header("Location:" . BASEURL . "/Apoteker");
      exit;
    } else{
      Flasher::setFlash('Data Apoteker', 'gagal', 'diubah', 'danger');
      header("Location:" . BASEURL . "/Apoteker");
      exit;
    }
  }

  public function searchDataApoteker()
  {
    $keyword = $_POST["search"] ?? '';
    $data["judul"] = "Data Apoteker";
    $data["Apoteker"] = $this->model("Apoteker_model")->searchApoteker($keyword);
    $this->view("templates/header", $data);
    $this->view("Apoteker/index", $data);
    $this->view("templates/footer");

  }

  public function sortingApoteker()
  {
    $sortColumns = ['nama_Apoteker', 'alamat', 'telepon'];

    $sort = isset($_POST['sort']) && in_array($_POST['sort'], $sortColumns) ? $_POST['sort'] : 'nama_apoteker';
    $order = isset($_SESSION['order']) ? $_SESSION['order'] : 'ASC';

    if (isset($_POST['sort']) && $_POST['sort'] === $sort) {
        $order = $order === 'ASC' ? 'DESC' : 'ASC';
    } else {
        $order = 'ASC';
    }
    $_SESSION['sort'] = $sort;
    $_SESSION['order'] = $order;

    $data["judul"] = "Data Apoteker";
    $data["Apoteker"] = $this->model("Apoteker_model")->sortingDataApoteker($sort, $order);
    $this->view("templates/header", $data);
    $this->view("Apoteker/index", $data);
    $this->view("templates/footer");
  }
}