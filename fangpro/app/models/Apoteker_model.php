<?php
class Apoteker_model 
{
  private $table = "apoteker";
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllApoteker()
  {
    $this->db->query("SELECT * FROM " . $this->table);
    return $this->db->resultSet();
  }

  public function getColumnsApoteker()
  {
    $this->db->query("SHOW COLUMNS FROM ". $this->table);
    return $this->db->resultSet();
  }

  public function tambahDataApoteker($data)
  {
    $query = "INSERT INTO apoteker
                VALUES
            ('', :nama_Apoteker, :alamat, :telepon)";
    
    $this->db->query($query);
    $this->db->bind("nama_Apoteker", $data["nama_Apoteker"]);
    $this->db->bind("alamat", $data["alamat"]);
    $this->db->bind("telepon", $data["telepon"]);

    $this->db->execute();
    return $this->db->rowCount();

  }

  public function getApotekerById($id)
  {
    $this->db->query("SELECT * FROM ". $this->table . " WHERE ID_Apoteker=:id");
    $this->db->bind("id", $id);
    return $this->db->single();
  }

  public function ubahDataApoteker($data)
  {
    $query = "UPDATE apoteker SET 
              nama_Apoteker = :nama_Apoteker,
              alamat = :alamat,
              telepon = :telepon
            WHERE ID_Apoteker = :ID_Apoteker;";
    
    $this->db->query($query);
    $this->db->bind("ID_Apoteker", $data["ID_Apoteker"]);
    $this->db->bind("nama_Apoteker", $data["nama_Apoteker"]);
    $this->db->bind("alamat", $data["alamat"]);
    $this->db->bind("telepon", $data["telepon"]);

    $this->db->execute();
    return $this->db->rowCount();

  }

  public function searchApoteker($keyword)
  {
    $columns = $this->getColumnsApoteker();
    $conditions = [];
    foreach ( $columns as $columnInfo)
    {
      $column = $columnInfo['Field'];
      $conditions[] = "LOWER($column) LIKE :keyword";
    }
    $this->db->query("SELECT * FROM apoteker WHERE " . implode(" OR ", $conditions));
    $this->db->bind("keyword", "%$keyword%");
    $this->db->execute();
    $Apoteker = $this->db->resultSet();
    return array_values(
      array_filter(
        $Apoteker,
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

