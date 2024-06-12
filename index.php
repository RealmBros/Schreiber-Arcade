<!DOCTYPE html>

<html>
  <head>
    <title>Schreiber Arcade</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/games.css">
    <link rel="stylesheet" href="styles/upload.css">
  </head>

  <body>

    <!--HEADER-->

    <header class="header">
      <div class = 'left-section'>
        <img class = 'schreiber-logo', src="https://sch.portnet.org/pics/school_logo.png">
        <p class = 'text-logo'>
          Schreiber Arcade
        </p>
      </div>
      <div class = 'middle-section'>
        <input class="search-bar" type="text" placeholder="Search">
        <button class = 'search-button'>
          <img src="https://supersimple.dev/public/img/exercises/youtube/icons/search.svg" class = 'search-icon'>
          <div class="tooltip">Search</div>
        </button>
      </div>
      <div class="right-section">
        <button class = 'upload-button'>
          <div>Upload</div>
          <div class="tooltip">Upload Your Games</div>
        </button>
        <button class = 'sign-up'>
          Sign Up/Sign In
          <div class="tooltip">Join The Community</div>
        </button>
      </div>  
    </header>
    
    <!--GAMES-->

    <div class="game-grid">
      <div class="game-item">
        <img src="icons/pp.png">
        <div class="game-info">
          <h2>Game 1</h2>
          <p>Creator: Creator 1</p>
        </div>
      </div>
      <div class="game-item">
        <img src="icons/pp.png">
        <div class="game-info">
          <h2>Game 2</h2>
          <p>Creator: Creator 2</p>
        </div>
      </div>
      <!-- Repeat the game-item div for each game -->
      <div class="game-item">
        <img src="icons/pp.png">
        <div class="game-info">
          <h2>Game 3</h2>
          <p>Creator: Creator 3</p>
        </div>
      </div>
      <div class = 'game-item'>
        <img src = https://www.metacritic.com/a/img/resize/61c43cf0953ae1634e8ca15578c42899f716aff7/hub/2024/05/28/a8b5a5a3-ce43-4da3-976f-c9e47abf53a4/gamescorecard-2024-06-eldenring.jpg?auto=webp&width=1092>
      </div>
    </div>



    <!--UPLOAD GAME-->

    <div class="upload-container">
      <h2>Upload a Game</h2>
      <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="game-link">Game Link:</label>
        <input type="text" id="game-link" name="game-link" >
        <br>
        <label for="game-img">Choose A Cover Image:</label>
        <input type="file" id="game-file" name="game-file" >
        <br>
        <label for="game-name">Game Name:</label>
        <input type="text" id="game-name" name="game-name" >
        <br>
        <label for="game-creator">Creator:</label>
        <input type="text" id="game-creator" name="game-creator" >
        <br>
        <button type="submit">Upload</button>
      </form>
    </div>

  </body>
</html>

<?php
  
  $link = $_POST["game-link"];
  $name = $_POST["game-name"];
  $creator = $_POST["game-creator"];

  $img = $_FILES["game-file"]["name"]; // gets the name of the file
  $tmp_name = $_FILES["game-file"]["tmp_name"]; // gets the temporary name of the file
  $upload_dir = "icons/"; // specify the upload directory
  $upload_img = $upload_dir . $img; // create the full path to the uploaded file

  // move the uploaded file to the specified directory
  move_uploaded_file($tmp_name, $upload_img);


  // Output the HTML header
  echo "<!DOCTYPE html>";
  echo "<html>";
  echo "<head>";
  echo "<title>My Page</title>";
  echo '<link rel="stylesheet" href="styles.css">'; // Link to external CSS file
  echo '<link rel="stylesheet" href="styles/general.css">';
  echo '<link rel="stylesheet" href="styles/header.css">';
  echo '<link rel="stylesheet"  href="styles/games.css">';
  echo  '<link rel="stylesheet" href="styles/upload.css">';
  echo "</head>";
  echo "<body>";

  // Output the HTML content
  echo "<div class='game-item'>";
  echo "<img src='$upload_img'>";
  echo "<div class='game-info'>";
  echo "<h2>$name</h2>";
  echo "<p>Creator: $creator</p>";
  echo "</div>";
  echo "</div>";

  // Close the HTML tags
  echo "</body>";
  echo "</html>";
?>