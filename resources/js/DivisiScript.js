$(document).ready(function () {
    $("#divisiTable").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true
    });

    $('.delete-divisi-btn').click(function () {
        let divisiId = $(this).data('divisi-id'); // Ambil ID pengguna dari atribut data
        let deleteUrl = "index.php?modul=divisi&fitur=delete&divisi_id=" + divisiId; // Bentuk URL hapus
        $('#confirmDeleteBtn').attr('href', deleteUrl); // Set href tombol hapus di modal
    });
});