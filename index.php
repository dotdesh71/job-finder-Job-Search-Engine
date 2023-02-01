<html>
<head>
  <title>JobFinder - Job Search Engine</title>
  <!-- Add any CSS frameworks you want to use, like Bulma -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
  <!-- Add the jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <section class="section">
    <div class="container">
    <div class='box has-background-danger-light'>
      <h1 class="title is-4">Job Search Engine - Find Your Next Career Opportunity With Ease</h1>
      <p class="subtitle is-5">Our Job Search Engine provides an easy and convenient way to search for your next career opportunity. Simply enter the job title or keywords and browse through the list of available jobs. Start your job search today!</p>
      <form>
        <div class="field">
          <label class="label">Enter Job Title :</label>
          <div class="control">
            <input class="input" type="text" name="title" placeholder="UI Designer" required>
          </div>
        </div>
        <div class="field">
          <div class="control">
            <input class="button is-success" type="submit" value="Search">
          </div>
        </div>
      </form>
    </div>
      <div id="results"></div>
    </div>
  </section>

  <script>
    $(document).ready(function() {
      // Handle form submission using jQuery
      $("form").submit(function(event) {
        event.preventDefault();
        var title = $("input[name='title']").val();
        // Show the loading animation
        $("#results").html('<progress class="progress is-small is-primary" max="100">15%</progress>');
        // Send the job title to the search.php file using AJAX
        $.ajax({
          url: "search.php",
          type: "post",
          data: {
            title: title
          },
          success: function(data) {
            // Update the page with the results of the search
            $("#results").html(data);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            $("#results").html("Sorry, there was an error retrieving the job search results. Please try again later.");
          }
        });
      });
    });
  </script>
</body>
</html>
