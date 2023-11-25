$(function() {

  $('.tampilModalUbah').on('click', function(){

      const id = $(this).data('id');

      $.ajax({
        url: 'http://localhost/functional-programming/fangpro/public/Pasien/getUbahPasien',
        data: {id : id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
          $('#nama').val(data.nama);
          $('#jenis_kelamin').val(data.jenis_kelamin);
          $('#Tanggal_Lahir').val(data.Tanggal_Lahir);
          $('#Alamat').val(data.Alamat);
          $('#Poli').val(data.Poli);
          $('#Status').val(data.Status);
          $('#ID_Pasien').val(data.ID_Pasien);
        }
      });
  })

});