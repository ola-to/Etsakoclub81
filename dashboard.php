<?php include 'includes/dashboard_logic.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <title>Business Details - <?php echo htmlspecialchars($business['business_type']); ?></title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="subheader"></div>
    <div class="content-wrapper">
        <div class="sidebar">
            <h3><?php echo htmlspecialchars($business['business_type']); ?></h3>
            <p><strong class="highlight">Location:</strong><br><?php echo htmlspecialchars($business['physical_address']); ?></p>
            <h3>Main Menu</h3>
            <div class="main-menu">
                <ul>
                    <li><a href="https://directory.etsakoclub81.org"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="https://directory.etsakoclub81.org/dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    
                </ul>
            </div>
        </div>
        <div class="content">
        <?php
        $image_src = isset($business['image_path']) ? $business['image_path'] : 'https://via.placeholder.com/200x150.png?text=Business+Image';
        $image_src .= '?' . time(); // To bypass caching
        ?>
            <img src="<?php echo $image_src; ?>" alt="Business Image" id="business-image" style="max-width: 100px; max-height: 150px; border: 1px solid lightgrey;">
            <h2><?php echo htmlspecialchars($business['business_type']); ?></h2>
            <p><strong>Location:</strong> <?php echo htmlspecialchars($business['physical_address']); ?></p>
        
            <button class="dropdown-btn" onclick="toggleDropdown()">Menu</button>
            <div class="dropdown">
                <ul>
                    <li><a href="https://directory.etsakoclub81.org"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="https://directory.etsakoclub81.org/dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    <hr>
                </ul>
            </div>
            <?php if ($business): ?>
            
            <div class="profile-box">
                <p>Core Profile Completeness</p>
                <p>Now you're cookin'. You're nearly there!</p>
                <div class="progress-bar">
                    <span class="progress-bar-fill"></span>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <img src="<?php echo $image_src; ?>" alt="Business Image" id="business-image" style="max-width: 200px; max-height: 150px; border: 2px solid lightgrey;">
                    <br>
                    <button onclick="document.getElementById('image-upload').click()">Change</button>
                    <input type="file" id="image-upload" style="display: none;" onchange="uploadImage()">
                    <div class="progress-bar" id="image-upload-progress" style="display: none;">
                        <span class="progress-bar-fill" style="width: 0;"></span>
                    </div>
                </div>
                <div class="column">
                    <h2><?php echo htmlspecialchars($business['first_name']); ?></h2>
                    <p>
                        <strong class="highlight">Contact Person:</strong><span class="edit-link" onclick="editField('contact_person')">edit</span><br>
                        <span data-field="contact_person"><?php echo htmlspecialchars($business['contact_person']); ?></span>
                    </p>
                    <p>
                        <strong class="highlight">Location:</strong><span class="edit-link" onclick="editField('physical_address')">edit</span><br>
                        <span data-field="physical_address"><?php echo htmlspecialchars($business['physical_address']); ?></span>
                    </p>
                    
                    <div id="phone-details">
                        <p>
                            <strong class="highlight">Phone:</strong><br>
                            <span data-field="business_phone_no"><?php echo htmlspecialchars($business['business_phone_no']); ?></span>
                            <span class="edit-link" onclick="editField('business_phone_no')">edit</span>
                        </p>
                    </div>
                    <div id="updated-phone-numbers"></div>
                    <br>
                    <div class="divider"></div>
                    <div>
                        <p>
                            <strong class="highlight">About:</strong><span class="edit-link" onclick="editField('about')">edit</span><br>
                            <span data-field="about"><?php echo htmlspecialchars($business['about'] ?? 'Customer use this information to learn what makes your company great.'); ?></span>
                        </p>
                        <p>
                            <strong class="highlight">Membership No:</strong><span class="edit-link" onclick="editField('membership_no')">edit</span><br>
                            <span data-field="membership_no"><?php echo htmlspecialchars($business['membership_no'] ?? 'Not available'); ?></span>
                        </p>
                        <p>
                            <strong class="highlight">Products & Services:</strong><span class="edit-link" onclick="editField('products_services')">edit</span><br>
                            <span data-field="products_services"><?php echo htmlspecialchars($business['products_services'] ?? 'Not specified'); ?></span>
                        </p>
                        <p>
                            <strong class="highlight">Additional Info:</strong><span class="edit-link" onclick="editField('additional_info')">edit</span><br>
                            <span data-field="additional_info"><?php echo htmlspecialchars($business['additional_info'] ?? 'No additional information available'); ?></span>
                        </p>
                        <p>
                            <strong class="highlight">Facebook URL:</strong><span class="edit-link" onclick="editField('facebook_url')">edit</span><br>
                            <span data-field="facebook_url"><?php echo htmlspecialchars($business['facebook_url'] ?? 'No URL provided'); ?></span>
                        </p>
                        <p>
                            <strong class="highlight">Twitter URL:</strong><span class="edit-link" onclick="editField('twitter_url')">edit</span><br>
                            <span data-field="twitter_url"><?php echo htmlspecialchars($business['twitter_url'] ?? 'No URL provided'); ?></span>
                        </p>
                        <p>
                            <strong class="highlight">LinkedIn URL:</strong><span class="edit-link" onclick="editField('linkedin_url')">edit</span><br>
                            <span data-field="linkedin_url"><?php echo htmlspecialchars($business['linkedin_url'] ?? 'No URL provided'); ?></span>
                        </p>
                        <p>
                            <strong class="highlight">Instagram URL:</strong><span class="edit-link" onclick="editField('instagram_url')">edit</span><br>
                            <span data-field="instagram_url"><?php echo htmlspecialchars($business['instagram_url'] ?? 'No URL provided'); ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <p>No business details found for the specified type.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
    calculateProgress();
});
function calculateProgress() {
    const totalFields = 10; // Update this to reflect the number of fields being tracked
    let filledFields = 0;

    const fields = ['business_type', 'physical_address', 'contact_person', 'business_phone_no', 'about', 'membership_no', 'products_services', 'additional_info', 'facebook_url', 'twitter_url', 'linkedin_url', 'instagram_url'];

    fields.forEach(field => {
        const span = document.querySelector(`[data-field="${field}"]`);
        if (span && span.innerText.trim() !== '' && span.innerText.trim() !== 'No URL provided' && span.innerText.trim() !== 'Not available' && span.innerText.trim() !== 'Not specified') {
            filledFields++;
        }
    });

    const progressPercentage = Math.round((filledFields / totalFields) * 100);
    updateProgressBar(progressPercentage);

    // Update message based on the progress
    const profileBoxMessage = document.querySelector('.profile-box p:nth-of-type(2)');
    if (progressPercentage === 100) {
        profileBoxMessage.innerText = "Nicely done. Your core profile is complete, but look below for more sections to fill out.";
    } else {
        profileBoxMessage.innerText = "Now you're cookin'. You're nearly there!";
    }
}

