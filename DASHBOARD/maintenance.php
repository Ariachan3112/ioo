<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Image</title>
  <style>
    .user {
      width: 100%;         /* The div takes up the full width of its container */
      height: 80%;       /* Set a specific height for the div, adjust as needed */
      overflow: hidden;    /* Hide any part of the image that exceeds the div's boundaries */
    }

    .user img {
      width: 100%;         /* Make the image stretch to fill the width of the div */
      height: 100%;        /* Make the image fill the height of the div */
      object-fit: cover;   /* The image will maintain its aspect ratio and cover the div */
    }
  </style>
</head>
<body>

  <div class="user">
    <img src="assets/imgs/main2.jpg" alt="Image Description">
  </div>

</body>
</html>
