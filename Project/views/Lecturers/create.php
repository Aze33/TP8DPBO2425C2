<!DOCTYPE html>
<html>
<head>
  <title>Create Lecturer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
  <div class="col-lg-6 m-auto">
    <form method="post" action="index.php?action=create">
      <br><br>
      <div class="card">
        <div class="card-header bg-primary">
          <h1 class="text-white text-center"> Create Lecturer</h1>
        </div>
        <div class="card-body">
            <label> NAME: </label>
            <input type="text" name="name" class="form-control" required> <br>
            <label> NIDN: </label>
            <input type="text" name="nidn" class="form-control" required> <br>
            <label> PHONE: </label>
            <input type="text" name="phone" class="form-control" required> <br>
            <label> JOIN DATE: </label>
            <input type="date" name="join_date" class="form-control" required> <br>
            <button class="btn btn-success" type="submit" name="submit">Submit </button>
            <a class="btn btn-info" href="index.php"> Cancel </a>
        </div>
      </div>
    </form>
  </div>
</body>
</html>