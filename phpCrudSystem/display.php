<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Display Articles</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Display</title>
</head>

<body>
  <div class="container my-5">
    <!-- //direct the button to the insert page to add new article -->
    <button class="btn btn-primary my-5 "><a href="insert.php" class="text-light">New Article</a></button>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <img src="" alt="">
          <th scope="col">Image</th>
          <th scope="col">Author</th>
          <th scope="col">Creation Date</th>
          <th scope="col">Operations</th>

        </tr>
      </thead>
      <tbody>
        <?php
        // //retreive data from mysql database
        $sql = "select * from `articles` ";
        $result = mysqli_query($connect, $sql);

        if ($result) {
          //get the data from tha table 
          // so the values here show me tha same names of columns
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $image = $row['image'];
            $title = $row['title'];
            $date = $row['creation_date'];
            $creator_id = $row['creator_id'];

            // $name =$row['creator_id']; 
            $sql2 = "select * from `creators` where id=" . $creator_id;
            $result2 = mysqli_query($connect, $sql2);

            if ($result2) {
              $row = mysqli_fetch_assoc($result2);
               
              $id_creator = $row['id'];
              $creator_name = $row['name'];

              echo '<tr>
<th scope="row">' . $id . '</th>
<td>' . $title . '</td>
<td><img class="image"src="uploads/' . $image . '" alt=""></td>
<td>' . $creator_name . '</td>
<td>' . $date . '</td>
<td>
<button class="btn btn-success"> <a href="view.php?id=' . $id . '"class="text-light">View</a></button>
    <button class="btn btn-primary "> <a href="update.php?id=' . $id . '"class="text-light" >Edit</a></button>
  
    <button class="btn btn-danger" > <a href="delete.php?id=' . $id . '" class="text-light delete">Delete</a></button>
   
  
  </td>
</tr> ';
            }
          }
        }


        // delete.php?deleteid = '.$id.' to detete item by the id
        ?>

      </tbody>
    </table>
  </div>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script language="JavaScript" type="text/javascript">
    $(document).ready(function() {
      $("a.delete").click(function(e) {
        if (!confirm('Are you sure?')) {
          e.preventDefault();
          return false;
        }
        return true;
      });
    });
  </script>
</body>

</html>