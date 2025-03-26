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
        let userId = $(this).data('user-id'); // Ambil ID pengguna dari atribut data
        let deleteUrl = "index.php?modul=pengguna&fitur=delete&id_user=" + userId; // Bentuk URL hapus
        $('#confirmDeleteBtn').attr('href', deleteUrl); // Set href tombol hapus di modal
    });
});