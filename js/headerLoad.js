fetch('header.html')
    .then(response => {
        return response.text();
    })
    .then(data => {
        // Inject the content into the header placeholder div
        document.getElementById('header-placeholder').innerHTML = data;
    })
    .catch(error => {
        console.error('Error:', error);
    });