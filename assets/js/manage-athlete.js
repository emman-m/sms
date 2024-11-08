$(document).ready(function () {
    const exportingCol = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    const exportingTitle = 'Athletes';
    let table = $("#myTable").DataTable({
        responsive: true,
        layout: {
            topStart: {
                buttons: [
                    {
                        extend: 'csv',
                        title: exportingTitle,
                        exportOptions: {
                            columns: exportingCol
                        },
                        className: 'button button-s button-success',
                    },
                    {
                        extend: 'print',
                        title: '',
                        exportOptions: {
                            columns: exportingCol
                        },
                        className: 'button button-s button-light',
                        customize: function (win) {
                            $(win.document.body).prepend(`<h2>${exportingTitle}</h2>`);

                            $(win.document.body).prepend('<div><img src="../assets/images/header.png" style="width:100%" /></div>');
                        }
                    },
                ]
            },
            topEnd: 'search',
            bottomStart: 'info',
            bottomEnd: {
                paging: {
                    firstLast: false
                }
            },
        },
        pageLength: 5,
        ordering: false,
        columnDefs: [
            {
                target: [3, 4, 5, 6, 9],
                visible: false,
                searchable: false
            }
        ]
    });

    $("#myTable").show();

    table.on('click', '.btn-del', function (e) {
        console.log($(e.target).data('id'));
    });

});