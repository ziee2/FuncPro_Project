<?php

class InsertDataApoteker extends Controller {
  public function index()
  {
    $data["judul"] = "Tambah Data Apoteker";
    $this->view("templates/header", $data);
    $this->view("InsertDataApoteker/index");
    $this->view("templates/footer");
  }
}