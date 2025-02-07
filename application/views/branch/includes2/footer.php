
<div class="footer dark:bg-[#182237] mt-4 border-t border-b-color dark:border-[#ffffff1a]">
    <div class="p-[0.9375rem]">
        <p class="text-center text-[#918f8f] dark:text-[#ffffffb3] text-[0.775rem] leading-[1.8]">
            Copyright © Developed by 
            <a href="https://namami.co.in/" target="_blank" class="text-primary">Namami Software</a> 2025
        </p>
        <!-- Translator Section -->
       
    </div>

</div>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,hi,es,fr,de',
            layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
        }, 'google_translate_element');
    }

    // Function to hide the iframe by setting visibility to hidden
    function hideGoogleTranslateIframe() {
        // Select the parent element with class "skiptranslate"
        const skipTranslateElement = document.querySelector('.skiptranslate iframe');
        if (skipTranslateElement) {
            skipTranslateElement.style.visibility = 'hidden'; // Hide the iframe
        }
        const poweredByGoogle = document.querySelector('.VIpgJd-ZVi9od-l4eHX-hSRGPd');
        if (poweredByGoogle) {
            poweredByGoogle.style.display = 'none'; // Hide the branding link
        }
    }

    // Periodically check for the iframe and hide it
    setInterval(hideGoogleTranslateIframe, 500);
    function customizeGoogleTranslateWidget() {
        // Select the div containing the Google Translate widget
        const googleTranslateDiv = document.querySelector('.skiptranslate.goog-te-gadget');
        
        // Check if the div exists and ensure we only run this once
        if (googleTranslateDiv && !googleTranslateDiv.classList.contains('customized')) {
            // Add the 'customized' class to ensure the changes only happen once
            googleTranslateDiv.classList.add('customized');

            // Remove any existing text (like "Powered by Google")
            googleTranslateDiv.childNodes.forEach((node) => {
                if (node.nodeType === Node.TEXT_NODE && node.nodeValue.trim().length > 0) {
                    node.nodeValue = ''; // Clear the text node
                }
            });

            // Prepend "Select Language: " before the dropdown
            const selectLanguageText = document.createElement('span');
            selectLanguageText.textContent = 'Select Language: ';
            selectLanguageText.style.marginRight = '8px'; // Add some spacing for better appearance
            googleTranslateDiv.insertBefore(selectLanguageText, googleTranslateDiv.firstChild);
        }
    }

    // Call the function to customize the widget once the page loads
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(customizeGoogleTranslateWidget, 1000); // Wait for the widget to fully load
    });

</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

