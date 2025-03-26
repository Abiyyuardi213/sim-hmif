$(document).ready(function () {
    $("#prokerTable").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true
    });

    $('.delete-proker-btn').click(function () {
        let prokerId = $(this).data('proker-id'); // Ambil ID pengguna dari atribut data
        let deleteUrl = "index.php?modul=proker&fitur=delete&proker_id=" + prokerId; // Bentuk URL hapus
        $('#confirmDeleteBtn').attr('href', deleteUrl); // Set href tombol hapus di modal
    });
});