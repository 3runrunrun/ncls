$(document).ready(function() {
  $('#show-customer-non-by-area').submit(function(event) {
    var id_area = $('#src-id-area').val();
    var hostname = window.location.origin;
    var path_array = window.location.pathname.split( '/' );
    var def_path = hostname;
    if (~hostname.indexOf('localhost')) {
     def_path = hostname + '/' + path_array[1];    
     console.log(def_path);
    } else {
     def_path = hostname + '/' + path_array[1] + '/' + path_array[2];
     console.log(def_path);
    }
    
    $.ajax({
      url: def_path + '/show-customer-non-by-area',
      type: 'POST',
      dataType: 'json',
      data: {
        id_area: id_area,
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
          // console.log(rows);
          var url_edit = def_path +'/master-customer-non/' + index.id;
          // console.log(url_edit);
          
          $.each(rows, function(rindex, rvalue) {
            if (rindex == rows.length-1) {
              var tools = '<td>'+
                '<div class="btn-group" role="group">' +
                  '<a href="' + url_edit + '" class="btn btn-warning"><i class="fa fa-pencil"></i></a>' +
                  '<button type="button" onclick="delete_customer_non(\'' + index.id + '\')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>' +
                '</div>' +
              '</td>';
              rows.push(tools);
            }
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