function logOut() {
    var r = confirm("Do you really want to log out?");
    if (r) {
        window.location.href = 'logOut.php';
    }
}