// Handle search functionality
function handleSearch(event) {
    event.preventDefault(); // Prevent form submission
    const searchInput = document.getElementById('searchInput').value.toLowerCase();

    // Define keywords for different categories
    const categories = {
        sports: 'sports-B.html',
        entertainment: 'entertainment-C.html',
        health: 'health-D.html',
        tech: 'tech-E.html',
        world: 'world.html',
    };

    // Check if the search input matches any category
    for (const category in categories) {
        if (searchInput.includes(category)) {
            // Redirect to the corresponding category page
            window.location.href = categories[category];
            return; // Exit the function after redirection
        }
    }

    // If no category matches, you could handle it differently
    alert('No results found for your search. Please try again.');
    return false; // Prevent form submission
}
