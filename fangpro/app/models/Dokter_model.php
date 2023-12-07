<?php
class Dokter_model 
{
  private $table = "dokter";
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllDokter()
  {
    $this->db->query("SELECT * FROM " . $this->table);
    return $this->db->resultSet();
  }

  public function getColumnsDokter()
  {
    $this->db->query("SHOW COLUMNS FROM ". $this->table);
    return $this->db->resultSet();
  }

  public function tambahDataDokter($data)
  {
    $query = "INSERT INTO dokter
                VALUES
            ('', :nama_Dokter, :spesialisasi, :alamat, :telepon)";
    
    $this->db->query($query);
    $this->db->bind("nama_Dokter", $data["nama_Dokter"]);
    $this->db->bind("spesialisasi", $data["spesialisasi"]);
    $this->db->bind("alamat", $data["alamat"]);
    $this->db->bind("telepon", $data["telepon"]);

    $this->db->execute();
    return $this->db->rowCount();

  }

  public function getDokterById($id)
  {
    $this->db->query("SELECT * FROM ". $this->table . " WHERE ID_Dokter=:id");
    $this->db->bind("id", $id);
    return $this->db->single();
  }

  public function ubahDataDokter($data)
  {
    $query = "UPDATE dokter SET 
              nama_Dokter = :nama_Dokter,
              spesialisasi = :spesialisasi,
              alamat = :alamat,
              telepon = :telepon
            WHERE ID_Dokter = :ID_Dokter;";
    
    $this->db->query($query);
    $this->db->bind("ID_Dokter", $data["ID_Dokter"]);
    $this->db->bind("nama_Dokter", $data["nama_Dokter"]);
    $this->db->bind("spesialisasi", $data["spesialisasi"]);
    $this->db->bind("alamat", $data["alamat"]);
    $this->db->bind("telepon", $data["telepon"]);

    $this->db->execute();
    return $this->db->rowCount();

  }
  
  public function countDokter()
    {
      $this->db->query("SELECT COUNT(*) as total FROM ". $this->table);
      $result = $this->db->single();

      return $result['total'];
    }
  
  public function sortingDataDokter($sort = 'nama_Dokter', $order = 'ASC')
  {
    $this->db->query("SELECT * FROM " . $this->table);
    $result = $this->db->resultSet();

    usort($result, function($a, $b) use ($sort, $order) {
      $valueA = $a[$sort];
      $valueB = $b[$sort];

      if ($order === 'ASC') {
          return $valueA <=> $valueB;
      } else {
          return $valueB <=> $valueA;
      }
  });

  return $result;
  }

  public function searchDokter($keyword)
  {
    $columns = $this->getColumnsDokter();
    $conditions = [];
    foreach ( $columns as $columnInfo)
    {
      $column = $columnInfo['Field'];
      $conditions[] = "LOWER($column) LIKE :keyword";
    }
    $this->db->query("SELECT * FROM dokter WHERE " . implode(" OR ", $conditions));
    $this->db->bind("keyword", "%$keyword%");
    $this->db->execute();
    $Dokter = $this->db->resultSet();
    return array_values(
      array_filter(
        $Dokter,
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

