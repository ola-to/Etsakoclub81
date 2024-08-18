function editField(field) {
    var span = document.querySelector('[data-field="' + field + '"]');
    if (!span) return;

    // Hide the specific edit button
    var editButton = span.parentNode.querySelector('.edit-link');
    editButton.style.display = 'none';

    var currentValue = span.innerText;
    span.style.display = 'none'; // Hide the current span

    var container = document.createElement('div');
    container.className = 'edit-form'; // Add this div to wrap input and button

    var input = document.createElement('input');
    input.type = 'text';
    input.value = currentValue;
    input.className = 'edit-input';
    input.setAttribute('data-field', field);

    var saveButton = document.createElement('button');
    saveButton.innerText = 'Save';
    saveButton.className = 'save-button';
    saveButton.onclick = function() {
        saveField(field, input.value);
    };

    container.appendChild(input);
    container.appendChild(saveButton);

    // Insert the container after the hidden span
    span.parentNode.insertBefore(container, span.nextSibling);
}