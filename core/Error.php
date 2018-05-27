<?php

namespace Core;

use App\Config;

/**
 * Class Error
 * @package Core
 */
class Error
{
    /**
     * Gets error and converts it to ErrorException.
     * @param int $level Error level
     * @param string $message Error message
     * @param string $file Filename the error was raised in
     * @param int $line Line number in the file
     * @throws \ErrorException
     */
    public static function errorHandler(int $level, string $message, string $file, int $line)
    {
        if (error_reporting() !== 0) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    /**
     * Exception handler.
     * @param \Exception $exception
     */
    public static function exceptionHandler(\Exception $exception)
    {
        $code = $exception->getCode();
        if ($code != 404) {
            $code = 500;
        }
        http_response_code($code);
        if (Config::SHOW_ERRORS) {
            echo '<h1>Fatal error</h1>';
            echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
            echo "<p>Message: '" . $exception->getMessage() . "'</p>";
            echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre>";
            echo "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
        } else {
            if (!file_exists(Config::ERROR_LOGS_DIR)) {
                if (!mkdir(Config::ERROR_LOGS_DIR, 0777, true)) {
                    echo '<h1>Cannot create error logs dir</h1>';
                    exit;
                }
            }
            $log = dirname(__DIR__) . DIRECTORY_SEPARATOR
                . 'logs' . DIRECTORY_SEPARATOR
                . 'errors' . DIRECTORY_SEPARATOR
                . date('Y-m-d') . '.log';
            ini_set('error_log', $log);
            $message = "Uncaught exception: '" . get_class($exception) . "'";
            $message .= " with message: '" . $exception->getMessage() . "'";
            $message .= "\nStack Trace: " . $exception->getTraceAsString();
            $message .= "\nThrown in: '" . $exception->getFile() . "' on line " . $exception->getLine();
            error_log($message);
            if ($code === 404) {
                echo '<h1>Page not found</h1>';
            } else {
                echo '<h1>An error occurred</h1>';
            }
        }
    }
}