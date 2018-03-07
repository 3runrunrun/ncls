function show_area_by_outlet(selector) {
  var hostname = window.location.origin;
  var path_array = window.location.pathname.split( '/' );
  var def_path = hostname;
  if (hostname.indexOf('localhost') == -1) {
   def_path = hostname + '/' + path_array[1];    
   console.log(def_path);
  } else {
   def_path = hostname + '/' + path_array[1] + '/' + path_array[2];
   console.log(def_path);
  }

  var id_outlet = $(selector).val();

  $.ajax({
    url: def_path + '/show-area-by-outlet',
    type: 'POST',
    dataType: 'json',
    data: {id: id_outlet},
    success: function (data) {
      var option = $.map(data, function(item, index) {
        return '<option value="' + item['id_area'] + '">(' + item['alias_area'] + ') ' + item['area'] + '</option>'
      });
      console.log(option);
      $('#area').children().remove();
      $('#area').append(option);
      $('#area > option').attr({
        selected: true,
      });;
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