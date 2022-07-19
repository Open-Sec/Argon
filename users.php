<?php 
session_start();

if (!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit();
}


require_once 'Database.php';

$db = new Database();
$results = $db->get_users();

?>


<!DOCTYPE html>
<html>

<head>
<?php include './templates/headhtml.php' ?>
</head>

<body>
  <!-- Sidenav -->
  <?php include './templates/sidebar.php' ?>

  <!-- Main content -->
  <div class="main-content" id="panel">

    <!-- Topnav -->
    <?php include './templates/topnav.php' ?>

    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Users</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Users List</h3>
            </div>

            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Username</th>
                    <th scope="col" class="sort" data-sort="budget">Firstname</th>
                    <th scope="col" class="sort" data-sort="status">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">

                  <?php
                  while ($row = $results->fetch_array() ) {
                    $jsonpwd[] = ['usr'=> $row['username'], 'pwd' => $row['password']]
                    ?>

                    <tr>
                      <td><?php echo $row['username'] ?></td>
                      <td><?php echo $row['firstname'] ?></td>
                      <td><?php echo $row['lastname'] ?></td>
                      <td><?php echo $row['email'] ?></td>
                      <td>
                        <?php $id = rand(100, 999); ?>
                        <input class="form-control form-control-pwd" type="password" placeholder="Password" ">
                      </td>

                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                        </div>
                      </td>

                    </tr>

                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>

            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <?php include './templates/footer.php' ?>

    </div>
  </div>

  <?php include './templates/scripts.php' ?>
</body>

</html>
