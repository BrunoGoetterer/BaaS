document.getElementById('profileForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    var form = this;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', form.action, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            // Reload the page after the form submission is successful
            location.reload();
        } else {
            // Handle error
            console.error('Form submission failed:', xhr.status, xhr.statusText);
        }
    };

    xhr.send(new URLSearchParams(new FormData(form)).toString());
});
