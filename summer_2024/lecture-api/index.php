<?php
// Include the common cURL file
require_once 'curl_helper.php';
$restAPIBaseURL = 'http://localhost/advanced_webdev/summer_2024/lecture-api';
try {
    // Get all employees
    $employees = sendRequest($restAPIBaseURL.'/api.php/employees', 'GET');
    $employees = json_decode($employees, true);
    // Process the response
    // Get employee by ID
    $employeeId = 1;
    $employee = sendRequest($restAPIBaseURL."/api.php/employees/$employeeId", 'GET');
    $employee = json_decode($employee, true);
    // Process the response
    // Add new employee
    $data = [
        'emp_name' => 'John Doe',
        'emp_code' => 'E001',
        'emp_email' => 'john.doe@example.com',
        'emp_phone' => '1234567890',
        'emp_address' => '123 Street, City',
        'emp_designation' => 'Manager',
        'emp_joining_date' => '2022-01-01',
    ];
    $result = sendRequest($restAPIBaseURL.'/api.php/employees', 'POST', $data);
    $result = json_decode($result, true);
    // Process the response
    // Update employee by ID
    $employeeId = 1;
    $data = [
        'emp_name' => 'Updated Name',
        'emp_code' => 'E002',
        'emp_email' => 'updated.email@example.com',
        'emp_phone' => '9876543210',
        'emp_address' => '456 Street, City',
        'emp_designation' => 'Supervisor',
        'emp_joining_date' => '2022-02-01',
    ];
    $result = sendRequest($restAPIBaseURL."/api.php/employees/$employeeId", 'PUT', $data);
    $result = json_decode($result, true);
     
    // Process the response
    // Handle any additional logic or data processing
} catch (Exception $e) {
    // Handle any exceptions that occur during the API calls
}
?>
