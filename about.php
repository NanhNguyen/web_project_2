<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Job Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles/about.css" />
  </head>
  <body>
    <?php
      include 'header.inc';
    ?>
    <main class="container">
      <h1 class="about-heading">About Us</h1>
      <dl>
        <dt>Group Name: Group 21</dt>
        <dd>- Innovators: Nguyễn Nam Anh</dd>
        <dt>Group ID</dt>
        <dd>- Group 21</dd>
        <dt>Tutor's Name</dt>
        <dd>- Vũ Ngọc Bình</dd>
        <dt>Members Contribution</dt>
        <dd>
          <strong>Nguyễn Nam Anh:</strong> Project Manager, Frontend Developer
        </dd>
        <dd><strong>Đỗ Minh Thành:</strong> Designer</dd>
        <dd><strong>Đỗ Thành Vinh:</strong> Tester</dd>
      </dl>
      <figure>
        <img src="images/group.jpg" alt="Group photo of Innovators" />
        <figcaption>Our group photo</figcaption>
      </figure>
      <h2>Our Timetable</h2>
      <table>
        <thead>
          <tr>
            <th>Day</th>
            <th>Time</th>
            <th>Activity</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Monday</td>
            <td>9:00 AM - 11:00 AM</td>
            <td>Project Meeting</td>
          </tr>
          <tr>
            <td>Thursday</td>
            <td>8:00 AM - 12:00 PM</td>
            <td>Development Session</td>
          </tr>
          <tr>
            <td>Friday</td>
            <td>10:00 AM - 12:00 PM</td>
            <td>Code Review</td>
          </tr>
        </tbody>
      </table>
      <p>
        <form action="contact.html" method="get">
            <input type="hidden" name="job-ref" value="CS789" />
            <button type="submit">Email Us</button> <!-- Fixed button type -->
        </form>
      </p>
      <div class="extra-info">
        <h2>Group Profile</h2>
        <h3>Programming Skills</h3>
        <ul>
          <li>HTML, CSS, JavaScript</li>
          <li>Python, Java, C++</li>
          <li>SQL, NoSQL Databases</li>
        </ul>
        <h3>Working Experiences</h3>
        <ul>
          <li>Nam Anh: 5 years in Frontend Development</li>
          <li>Minh Thành: 5 years in UI/UX Design</li>
          <li>Thành Vinh: 4 years in Testing and Debugging</li>
        </ul>
      </div>
    </main>
  </body>
</html>