$(document).ready(function() {
  $('#show-outlet-by-dist-area').submit(function(event) {
    var distributor = $('#src-distributor').val();
    var id_area = $('#src-id-area').val();
    // console.log(distributor);
    
    $.ajax({
      url: './show-outlet-by-dist-area',
      type: 'POST',
      dataType: 'json',
      data: {
        distributor: distributor, 
        id_area: id_area,
      },
      success: function(data) {
        // console.log(data);
        var tr = $.map(data, function(index, value) {
          var table_data;
          var cols;
          // console.log(index);
          rows = $.each(index, function(index, val) {
            cols = '<td>' + val + '</td>';
            return cols;
          });
          console.log(rows);

          // return '<td>' + table_data + '</td>';
        });
        // console.log(tr);

        // $('tbody').children().remove();
        // $.each(tr, function(index, val) {
        //    $('tbody').append('<tr>' + val + '</tr>');
        // });
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