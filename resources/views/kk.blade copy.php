{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile Page</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>

    <div class="container my-5">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <img src="https://via.placeholder.com/150" class="card-img-top" alt="avatar">
            <div class="card-body">
              <h5 class="card-title">First Name Last Name</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce auctor elit sit amet elit ornare, sed cursus justo bibendum.</p>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Profile Information</h5>
              <hr>
              <p class="card-text">Home Phone: XXX-XXX-XXXX</p>
              <p class="card-text">Mobile: XXX-XXX-XXXX</p>
              <p class="card-text">Birthday: Month Day, Year</p>
              <p class="card-text">Gender: Male/Female/Other</p>
              <p class="card-text">Blood Type: A/B/AB/O</p>
              <p class="card-text">Home Address: Street, City, State Zipcode</p>
              <p class="card-text">School Address: Street, City, State Zipcode</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>
    
  </body>
</html> --}}

{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Child Profile Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- Header -->
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Child Profile Page</a>
      </nav>
    </header>
    <!-- Main Content -->
    <main class="container">
      <div class="row mt-4">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <img src="avatar.jpg" alt="Avatar" class="rounded-circle" width="200" height="200" />
              <h4 class="card-title mt-2">John Doe</h4>
              <p class="card-text">
                <strong>Birthday:</strong> 01/01/2010<br />
                <strong>Gender:</strong> Male<br />
                <strong>Blood Type:</strong> AB<br />
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Contact Information</h4>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fas fa-phone-alt mr-2"></i>Home Phone: (123) 456-7890</li>
                <li class="list-group-item"><i class="fas fa-mobile-alt mr-2"></i>Mobile: (123) 456-7890</li>
                <li class="list-group-item"><i class="fas fa-home mr-2"></i>Home Address: 123 Main St, Anytown, USA</li>
                <li class="list-group-item"><i class="fas fa-school mr-2"></i>School Address: 456 School Rd, Anytown, USA</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-2">
      &copy; 2023 Child Profile Page. All rights reserved.
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
 --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Child Profile Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        body {
  background-color: #f7e6f2; /* light pink */
}

.card {
  border-color: #ffb6c1; /* light pink */
}

.card-title {
  font-size: 36px;
  color: #ff69b4; /* hot pink */
}

.card-body {
  font-size: 24px;
  color: #ff69b4; /* hot pink */
}

.list-group-item {
  background-color: #fff0f5; /* lavender blush */
}

.btn-primary {
  background-color: #ffb6c1; /* light pink */
  border-color: #ffb6c1; /* light pink */
  color: #fff; /* white */
}

.btn-primary:hover {
  background-color: #ff69b4; /* hot pink */
  border-color: #ff69b4; /* hot pink */
  color: #fff; /* white */
}

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="row no-gutters">
                        <div class="col-md-3">
                            <img src="avatar.png" class="card-img img-thumbnail rounded-circle" alt="Avatar" />
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <strong>Firstname Lastname</strong>
                                </h5>
                                <hr />
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <strong>Birthday:</strong> 01/01/2010
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Gender:</strong> Male
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Blood Type:</strong> O+
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Home Phone:</strong> (123) 456-7890
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Mobile:</strong> (555) 555-5555
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <strong>Home Address:</strong> 123 Main St
                                            </li>
                                            <li class="list-group-item">
                                                <strong>School Address:</strong> 456 Elm St
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="#" class="btn btn-primary">Edit Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script
