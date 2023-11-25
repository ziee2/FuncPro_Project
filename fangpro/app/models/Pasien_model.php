<?php
class Pasien_model 
{
  private $table = "pasien";
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllPasien()
  {
    $this->db->query("SELECT * FROM " . $this->table);
    return $this->db->resultSet();
  }

  public function getColumnsPasien()
  {
    $this->db->query("SHOW COLUMNS FROM ". $this->table);
    return $this->db->resultSet();
  }

  public function tambahDataPasien($data)
  {
    $query = "INSERT INTO pasien
                VALUES
            ('', :nama, :jenis_kelamin, :Tanggal_Lahir, :Alamat, :Poli, :Status)";
    
    $this->db->query($query);
    $this->db->bind("nama", $data["nama"]);
    $this->db->bind("jenis_kelamin", $data["jenis_kelamin"]);
    $this->db->bind("Tanggal_Lahir", $data["Tanggal_Lahir"]);
    $this->db->bind("Alamat", $data["Alamat"]);
    $this->db->bind("Poli", $data["Poli"]);
    $this->db->bind("Status", $data["Status"]);

    $this->db->execute();
    return $this->db->rowCount();

  }

  public function getPasienById($id)
  {
    $this->db->query("SELECT * FROM ". $this->table . " WHERE ID_Pasien=:id");
    $this->db->bind("id", $id);
    return $this->db->single();
  }

  public function ubahDataPasien($data)
  {
    $query = "UPDATE pasien SET 
              nama = :nama,
              jenis_kelamin = :jenis_kelamin,
              Tanggal_Lahir = :Tanggal_Lahir,
              Alamat = :Alamat,
              Poli = :Poli,
              Status = :Status
            WHERE ID_Pasien = :ID_Pasien;";
    
    $this->db->query($query);
    $this->db->bind("nama", $data["nama"]);
    $this->db->bind("jenis_kelamin", $data["jenis_kelamin"]);
    $this->db->bind("Tanggal_Lahir", $data["Tanggal_Lahir"]);
    $this->db->bind("Alamat", $data["Alamat"]);
    $this->db->bind("Poli", $data["Poli"]);
    $this->db->bind("Status", $data["Status"]);
    $this->db->bind("ID_Pasien", $data["ID_Pasien"]);

    $this->db->execute();
    return $this->db->rowCount();

  }

  public function searchPasien($keyword)
  {
    $columns = $this->getColumnsPasien();
    $conditions = [];
    foreach ( $columns as $columnInfo)
    {
      $column = $columnInfo['Field'];
      $conditions[] = "LOWER($column) LIKE :keyword";
    }
    $this->db->query("SELECT * FROM pasien WHERE " . implode(" OR ", $conditions));
    $this->db->bind("keyword", "%$keyword%");
    $this->db->execute();
    $Pasien = $this->db->resultSet();
    return array_values(
      array_filter(
        $Pasien,
        function($row) use ($columns, $keyword)
          { 
            foreach ($columns as $columnInfo)
            {
              $column = $columnInfo['Field'];
              strpos(strtolower($row[$column]), strtolower($keyword)) !== false;
              return true;
            }
          }
        )
      );
  }
}

