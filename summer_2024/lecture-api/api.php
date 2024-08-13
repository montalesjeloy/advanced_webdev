<?php
require_once 'config.php';
require_once 'Employee.php';
// Create an instance of the Employee class
$employeeObj = new Employee($conn);
// Get the request method
$method = $_SERVER['REQUEST_METHOD'];
// Get the requested endpoint
$endpoint = $_SERVER['PATH_INFO'];
// Set the response content type
header('Content-Type: application/json');
// Process the request
switch ($method) {
    case 'GET':
        if ($endpoint === '/employees') {
            // Get all employees
            $employees = $employeeObj->getAllEmployees();
            echo json_encode($employees);
        } elseif (preg_match('/^\/employees\/(\d+)$/', $endpoint, $matches)) {
            // Get employee by ID
            $employeeId = $matches[1];
            $employee = $employeeObj->getEmployeeById($employeeId);
            echo json_encode($employee);
        }
        break;
    case 'POST':
        if ($endpoint === '/employees') {
            // Add new employee
            $data = json_decode(file_get_contents('php://input'), true);
            $result = $employeeObj->addEmployee($data);
            echo json_encode(['success' => $result]);
        }
        break;
    case 'PUT':
        if (preg_match('/^\/employees\/(\d+)$/', $endpoint, $matches)) {
            // Update employee by ID
            $employeeId = $matches[1];
            $data = json_decode(file_get_contents('php://input'), true);
            $result = $employeeObj->updateEmployee($employeeId, $data);
            echo json_encode(['success' => $result]);
        }
        break;
    case 'DELETE':
        if (preg_match('/^\/employees\/(\d+)$/', $endpoint, $matches)) {
            // Delete employee by ID
            $employeeId = $matches[1];
            $result = $employeeObj->deleteEmployee($employeeId);
            echo json_encode(['success' => $result]);
        }
        break;
}
?>
