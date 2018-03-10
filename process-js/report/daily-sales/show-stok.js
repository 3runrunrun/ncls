function show_stok(id_distributor, id_produk) {
  // console.log(id_distributor);
  // console.log(id_produk);
  
  var hostname = window.location.origin;
  var path_array = window.location.pathname.split( '/' );
  var def_path = hostname;
  if (hostname.indexOf('localhost') == -1) {
   def_path = hostname + '/' + path_array[1];    
  } else {
   def_path = hostname + '/' + path_array[1] + '/' + path_array[2];
  }
  // console.log(def_path);

  $.ajax({
    url: def_path + '/show-stok',
    type: 'POST',
    dataType: 'json',
    data: {
      id_distributor: id_distributor,
      id_produk: id_produk,
    },
    success: function (data) {
      // console.log(data);
      var stok = $.map(data, function(item, index) {
        return item.stok;
      });

      // console.log(stok);
      $('#stok-sisa').val(stok);
      if ($('#stok-sisa').val() == 0) {
        $('#stok-sisa').addClass('border-danger').removeClass('border-primary');
        $('#stok-alert').text('Anda harus menunggu distributor menambah stok');
      } else {
        $('#stok-sisa').addClass('border-primary').removeClass('border-danger');
        $('#stok-alert').text('');
      }
    }
  })
  .done(function() {
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
}