$(document).ready(function () {
    $('.btn-delete').click(function () {
        let pengumumanId = $(this).data('id'); // Gunakan 'data-id' sesuai HTML
        let deleteUrl = "index.php?modul=pengumuman&fitur=delete&id=" + pengumumanId; // Sesuaikan dengan PHP
        $('#confirmDeleteBtn').attr('href', deleteUrl);
    });
});