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
    <link rel="stylesheet" href="styles/apply.css" />
  </head>
  <body>
  <?php
      include 'header.inc';
      ?>
    <main class="container">
      <h1 class="content-container">Job Application</h1>
      <form action="process_eoi.php" method="post">
        <div>
          <label for="job-ref"
            >Job Reference Number
            <span class="tooltip"
              >?
              <span class="tooltiptext">Exactly 5 alphanumeric characters</span>
            </span></label
          >
          <input
            type="text"
            id="job-ref"
            name="job-ref"
            pattern="[A-Za-z0-9]{5}"
            required
          />
        </div>
        <div>
          <label for="first-name"
            >First Name
            <span class="tooltip"
              >?
              <span class="tooltiptext">Max 20 alpha characters</span>
            </span></label
          >
          <input
            type="text"
            id="first-name"
            name="first-name"
            maxlength="20"
            pattern="[A-Za-z ]+"
            required
          />
        </div>
        <div>
          <label for="last-name"
            >Last Name
            <span class="tooltip"
              >?
              <span class="tooltiptext">Max 20 alpha characters</span>
            </span></label
          >
          <input
            type="text"
            id="last-name"
            name="last-name"
            maxlength="20"
            pattern="[A-Za-z ]+"
            required
          />
        </div>
        <div>
          <label for="dob"
            >Date of Birth
            <span class="tooltip"
              >?
              <span class="tooltiptext">Format: dd/mm/yyyy</span>
            </span></label
          >
          <input
            type="text"
            id="dob"
            name="dob"
            pattern="\d{2}/\d{2}/\d{4}"
            placeholder="dd/mm/yyyy"
            required
          />
        </div>
        <div>
          <fieldset>
            <legend>Gender</legend>
            <div class="radio-group">
              <label>
                <input type="radio" name="gender" value="male" required />
                Male
              </label>
              <label>
                <input type="radio" name="gender" value="female" required />
                Female
              </label>
              <label>
                <input type="radio" name="gender" value="other" required />
                Other
              </label>
            </div>
          </fieldset>
        </div>
        <div>
          <label for="address"
            >Street Address
            <span class="tooltip"
              >?
              <span class="tooltiptext">Max 40 characters</span>
            </span></label
          >
          <input
            type="text"
            id="address"
            name="address"
            maxlength="40"
            required
          />
        </div>
        <div>
          <label for="suburb"
            >Suburb/Town
            <span class="tooltip"
              >?
              <span class="tooltiptext">Max 40 characters</span>
            </span></label
          >
          <input
            type="text"
            id="suburb"
            name="suburb"
            maxlength="40"
            required
          />
        </div>
        <div>
          <label for="state">State</label>
          <select id="state" name="state" required>
            <option value="VIC">Đống Đa</option>
            <option value="NSW">Hà Đông</option>
            <option value="QLD">Long Biên</option>
            <option value="NT">Hai Bà Trưng</option>
            <option value="WA">Hoàn Kiếm</option>
            <option value="SA">Hoàng Mai</option>
            <option value="TAS">Thanh Xuân</option>
          </select>
        </div>
        <div>
          <label for="postcode"
            >Postcode
            <span class="tooltip"
              >?
              <span class="tooltiptext">Exactly 4 digits</span>
            </span></label
          >
          <input
            type="text"
            id="postcode"
            name="postcode"
            pattern="\d{4}"
            required
          />
        </div>
        <div>
          <label for="email"
            >Email Address
            <span class="tooltip"
              >?
              <span class="tooltiptext">Enter a valid email address</span>
            </span></label
          >
          <input type="email" id="email" name="email" required />
        </div>
        <div>
          <label for="phone"
            >Phone Number
            <span class="tooltip"
              >?
              <span class="tooltiptext">8 to 12 digits, or spaces</span>
            </span></label
          >
          <input
            type="text"
            id="phone"
            name="phone"
            pattern="\d{8,12}"
            required
          />
        </div>
        <div>
          <fieldset>
            <legend>Skills</legend>
            <div class="checkbox-group">
              <label>
                <input type="checkbox" name="skills" value="HTML" />
                HTML
              </label>
              <label>
                <input type="checkbox" name="skills" value="CSS" />
                CSS
              </label>
              <label>
                <input type="checkbox" name="skills" value="JavaScript" />
                JavaScript
              </label>
              <label>
                <input type="checkbox" name="skills" value="Python" />
                Python
              </label>
              <label>
                <input type="checkbox" name="skills" value="Java" />
                Java
              </label>
              <label>
                <input type="checkbox" name="skills" value="Other" />
                Other skills...
              </label>
            </div>
          </fieldset>
        </div>
        <div>
          <label for="other-skills">Other Skills</label>
          <textarea id="other-skills" name="other-skills"></textarea>
        </div>
        <div>
          <button type="submit">Apply</button>
        </div>
      </form>
    </main>
  </body>
</html>
