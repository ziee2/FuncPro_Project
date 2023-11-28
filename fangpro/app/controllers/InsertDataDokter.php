<?php

class InsertDataDokter extends Controller {
  public function index()
  {
    $data["judul"] = "Tambah Data Dokter";
    $this->view("templates/header", $data);
    $this->view("InsertDataDokter/index");
    $this->view("templates/footer");
  }
}