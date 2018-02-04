$(document).ready(function() {
  $('#show-outlet-by-dist-area').submit(function(event) {
    var distributor = $('#src-distributor').val();
    var id_area = $('#src-id-area').val();
    var hostname = window.location.origin;
    var path_array = window.location.pathname.split( '/' );
    var def_path = hostname + '/' + path_array[1] + '/' + path_array[2];
    
    $.ajax({
      url: def_path + '/show-outlet-by-dist-area',
      type: 'POST',
      dataType: 'json',
      data: {
        distributor: distributor, 
        id_area: id_area,
      },
      success: function(data) {
        // console.log(data);
        var tr = $.map(data, function(index, value) {
          var rows = $.map(index, function(eindex, evalue) {
            if (eindex == null) {
              eindex = '-';
            }
            return '<td>' + eindex + '</td>';
          });
          // console.log(rows);
          var url_edit = def_path +'/master-outlet/' + index.id;
          // console.log(url_edit);

          $.each(rows, function(rindex, rvalue) {
            if (rindex == rows.length-1) {
              var tools = '<td>'+
                '<div class="btn-group-vertical" role="group">' +
                  '<a href="' + url_edit + '" class="btn btn-warning"><i class="fa fa-pencil"></i></a>' +
                  '<button type="button" onclick="delete_outlet(\'' + index.id + '\')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>' +
                '</div>' +
              '</td>';
              rows.push(tools);
            }
          });
          return '<tr>' + rows + '</tr>';
        });
        console.log(tr);
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