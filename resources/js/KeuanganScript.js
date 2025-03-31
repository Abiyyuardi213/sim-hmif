$(document).ready(function () {
    $("#keuanganTable").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true
    });

    $('.delete-keuangan-btn').click(function () {
        let keuanganId = $(this).data('keuangan-id');
        let deleteUrl = "index.php?modul=keuangan&fitur=hapus&keuangan_id=" + keuanganId; // Bentuk URL hapus
        $('#confirmDeleteBtn').attr('href', deleteUrl);
    });
});