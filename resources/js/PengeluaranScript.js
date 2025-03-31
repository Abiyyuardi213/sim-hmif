$(document).ready(function () {
    $("#pengeluaranTable").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true
    });

    $('.delete-pengeluaran-btn').click(function () {
        let keuanganId = $(this).data('keuangan-id');
        let deleteUrl = "index.php?modul=keuangan&fitur=hapus-pengeluaran&keuangan_id=" + keuanganId; // Bentuk URL hapus
        $('#confirmDeleteBtn').attr('href', deleteUrl);
    });
});