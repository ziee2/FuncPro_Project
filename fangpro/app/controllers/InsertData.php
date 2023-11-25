<?php

class InsertData extends Controller {
  public function index()
  {
    $data["judul"] = "Tambah Data";
    $this->view("templates/header", $data);
    $this->view("InsertData/index");
    $this->view("templates/footer");
  }
}