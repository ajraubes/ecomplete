<?php
$redis = new Redis();

$redis->connect('redis', 6379);

while (true) {
    $task = $redis->lpop('background_task_queue');

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