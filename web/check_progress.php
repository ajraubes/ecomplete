<?php
if (file_exists('output/progress.txt')) {
    $progress = file_get_contents('output/progress.txt');
    echo $progress;
} else {
    echo '100%'; // Generation completed
}
?>