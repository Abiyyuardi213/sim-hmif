$(document).ready(function () {
    $("#anggotaTable").DataTable({
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
    $('.delete-anggota-btn').click(function () {
        let roleId = $(this).data('anggota-id');
        let deleteUrl = "index.php?modul=anggota&fitur=delete&anggota_id=" + anggotaId;
        $('#confirmDeleteBtn').attr('href', deleteUrl);
    });
});