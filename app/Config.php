<?php

namespace App;


class Config
{
    const DB_HOST = 'localhost';
    const DB_NAME = 'stoyanov_mvc';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    const SHOW_ERRORS = false;
    const ERROR_LOGS_DIR = __DIR__ . DIRECTORY_SEPARATOR
                            . '..' . DIRECTORY_SEPARATOR
                            . 'logs' . DIRECTORY_SEPARATOR
                            . 'errors';
}