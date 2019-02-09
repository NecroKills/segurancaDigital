<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>z

<script type="text/javascript">
  $(document).ready(function(){
    $('select').material_select();
    $("#limpar").on("click", function(){
        $('#tabela').remove();
        window.location.replace("/");
    });
    $('#table_id').DataTable( {
      "responsive": true, //responsive ativo
      "pageLength": 50,
      "searching": false,
      "lengthChange": false,
      "pagingType": "full_numbers",
      "order":[],
      "columnDefs": [{"orderable": false, "targets": [0,1,2,3,5] }],
      "bInfo" : false,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
      },

    });
  });
</script>

</body>
</html>
