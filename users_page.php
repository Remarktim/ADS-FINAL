<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>users</title>
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
      .table {
        background: transparent !important;
      }
      tbody {
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <header class="p-3">
      <ul class="nav">
        <li class="mx-2">
          <a class="btn" aria-current="page" href="home.html">Home</a>
        </li>
        <li class="mx-2">
          <a class="btn active" href="users_page.html">Employees</a>
        </li>
      </ul>
    </header>
    <main>
      <h1 class="mt-3">EMPLOYEES</h1>
      <table
        class="table w-75 mx-auto mt-4 table-dark table-hover table-striped table-borderless p-3">
        <thead>
          <tr>
            <th scope="col">ID #</th>
            <th scope="col">FIRST NAME</th>
            <th scope="col">MIDDLE NAME</th>
            <th scope="col">LAST NAME</th>
          </tr>
        </thead>
        <tbody>
        <?php
            @include 'db_conn.php';

            $sql = "SELECT idemployees, first_name, middle_name, last_name FROM employees";
            $result = $conn->query($sql);

            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    echo "<tr onclick=\"window.location='job_history.php?id=" . $row['idemployees'] . "';\">
                              <td>" . $row['idemployees'] . "</td>
                              <td>" . $row['first_name'] . "</td>
                              <td>" . $row['middle_name'] . "</td>
                              <td>" . $row['last_name'] . "</td>
                          </tr>";
                }
            }
        ?>

        </tbody>
      </table>
    </main>
  </body>
</html>
