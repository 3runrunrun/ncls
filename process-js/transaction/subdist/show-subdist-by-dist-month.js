$(document).ready(function(){
  $('#filter-by-dist-month').submit(function(event) {
    var hostname = window.location.origin;
    var path_array = window.location.pathname.split( '/' );
    var def_path = hostname + '/' + path_array[1] + '/' + path_array[2];
    // console.log(hostname + '/' + path_array[1] + '/' + path_array[2]);

    var id_distributor = path_array[path_array.length - 1];
    var bulan = $('#bulan').val();
    
    $.ajax({
      url: def_path + '/show-subdist-by-dist-month',
      type: 'POST',
      dataType: 'json',
      data: {
        id: id_distributor,
        month: bulan,
      },
      success: function(data) {
        console.log(data);
        var tr = $.map(data, function(index, value) {
          var rows = $.map(index, function(eindex, evalue) {
            if (eindex == null) {
              eindex = '-';
            }
            return '<td>' + eindex + '</td>';
          });

          console.log(rows);
          return '<tr>' + rows + '</tr>';
        });

        $('tbody').children().remove();
        $.each(tr, function(index, val) {
           $('tbody').append('<tr>' + val + '</tr>');
        });
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
    
    event.preventDefault();
  });
});

