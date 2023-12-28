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

    <script
      src="https://cdn.jsdelivr.net/npm/Bootstrap@5.2.2/dist/js/Bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/Bootstrap@5.2.2/dist/js/Bootstrap.min.js"
      integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

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
          <a class="btn active" aria-current="page" href="home_page.php">Home</a>
        </li>
        <li class="mx-2">
          <a class="btn" href="users_page.php">Employees</a>
        </li>
      </ul>
    </header>

    <div class="container">
      <h2>Graph</h2>
      <div>
        <canvas id="myLineChart"></canvas>
      </div>
    </div>

    <footer>
      <h3 id=""></h3>
    </footer>


<script>
  // Function to fetch data from the server
  async function fetchData() {
      try {
          const response = await fetch('data.php'); // Adjust the path if necessary
          const data = await response.json();

          return data;
      } catch (error) {
          console.error('Error fetching data:', error);
          return null;
      }
  }

  // Function to update the chart with the fetched data
  async function updateChart() {
      const data = await fetchData();

      if (data) {
          var ctx = document.getElementById("myLineChart").getContext("2d");
          var myChart = new Chart(ctx, {
              type: "line",
              data: {
                  labels: data.labels,
                  datasets: [
                      {
                          label: "Employee",
                          data: data.employeeData,
                          backgroundColor: "#1A237E ",
                      },
                  ],
              },
              options: {
                  scales: {
                      y: {
                          beginAtZero: true,
                      },
                  },
              },
          });
      }
  }

  // Call the updateChart function when the page loads
  window.onload = updateChart;
</script>
</body>
</html>

  </body>
</html>
