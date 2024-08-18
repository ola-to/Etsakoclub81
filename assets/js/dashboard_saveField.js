function saveField(field, newValue) {
    var span = document.querySelector('[data-field="' + field + '"]');
    if (!span) return;

    // Update the span with the new value
    span.innerText = newValue;
    span.style.display = 'inline'; // Show the span again

    // Remove the input and save button
    var input = span.parentNode.querySelector('.edit-input');
    var saveButton = span.parentNode.querySelector('.save-button');
    
    if (input) {
        input.remove(); // Remove the input field
    }
    if (saveButton) {
        saveButton.remove(); // Remove the save button
    }

    // Show the specific edit button again
    var editButton = span.parentNode.querySelector('.edit-link');
    if (editButton) {
        editButton.style.display = 'inline'; // Make the "Edit" button visible again
    }
}
