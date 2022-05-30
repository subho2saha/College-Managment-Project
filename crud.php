<?php

$noti = false;
$update = false;
$delete = false;

$server="localhost";
$username="root";
$password="";
$database="notes";

$con = mysqli_connect($server, $username, $password, $database);

if (!$con)
{
    die ("connection failed due to " . mysqli_connection_error);
}
else{
    //  echo "successfully connected";
    if(isset($_GET['delete'])){
      $sno=$_GET['delete'];

      $sql4 = "DELETE FROM `notes` WHERE `sno` = $sno";
      $res4 = mysqli_query($con, $sql4);

      if($res4){
        $delete = true;
      }  

    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      if(isset( $_POST['snoEdit'])){
          // update table
          $sno = $_POST['snoEdit'];
          $title = $_POST['titleEdit'];
          $desc = $_POST['descEdit']; 
    
          $sql3 = "UPDATE `notes` SET `Title` = '$title', `Description` = '$desc' WHERE `notes`.`sno` = $sno;";
          $ress = mysqli_query($con, $sql3);

          if($ress){
            $update = true;
          }    
      }
      else{

      $title = $_POST['title'];
      $desc = $_POST['desc']; 

      $sql = "INSERT INTO `notes` (`Title`, `Description`) VALUES ('$title', '$desc');";
      $res = mysqli_query($con, $sql);

      if($res){
        $noti=true;
      }
    
      }
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

  <!-- <script> //cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js </script> -->
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>

  <title>Update notice</title>

</head>

<body>
  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
  Edit modal
</button> -->

  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Editthis node</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="container my-4">
            <form action="/crud/index.php" method="post">
              <input type="hidden" name="snoEdit" id="snoEdit">
              <h2>Add Note</h2>
              <div class="mb-3">
                <label for="title" class="form-label">Note Title</label>
                <input type="text" class="form-control" id="titleEdit" name="titleEdit">
              </div>

              <div class="mb-3">
                <label for="desc" class="form-label">Note Description</label>
                <textarea class="form-control" id="descEdit" name="descEdit" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary" name="btn">Update note</button>
          </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="adhome.php">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">services</a>

          <li class="nav-item">
            <a class="nav-link" href="#">Contact us</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <?php

        if($noti == true){
          echo " <div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Success!</strong> Your note has been added.
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div> ";
        }

         if($update == true){
          echo " <div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Success!</strong> Your note has been updated successfully.
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div> ";
         }

         if($delete == true){
          echo " <div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Success!</strong> Your note has been deleted successfully.
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div> ";
         }

      ?>
  <div class="container my-4">
    <form action="crud.php" method="post">
      <h2>Add Notice</h2>
      <div class="mb-3">
        <label for="title" class="form-label">Notice Title</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>

      <div class="mb-3">
        <label for="desc" class="form-label">Notice Description</label>
        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="btn">Add notice</button>
  </div>
  </form>

  <div class="container my-4">

    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">Sno</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sqll = "SELECT * FROM `notes`";
        $result = mysqli_query($con, $sqll); 
        // echo $result;
        $sno = 0;
        while ( $row = mysqli_fetch_assoc($result) ) {
          $sno = $sno + 1;
          echo "<tr>
          <th scope='row'>" . $sno . "</th>
          <td>" . $row['Title'] . "</td>
          <td>" . $row['Description'] . "</td>
          <td><button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> 
           <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button> </td>
        </tr>";
        }
        ?>

      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>

  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ",);
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        console.log(title, description);
        titleEdit.value = title;
        descEdit.value = description;

        snoEdit.value = e.target.id;
        console.log(e.target.id);
        $('#editModal').modal('toggle');
      })
    })


    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ",);
        sno = e.target.id.substr(1,);

        if (confirm("Are you sure!!! you want to delete 1 item?")) {
          console.log("yes");
          window.location = ` /crud/index.php?delete=${sno} `;
        }
        else {
          console.log("no");
        }
      })
    })

  </script>

</body>

</html>