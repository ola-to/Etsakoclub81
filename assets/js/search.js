// assets/js/search.js

function performSearch() {
            const searchInput = document.getElementById('search-input').value;
            window.location.href = `index.php?search=${encodeURIComponent(searchInput)}`;
        }