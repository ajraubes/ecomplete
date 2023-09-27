<?php
$redis = new Redis();

// Replace the connection details with your Redis server information
$redis->connect('redis', 6379); // Use the service name from docker-compose.yml

while (true) {
    $task = $redis->lpop('background_task_queue'); // Dequeue a task

    if ($task) {
        // Process the task (e.g., generate CSV)
        $taskData = json_decode($task, true);
        generateCsv($taskData);
    } else {
        // No task found, sleep for a while
        sleep(1);
    }
}

function generateCsv($taskData) {
    // Implement your CSV generation logic here

    // Simulate the process
    sleep(5);

    // Log or update progress as needed
}
