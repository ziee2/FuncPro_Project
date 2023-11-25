<?php

class Flasher {
  public static function setFlash($massage, $action, $type)
  {
    $_SESSION['flash'] = 
    [
      'massage'=> $massage,
      'action'=> $action,
      'type'=> $type
    ];
  }

  public static function flash()
  {
    if (isset($_SESSION['flash']))
    {
      echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert"> Data Pasien
              <strong>' . $_SESSION['flash']['massage'] . '</strong> ' . $_SESSION['flash']['action'] . '
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      unset($_SESSION['flash']);
    }
  }
}