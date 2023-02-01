<?php
// Check if the title input is set
if (isset($_POST['title'])) {
  // Store the job title in a variable
  $title = $_POST['title'];

  // Build the API request URL
  $url = "https://api.adzuna.com/v1/api/jobs/gb/search/1?app_id=3fd229ca&app_key=d253223cb2164dd367ada81a4c754088&what=" . urlencode($title);

  // Use file_get_contents to retrieve the API response
  $response = file_get_contents($url);

  // Decode the JSON response
  $data = json_decode($response, true);

  // Check if the response is not empty
  if (!empty($data)) {
    echo "<div class='box'>";
    echo "<table class='table is-striped is-narrow is-hoverable is-fullwidth'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Job Title</th>";
    echo "<th>Company Name</th>";
    echo "<th>$$$ Salary</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
  
    // Loop through the jobs in the response
    foreach ($data['results'] as $job) {
      echo "<tr>";
  
      // Print the job title, company name, and salary
      echo "<td>" . $job['title'] . "</td>";
      echo "<td>" . $job['company']['display_name'] . "</td>";
      echo "<td>$" . $job['salary_min'] . " - $" . $job['salary_max'] . "</td>";
  
      // Add the apply button
      echo "<td><a class='button is-primary' href='" . $job['redirect_url'] . "'>Apply</a></td>";
  
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
  } else {
    // Print an error message
    echo "<p class='title is-4'>Sorry, no results were found for the job title '" . $title . "'. Please try a different title.</p>";
  }
  
  
}
?>