function updateProgressBar(percentage) {
    const progressBarFill = document.querySelector('.progress-bar-fill');
    progressBarFill.style.width = `${percentage}%`;
    progressBarFill.innerText = `${percentage}%`; // Display the percentage inside the bar

    if (percentage === 100) {
        progressBarFill.style.backgroundColor = 'green'; // Optional: change color when fully completed
    }
}

function saveField(field, newValue) {
    // Your existing saveField function...
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

    // After saving, recalculate the progress
    calculateProgress();
}

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

function uploadImage() {
    // Your existing uploadImage function...
    var fileInput = document.getElementById('image-upload');
            var file = fileInput.files[0];
            if (!file) return;

            var formData = new FormData();
            formData.append('image', file);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'upload_image.php', true);
            xhr.upload.onprogress = function(event) {
                var progress = Math.round((event.loaded / event.total) * 100);
                var progressBar = document.getElementById('image-upload-progress');
                progressBar.style.display = 'block';
                progressBar.querySelector('.progress-bar-fill').style.width = progress + '%';
            };
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    if (xhr.responseText.includes('success')) {
                        var img = document.getElementById('business-image');
                        img.src = URL.createObjectURL(file);
                        var progressBar = document.getElementById('image-upload-progress');
                        progressBar.style.display = 'none';
                        img.src = 'path_to_uploaded_image.jpg?' + new Date().getTime();
                    } else {
                        alert('Failed to upload the image. Please try again.');
                    }
                }
            };
            xhr.send(formData);

    // Call calculateProgress if image upload affects progress
    calculateProgress();
}

        window.editField = editField;
    </script>
    <script src="assets/js/search.js"></script>
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/toggledropdown_dashboard.js"></script>
</body>
</html>