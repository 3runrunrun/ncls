function show_distributor_by_area(selector) {
  var hostname = window.location.origin;
  var path_array = window.location.pathname.split( '/' );
  var def_path = hostname + '/' + path_array[1] + '/' + path_array[2];
  // console.log(hostname + '/' + path_array[1] + '/' + path_array[2]);

  var id_area = $(selector).val();

  $.ajax({
    url: def_path + '/show-distributor-by-area',
    type: 'POST',
    dataType: 'json',
    data: {id: id_area},
    success: function (data) {
      var option = $.map(data, function(item, index) {
        return '<option value="' + item['id'] + '">(' + item['alias_area'] + ') ' + item['nama'] + '</option>'
      });
      console.log(option);
      // $('#area').children().remove();
      // $('#area').append(option);
      // $('#area > option').attr({
      //   selected: true,
      // });;
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