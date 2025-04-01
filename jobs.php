<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Job Portal</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles/jobs.css" />
  </head>
  <body>
    <?php include 'header.inc'; ?>
    <main class="container">
      <div class="job-list">
        <?php
          include 'settings.php';
          $sql = "SELECT * FROM jobs";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo '<section class="job-box">';
                  echo '<h2>' . htmlspecialchars($row["position_title"]) . '</h2>';
                  echo '<p><strong>Reference Number:</strong> ' . $row["reference_number"] . '</p>';
                  echo '<p><strong>Position Title:</strong> ' . $row["position_title"] . '</p>';
                  echo '<p><strong>Brief Description:</strong> ' . htmlspecialchars($row["brief_description"]) . '</p>';
                  echo '<p><strong>Salary Range:</strong> $' . number_format($row["salary_min"]) . ' - $' . number_format($row["salary_max"]) . '</p>';
                  echo '<p><strong>Reports To:</strong> ' . htmlspecialchars($row["reports_to"]) . '</p>';
                  echo '<h3>Key Responsibilities</h3>';
                  echo '<ul>';
                  foreach (explode("\n", $row["responsibilities"]) as $item) {
                      echo '<li>' . htmlspecialchars(trim($item)) . '</li>';
                  }
                  echo '</ul>';
                  echo '<h3>Required Qualifications</h3>';
                  echo '<h4>Essential</h4>';
                  echo '<ul>';
                  foreach (explode("\n", $row["essential_qualifications"]) as $item) {
                      echo '<li>' . htmlspecialchars(trim($item)) . '</li>';
                  }
                  echo '</ul>';
                  echo '<h4>Preferable</h4>';
                  echo '<ul>';
                  foreach (explode("\n", $row["preferable_qualifications"]) as $item) {
                      echo '<li>' . htmlspecialchars(trim($item)) . '</li>';
                  }
                  echo '</ul>';
                  echo '<form action="apply.php" method="get">';
                  echo '<input type="hidden" name="job-ref" value="' . $row["reference_number"] . '" />';
                  echo '<button type="submit">Apply</button>';
                  echo '</form>';
                  echo '</section>';
              }
          } else {
              echo "<p>No jobs found.</p>";
          }
        ?>
      </div>
      <aside>
        <h2>Job Application Tips</h2>
        <p>Here are some tips to help you with your job application:</p>
        <ol>
          <li>Read the job description carefully.</li>
          <li>Tailor your resume to match the job requirements.</li>
          <li>Write a compelling cover letter.</li>
          <li>Prepare for the interview by researching the company.</li>
          <li>Follow up after the interview.</li>
        </ol>
      </aside>
      <aside>
        <h3>About Our Company</h3>
        <p>
          We are a leading tech company dedicated to innovation and excellence.
          Our team is composed of talented professionals who are passionate
          about technology and committed to delivering high-quality solutions.
        </p>
      </aside>
    </main>
    <footer>
      <p>&copy; 2023 Job Portal. All rights reserved.</p>
    </footer>
  </body>
</html>
