document.addEventListener('DOMContentLoaded', () => {
    // Check if the URL contains the id_admin parameter
    if (window.location.href.includes('id_admin')) {
        // Get the base URL without any query parameters
        const baseUrl = window.location.href.split('?')[0];
        // Replace the current URL with the base URL
        window.history.replaceState({}, document.title, baseUrl);
    }
});
