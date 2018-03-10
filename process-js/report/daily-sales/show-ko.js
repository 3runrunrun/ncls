function recall_show_ko(id_distributor, id_detailer, id_outlet, id_produk, id_ko) {
  if (id_ko != null) {
    show_ko(id_distributor, id_detailer, id_outlet, id_produk, id_ko);
  }
}

function show_ko(id_distributor, id_detailer, id_outlet, id_produk, id_ko) {
  // console.log(id_distributor);
  // console.log(id_detailer);
  // console.log(id_outlet);
  console.log(id_produk);
  // console.log(id_ko);
  
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
    url: def_path + '/show-ko',
    type: 'POST',
    dataType: 'json',
    data: {
      id_distributor: id_distributor,
      id_detailer: id_detailer,
      id_outlet: id_outlet,
      id_produk: id_produk,
      id_ko: id_ko,
    },
    success: function (data) {
      // console.log(data);
      var diskon_on = 0;
      var diskon_off = 0;
      var tr = $.map(data, function(item, index) {
        var td = $.map(item, function(k, v) {
          return '<td>' + k + '</td>';
        });
        return '<tr>' + td + '</tr>';
      });
      // console.log(tr);

      $.each(data, function(index, val) {
         diskon_on = val.on_total;
         diskon_off = val.off_total;
      });
      // console.log(diskon_on);
      // console.log(diskon_off);
      
      $('#info-faktur').children().remove();
      $('#info-faktur').append(tr);
      $('.diskon-on').val(diskon_on);
      $('.diskon-off').val(diskon_off);
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