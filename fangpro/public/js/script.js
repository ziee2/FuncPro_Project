$(function() {

  $('.tampilModalUbah').on('click', function(){

      const id = $(this).data('id');

      $.ajax({
        url: 'http://localhost/FuncPro_Project/fangpro/public/Pasien/getUbahPasien',
        data: {id : id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
          $('#ID_Pasien').val(data.ID_Pasien);
          $('#nama').val(data.nama);
          $('#jenis_kelamin').val(data.jenis_kelamin);
          $('#Tanggal_Lahir').val(data.Tanggal_Lahir);
          $('#Alamat').val(data.Alamat);
          $('#Poli').val(data.Poli);
          $('#Status').val(data.Status);
        }
      });
  })
  
  $('.tampilModalUbahDokter').on('click', function(){

    const id = $(this).data('id');

    $.ajax({
      url: 'http://localhost/FuncPro_Project/fangpro/public/Dokter/getUbahDokter',
      data: {id : id},
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $('#ID_Dokter').val(data.ID_Dokter);
        $('#nama_Dokter').val(data.nama_Dokter);
        $('#spesialisasi').val(data.spesialisasi);
        $('#alamat').val(data.alamat);
        $('#telepon').val(data.telepon);
      }
    });
  })

  $('.tampilModalUbahApoteker').on('click', function(){

    const id = $(this).data('id');

    $.ajax({
      url: 'http://localhost/FuncPro_Project/fangpro/public/Apoteker/getUbahApoteker',
      data: {id : id},
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $('#ID_Apoteker').val(data.ID_Apoteker);
        $('#nama_Apoteker').val(data.nama_Apoteker);
        $('#alamat').val(data.alamat);
        $('#telepon').val(data.telepon);
      }
    });
  })
});