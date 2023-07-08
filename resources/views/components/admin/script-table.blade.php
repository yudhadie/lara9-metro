<script>
    "use strict";
    var KTDatatablesBasicBasic = function() {

    var initTable1 = function() {
        var table = $('#datatable');
        table.DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            {{$slot}}
            dom:
                "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +
                "<'table-responsive'tr>" +
                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">",
        });

    };

    return {
        //main function to initiate the module
        init: function() {
            initTable1();
        }
    };
    }();

    jQuery(document).ready(function() {
    KTDatatablesBasicBasic.init();
    });
</script>
