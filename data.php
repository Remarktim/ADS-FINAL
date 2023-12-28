<?php
@include 'db_conn.php';

$sql = "SELECT YEAR(service_records.appointment_start_date) AS appointment_year,
               COUNT(DISTINCT employees.idemployees) AS employee_count
        FROM service_records
        JOIN employees ON service_records.employees_idemployees = employees.idemployees
        WHERE service_records.appointment_start_date BETWEEN '1901-09-01' AND '2030-10-10'
        GROUP BY YEAR(service_records.appointment_start_date)";
$result = $conn->query($sql);

$data = [
    'labels' => [],
    'employeeData' => [],
];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data['labels'][] = $row['appointment_year'];
        $data['employeeData'][] = (int)$row['employee_count'];
    }
}

header('Content-Type: application/json');
echo json_encode($data);
?>
