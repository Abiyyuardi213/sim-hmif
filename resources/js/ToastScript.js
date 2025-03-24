$(document).ready(function () {
    let urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('message') || urlParams.has('error')) {
        let toast = $('#toastNotification');
        toast.toast({ autohide: true, delay: 3000 }).toast('show');
    }
});