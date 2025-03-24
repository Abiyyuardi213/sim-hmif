$(document).ready(function () {
    $("#roleTable").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true
    });
});

$(document).ready(function () {
    $('.delete-role-btn').click(function () {
        let roleId = $(this).data('role-id');
        let deleteUrl = "index.php?modul=role&fitur=delete&role_id=" + roleId;
        $('#confirmDeleteBtn').attr('href', deleteUrl);
    });
});