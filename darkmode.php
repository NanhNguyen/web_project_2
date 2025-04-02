<?php
// dark-mode.php
?>
<style>
    /* Default dark mode styles for the body */
    body.dark-mode {
        background-color: #121212 !important;
        color: #ffffff !important;
    }

    /* Links in dark mode */
    .dark-mode a {
        color: #bb86fc !important;
    }

    /* Dark mode toggle button */
    .dark-mode-toggle {
        position: fixed;
        top: 10px;
        right: 10px;
        padding: 8px 12px;
        background: #333;
        color: #ffffff;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    /* Header styles in dark mode */
    .dark-mode header {
        background-color: #1e1e1e !important;
        color: #ffffff !important;
    }

    /* Navigation links in the header */
    .dark-mode header nav a {
        color: #ffffff !important;
    }

    /* Container and main sections */
    .dark-mode .container, .dark-mode main {
        background-color: #121212 !important;
        color: #ffffff !important;
    }

    /* Headings in dark mode */
    .dark-mode h1, .dark-mode h2, .dark-mode h3, .dark-mode h4 {
        color: #ffffff !important;
    }

    /* About page specific styles */
    .dark-mode .about-heading {
        background-color: #121212 !important;
        color: #ffffff !important;
    }

    .dark-mode dl, .dark-mode dt, .dark-mode dd {
        background-color: #121212 !important;
        color: #ffffff !important;
    }

    .dark-mode figure, .dark-mode figcaption {
        background-color: #121212 !important;
        color: #ffffff !important;
        border: none !important;
    }

    .dark-mode table, .dark-mode th, .dark-mode td {
        background-color: #1e1e1e !important;
        color: #ffffff !important;
        border: none !important;
    }

    .dark-mode .extra-info {
        background-color: #121212 !important;
        color: #ffffff !important;
    }

    /* Hero section in dark mode (index.php) */
    .dark-mode .hero-content {
        background-color: #121212 !important;
        color: #ffffff !important;
    }

    .dark-mode .hero-text {
        color: #ffffff !important;
    }

    .dark-mode .hero-image {
        background-color: #121212 !important;
    }

    /* Buttons in dark mode (index.php) */
    .dark-mode .button1 {
        background-color: #333 !important;
        color: #ffffff !important;
        border: none !important;
    }

    /* Features section in dark mode (index.php) */
    .dark-mode .features {
        background-color: #121212 !important;
        color: #ffffff !important;
    }

    .dark-mode .feature-box {
        background-color: #1e1e1e !important;
        color: #ffffff !important;
        border: none !important;
    }

    /* Form elements in dark mode (apply.php) */
    .dark-mode form, .dark-mode label {
        background-color: #1e1e1e !important;
        color: #ffffff !important;
        border: none !important; /* No border for form and label */
    }

    /* Input areas with white borders in dark mode */
    .dark-mode input, .dark-mode select, .dark-mode textarea {
        background-color: #1e1e1e !important;
        color: #ffffff !important;
        border: 1px solid #ffffff !important; /* White border for input areas */
    }

    /* Fieldset and legend in dark mode */
    .dark-mode fieldset, .dark-mode legend {
        background-color: #1e1e1e !important;
        color: #ffffff !important;
        border: none !important; /* No border for fieldset */
    }

    /* Buttons in dark mode */
    .dark-mode button, .dark-mode input[type="submit"] {
        background-color: #333 !important;
        color: #ffffff !important;
        border: none !important; /* No border for buttons */
    }

    /* Tooltip in dark mode (apply.php, enhancements.php) */
    .dark-mode .tooltiptext {
        background-color: #333 !important;
        color: #ffffff !important;
        border: none !important;
    }

    /* Job boxes in dark mode (jobs.php) */
    .dark-mode .job-box {
        background-color: #1e1e1e !important;
        color: #ffffff !important;
        border: none !important;
    }

    /* Aside sections in dark mode (jobs.php) */
    .dark-mode aside {
        background-color: #1e1e1e !important;
        color: #ffffff !important;
        border: none !important;
    }

    /* Lists in dark mode (jobs.php, about.php) */
    .dark-mode ul, .dark-mode ol, .dark-mode li {
        color: #ffffff !important;
    }

    /* Contact section in dark mode (contact.php) */
    .dark-mode .contact-section {
        background-color: #121212 !important;
        color: #ffffff !important;
    }

    /* Enhancement section in dark mode (enhancements.php) */
    .dark-mode .enhancement {
        background-color: #1e1e1e !important;
        color: #ffffff !important;
        border: none !important;
    }

    /* Footer in dark mode (jobs.php) */
    .dark-mode footer {
        background-color: #1e1e1e !important;
        color: #ffffff !important;
        border: none !important;
    }
</style>

<button class="dark-mode-toggle" onclick="toggleDarkMode()">🌙</button>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (localStorage.getItem("dark-mode") === "enabled") {
            document.body.classList.add("dark-mode");
        }
    });

    function toggleDarkMode() {
        document.body.classList.toggle("dark-mode");
        if (document.body.classList.contains("dark-mode")) {
            localStorage.setItem("dark-mode", "enabled");
        } else {
            localStorage.setItem("dark-mode", "disabled");
        }
    }
</script>