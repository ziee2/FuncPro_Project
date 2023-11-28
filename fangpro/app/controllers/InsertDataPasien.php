<?php

class InsertDataPasien extends Controller {
  public function index()
  {
    $data["judul"] = "Tambah Data Pasien";
    $this->view("templates/header", $data);
    $this->view("InsertDataPasien/index");
    $this->view("templates/footer");
  }
}