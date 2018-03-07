function show_distributor_by_area(selector){
  var id = $(selector).val();
  var target_selector = $('#distributor');
  var hostname = window.location.origin;
  var path_array = window.location.pathname.split( '/' );
  var def_path = hostname;
  if (hostname.indexOf('localhost') == -1) {
   def_path = hostname + '/' + path_array[1];    
  } else {
   def_path = hostname + '/' + path_array[1] + '/' + path_array[2];
  }
  console.log(def_path);
  // console.log(def_path + '/show-distributor-by-kind');
  // 
  // console.log(id_area);
  $.ajax({
    url: def_path + '/show-distributor-by-area',
    type: 'POST',
    dataType: 'json',
    data: {id: id},
    success: function (data) {
      var options = $.map(data, function(item, index) {
        return '<option value="' + item.id + '">' + item.alias_distributor + '</option>';
      });
      options.unshift('<option value="" selected disabled>Pilih Distributor</option>');
      $(target_selector).children().remove();
      $(target_selector).append(options);
      $(target_selector).select2();
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

function show_detailer_by_area(selector) {
  var id_area = $(selector).val();
  var target_selector = $('#detailer');
  var hostname = window.location.origin;
  var path_array = window.location.pathname.split( '/' );
  var def_path = hostname;
  if (hostname.indexOf('localhost') == -1) {
   def_path = hostname + '/' + path_array[1];    
  } else {
   def_path = hostname + '/' + path_array[1] + '/' + path_array[2];
  }
  console.log(def_path);

  $.ajax({
    url: def_path + '/show-detailer-by-area',
    type: 'POST',
    dataType: 'json',
    data: {id_area: id_area},
    success: function (data) {
      var options = $.map(data, function(item, index) {
        return '<option value="' + item.id + '">' + item.nama + '</option>';
      });
      options.unshift('<option value="" selected disabled>Pilih Detailer</option>');
      // console.log(options);
      $(target_selector).children().remove();
      $(target_selector).append(options);
      $(target_selector).select2();
    },
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