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
  <?php
      include 'header.inc';
      ?>
    <main class="container">
      <div class="job-list">
        <section class="job-box">
          <h2>Software Engineer</h2>
          <p><strong>Reference Number:</strong> SE123</p>
          <p><strong>Position Title:</strong> Software Engineer</p>
          <p>
            <strong>Brief Description:</strong> We are looking for a skilled
            Software Engineer to join our dynamic team. The ideal candidate will
            have experience in developing scalable software solutions and a
            passion for technology.
          </p>
          <p><strong>Salary Range:</strong> $80,000 - $120,000</p>
          <p><strong>Reports To:</strong> Lead Software Engineer</p>
          <h3>Key Responsibilities</h3>
          <ul>
            <li>Develop and maintain software applications</li>
            <li>Collaborate with cross-functional teams</li>
            <li>Write clean, scalable code</li>
            <li>Participate in code reviews</li>
            <li>Troubleshoot and debug applications</li>
          </ul>
          <h3>Required Qualifications</h3>
          <h4>Essential</h4>
          <ul>
            <li>Bachelor's degree in Computer Science or related field</li>
            <li>3+ years of experience in software development</li>
            <li>Proficiency in Java, Python, or C++</li>
            <li>Strong problem-solving skills</li>
          </ul>
          <h4>Preferable</h4>
          <ul>
            <li>Experience with cloud technologies</li>
            <li>Knowledge of Agile methodologies</li>
            <li>Excellent communication skills</li>
          </ul>
          <form action="apply.php" method="get">
            <input type="hidden" name="job-ref" value="SE123" />
            <button type="submit">Apply</button>
          </form>
        </section>
        <section class="job-box">
          <h2>Data Scientist</h2>
          <p><strong>Reference Number:</strong> DS456</p>
          <p><strong>Position Title:</strong> Data Scientist</p>
          <p>
            <strong>Brief Description:</strong> We are seeking a Data Scientist
            to analyze large amounts of raw information to find patterns that
            will help improve our company. We will rely on you to build data
            products to extract valuable business insights.
          </p>
          <p><strong>Salary Range:</strong> $90,000 - $130,000</p>
          <p><strong>Reports To:</strong> Chief Data Officer</p>
          <h3>Key Responsibilities</h3>
          <ul>
            <li>
              Identify valuable data sources and automate collection processes
            </li>
            <li>
              Analyze large amounts of information to discover trends and
              patterns
            </li>
            <li>Build predictive models and machine-learning algorithms</li>
            <li>Present information using data visualization techniques</li>
            <li>Collaborate with engineering and product development teams</li>
          </ul>
          <h3>Required Qualifications</h3>
          <h4>Essential</h4>
          <ul>
            <li>
              Bachelor's degree in Data Science, Computer Science, or related
              field
            </li>
            <li>2+ years of experience as a Data Scientist</li>
            <li>Experience with data mining and statistical analysis</li>
            <li>Proficiency in R, SQL, and Python</li>
          </ul>
          <h4>Preferable</h4>
          <ul>
            <li>Experience with machine learning algorithms</li>
            <li>Knowledge of data visualization tools (e.g., Tableau)</li>
            <li>Strong analytical and problem-solving skills</li>
          </ul>
          <form action="apply.php" method="get">
            <input type="hidden" name="job-ref" value="DS456" />
            <button type="submit">Apply</button>
          </form>
        </section>
        <section class="job-box">
          <h2>Cyber Security Specialist</h2>
          <p><strong>Reference Number:</strong> CS789</p>
          <p><strong>Position Title:</strong> Cyber Security Specialist</p>
          <p>
            <strong>Brief Description:</strong> We are looking for a Cyber
            Security Specialist to protect our systems and data from cyber
            threats. The ideal candidate will have experience in implementing
            security measures and responding to security incidents.
          </p>
          <p><strong>Salary Range:</strong> $85,000 - $125,000</p>
          <p><strong>Reports To:</strong> Chief Information Security Officer</p>
          <h3>Key Responsibilities</h3>
          <ul>
            <li>Develop and implement security policies and procedures</li>
            <li>Monitor and respond to security incidents</li>
            <li>Conduct security assessments and audits</li>
            <li>
              Collaborate with IT and other departments to ensure security
              compliance
            </li>
            <li>Provide security training and awareness programs</li>
          </ul>
          <h3>Required Qualifications</h3>
          <h4>Essential</h4>
          <ul>
            <li>
              Bachelor's degree in Cyber Security, Information Technology, or
              related field
            </li>
            <li>3+ years of experience in cyber security</li>
            <li>Proficiency in security tools and technologies</li>
            <li>Strong problem-solving skills</li>
          </ul>
          <h4>Preferable</h4>
          <ul>
            <li>Experience with cloud security</li>
            <li>Knowledge of compliance standards (e.g., ISO 27001, NIST)</li>
            <li>Excellent communication skills</li>
          </ul>
          <form action="apply.php" method="get">
            <input type="hidden" name="job-ref" value="CS789" />
            <button type="submit">Apply</button>
          </form>
        </section>
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
