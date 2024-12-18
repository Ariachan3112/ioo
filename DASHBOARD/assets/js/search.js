let debounceTimeout;
document.getElementById('search').addEventListener('input', function () {
    clearTimeout(debounceTimeout);  // Clear the previous timeout
    let search = this.value;
    debounceTimeout = setTimeout(function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'search_students.php?search=' + search, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('studentTable').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }, 100);  // Wait 500ms after the user stops typing
});
