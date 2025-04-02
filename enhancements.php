<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Enhancements</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles/enhancements.css" />
  </head>
  <body>
  <?php
      include 'header.inc';
      ?>
    <main class="container">
      <h1>Enhancements</h1>
      <div class="enhancement">
        <h2>Tooltip Enhancement</h2>
        <p>
          We have added tooltips to provide additional information when users
          hover over certain elements. This enhancement improves the user
          experience by providing helpful hints and explanations without
          cluttering the interface.
        </p>
        <p>
          For example, hover over the word
          <span class="tooltip"
            >tooltip
            <span class="tooltiptext">This is a tooltip example.</span>
          </span>
          to see the tooltip in action.
        </p>
      </div>
      <div class="enhancement">
        <h2>Dark Mode</h2>
        <p>
        We have added a dark mode option to the website, allowing users to switch to a darker color scheme for a more comfortable viewing experience, especially in low-light environments. This enhancement improves usability by reducing eye strain and providing a visually appealing alternative to the default light mode.
        </p>
        <p>
          For example, toggle the button on the top right of the menu to switch between light and dark modes.
        </p>
      </div>
    </main>
  </body>
</html>
