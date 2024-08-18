// assets/js/popup.js

// JavaScript function to open the popup
        function openPopup() {
            var popup = document.getElementById("menuPopup");
            popup.style.display = "block";
            document.body.style.overflow = "hidden"; // Disable scrolling on the body
        }

        // JavaScript function to close the popup
        function closePopup() {
            var popup = document.getElementById("menuPopup");
            popup.style.display = "none";
            document.body.style.overflow = "auto"; // Enable scrolling on the body
        }