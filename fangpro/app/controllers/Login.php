<?php

class Login extends Controller{
  public function index()
  {;
    $this->view("Login/index");
  }

  public function loginUser()
  {
    if ($this->model("Login_model")->login($_POST) > 0){
      Flasher::setFlash('berhasil', 'login', 'success');
      header("Location:" . BASEURL . "/Home");
      exit;
    } else{
      Flasher::setFlash('gagal', 'login', 'danger');
      header('Location:' . BASEURL);
      exit;
    }
  }
}