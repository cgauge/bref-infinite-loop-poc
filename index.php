<?php declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

set_exception_handler(function (Throwable $e) {
    echo "Writing into CloudWatch from my custom Error Handler: " . $e->getMessage() . "\n";
});

return function ($event) {
    // Sleep for a second here otherwise we write thousands of errors to CloudWatch in a few seconds
    sleep(1);

    $content = file_get_contents('non-utf8-bug');

    throw new Exception($content);
};
