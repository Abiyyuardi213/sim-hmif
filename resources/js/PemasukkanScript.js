$(document).ready(function () {
    $("#pemasukkanTable").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true
    });

    $('.delete-pemasukkan-btn').click(function () {
        let keuanganId = $(this).data('keuangan-id');
        let deleteUrl = "index.php?modul=keuangan&fitur=hapus-pemasukkan&keuangan_id=" + keuanganId; // Bentuk URL hapus
        $('#confirmDeleteBtn').attr('href', deleteUrl);
    });
});