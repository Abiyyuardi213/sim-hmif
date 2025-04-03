$(document).ready(function () {
    $("#userTable").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true
    });

    $('.delete-user-btn').click(function () {
        let userId = $(this).data('user-id');
        let deleteUrl = "index.php?modul=pengguna&fitur=delete&id_user=" + userId;
        $('#confirmDeleteBtn').attr('href', deleteUrl);
    });
});