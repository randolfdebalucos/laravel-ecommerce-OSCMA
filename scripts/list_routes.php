<?php
// Simple parser to report route URIs and methods from routes/web.php for debugging.
$path = __DIR__ . '/../routes/web.php';
if (!file_exists($path)) {
    echo "routes/web.php not found\n";
    exit(1);
}
$contents = file_get_contents($path);

// crude regex to capture Route::get/post/etc calls
preg_match_all('/Route::(get|post|put|patch|delete)\s*\(\s*["\']([^"\']+)["\']/', $contents, $matches, PREG_SET_ORDER);

$unique = [];
foreach ($matches as $m) {
    $method = strtoupper($m[1]);
    $uri = $m[2];
    $unique[$method . ' ' . $uri] = [$method, $uri];
}

if (empty($unique)) {
    echo "No routes found by parser.\n";
} else {
    echo "Detected routes:\n";
    foreach ($unique as $entry) {
        echo $entry[0] . "\t" . $entry[1] . "\n";
    }
}
