/*
$(document).ready(function() {
  
       var t = $('#dataTables').DataTable({
                "ordering": false,
                "language": {
                       "search": "Tìm Kiếm",
                       "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
                       "lengthMenu":  "Hiển Thị _MENU_ mẫu tin",
                       "info":        "",
                       "infoEmpty":  "Hiển thị 0 đến 0 của 0 mẫu tin",
                       "infoFiltered":   "",
                       "paginate": {
                            "first":      "First",
                            "last":       "Last",
                            "next":       "Tiếp Theo",
                            "previous":   "Về Trước"
                        }
                     }  
        }); 
        $('#dataTables1').removeAttr('width').DataTable({

          "ordering": false,
                "language": {
                       "search": "Tìm Kiếm",
                       "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
                       "lengthMenu":  "Hiển Thị _MENU_ mẫu tin",
                       "info":        "",
                       "infoEmpty":  "Hiển thị 0 đến 0 của 0 mẫu tin",
                        "infoFiltered":   "",
                       "paginate": {
                            "first":      "First",
                            "last":       "Last",
                            "next":       "Tiếp Theo",
                            "previous":   "Về Trước"
                        }
                     },
          columnDefs: [
              {"width": "5%", "targets": [4, 5]},
              {"width": "20%", "targets": 0 }
              ],
            initComplete: function () {
                          this.api().columns([0,1,2,3]).every( function () {
                              var column = this;
                              var select = $('<select><option value=""></option></select>')
                                  .appendTo( $(column.header()).empty() )
                                  .on( 'change', function () {
                                      var val = $.fn.dataTable.util.escapeRegex(
                                          $(this).val()
                                      );
               
                                      column
                                          .search( val ? '^'+val+'$' : '', true, false )
                                          .draw();
                                  } );
               
                              column.data().unique().sort().each( function ( d, j ) {
                                  select.append( '<option value="'+d+'">'+d+'</option>' )
                              } );
                          } );
                    }
        });
        $('#dataTables2').DataTable({

          "ordering": false,
                "language": {
                       "search": "Tìm Kiếm",
                       "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
                       "lengthMenu":  "Hiển Thị _MENU_ mẫu tin",
                       "info":        "",
                       "infoEmpty":  "Hiển thị 0 đến 0 của 0 mẫu tin",
                       "infoFiltered":   "",
                       "paginate": {
                            "first":      "First",
                            "last":       "Last",
                            "next":       "Tiếp Theo",
                            "previous":   "Về Trước"
                        }
                     },
            initComplete: function () {
                          this.api().columns([1,2,3,4,5]).every( function () {
                              var column = this;
                              var select = $('<select><option value=""></option></select>')
                                  .appendTo( $(column.header()).empty() )
                                  .on( 'change', function () {
                                      var val = $.fn.dataTable.util.escapeRegex(
                                          $(this).val()
                                      );
               
                                      column
                                          .search( val ? '^'+val+'$' : '', true, false )
                                          .draw();
                                  } );
               
                              column.data().unique().sort().each( function ( d, j ) {
                                  select.append( '<option value="'+d+'">'+d+'</option>' )
                              } );
                          } );
                    }
        });

        $('#dataTables3').DataTable({
            "ordering": false,
                "language": {
                       "search": "Tìm Kiếm",
                       "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
                       "lengthMenu":  "Hiển Thị _MENU_ mẫu tin",
                       "info":        "",
                       "infoEmpty":  "Hiển thị 0 đến 0 của 0 mẫu tin",
                       "infoFiltered":   "",
                       "paginate": {
                            "first":      "First",
                            "last":       "Last",
                            "next":       "Tiếp Theo",
                            "previous":   "Về Trước"
                        }
                     },
            initComplete: function () {
                          this.api().columns([0,1,2,3,4]).every( function () {
                              var column = this;
                              var select = $('<select><option value=""></option></select>')
                                  .appendTo( $(column.header()).empty() )
                                  .on( 'change', function () {
                                      var val = $.fn.dataTable.util.escapeRegex(
                                          $(this).val()
                                      );
               
                                      column
                                          .search( val ? '^'+val+'$' : '', true, false )
                                          .draw();
                                  } );
               
                              column.data().unique().sort().each( function ( d, j ) {
                                  select.append( '<option value="'+d+'">'+d+'</option>' )
                              } );
                          } );
                    }
        }) ;    

});

*/