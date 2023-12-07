<?php

class Home extends Controller{
  public function index()
  {
    $data["judul"] = "Dashboard I-Care";
    $data["jumlahPasien"] = $this->model("Pasien_model")->countPasien();
    $data["jumlahDokter"] = $this->model("Dokter_model")->countDokter();
    $data["jumlahApoteker"] = $this->model("Apoteker_model")->countApoteker();
    $this->view("templates/header", $data);
    $this->view("home/index", $data);
    $this->view("templates/footer");
  }
}