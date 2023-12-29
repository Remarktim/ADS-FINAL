

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous" />
    <style>
      body {
        background-color: #011533;
        color: white;
        text-align: center;
      }

      .container {
        width: 80%;
        margin: 16px auto;
      }

      h2 {
        text-align: center;
        font-family: "Verdana", sans-serif;
        font-size: 32px;
      }
      .btn {
        background-color: #1a237e;
        color: white;
      }
    </style>
  </head>
  <body>
    <header class="p-3">
      <ul class="nav">
        <li class="mx-2">
          <a class="btn" aria-current="page" href="home_page.php">Home</a>
        </li>
        <li class="mx-2">
          <a class="btn active" href="users_page.html">Employees</a>
        </li>
      </ul>
    </header>
    <main>
      <h1 class="mt-3">JOB DATA HISTORY</h1>
      <table
        class="table w-75 mx-auto mt-4 table-dark table-hover table-striped table-borderless p-3">
        <thead>
          <tr>
            <th scope="col">JOB</th>
            <th scope="col">DEPARTMENT</th>
            <th scope="col">JOB START</th>
            <th scope="col">JOB END</th>
            <th scope="col">REASON</th>
          </tr>
        </thead>
        <tbody>
        <?php
          @include 'db_conn.php';

          // Check if the 'id' parameter is set in the URL
          if (isset($_GET['id'])) {
              $employeeId = $_GET['id'];

              $sql = "SELECT job_positions.job_category, job_service.job_start_date, job_service.job_end_date, job_service.end_reason, departments.dept_name
                      FROM job_service
                      JOIN job_positions ON job_service.job_positions_idjob_positions = job_positions.idjob_positions
                      JOIN departments ON job_service.departments_iddepartments = departments.iddepartments
                      WHERE job_service.employees_idemployees = $employeeId";

              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      echo "<tr>
                              <td>" . $row['job_category'] . "</td>
                              <td>" . $row['dept_name'] . "</td>
                              <td>" . $row['job_start_date'] . "</td>
                              <td>" . $row['job_end_date'] . "</td>
                              <td class='text-capitalize'>" . $row['end_reason'] . "</td>
                              
                            </tr>";
                  }
              }
          }
        ?>

        </tbody>
      </table>
    </main>
    <footer>
        <a class="btn" href="users_page.php">Back</a>
    </footer>
  </body>
</html>
