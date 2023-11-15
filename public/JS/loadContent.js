function loadContent(page, url) {
    // Update URL with parameters
    window.history.pushState({ page: page }, null, "?page=" + page);

    $.ajax({
        url: url,
        method: 'GET',
        success: function (data) {
            $('#dynamic-content').html(data);
        },
        error: function () {
            $('#dynamic-content').html('Error loading content.');
        }
    });
}

// Check for parameters on page load and load content accordingly
$(document).ready(function () {
    const params = new URLSearchParams(window.location.search);
    const page = params.get('page');
    if (page) {
        loadContent(page, './' + page + '.php');
    }
});