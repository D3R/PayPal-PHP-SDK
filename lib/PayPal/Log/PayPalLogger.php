<?php

namespace PayPal\Log;

use PayPal\Core\PayPalConfigManager;
use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;

class PayPalLogger extends AbstractLogger
{

    /**
     * @var array Indexed list of all log levels.
     */
    private array $loggingLevels = [
        LogLevel::EMERGENCY,
        LogLevel::ALERT,
        LogLevel::CRITICAL,
        LogLevel::ERROR,
        LogLevel::WARNING,
        LogLevel::NOTICE,
        LogLevel::INFO,
        LogLevel::DEBUG
    ];

    /**
     * Configured Logging Level
     *
     * @var LogLevel $loggingLevel
     */
    private $loggingLevel;

    /**
     * Configured Logging File
     *
     * @var string
     */
    private $loggerFile;

    /**
     * Log Enabled
     */
    private ?bool $isLoggingEnabled = null;

    /**
     * @param string $className
     */
    public function __construct(/**
     * Logger Name. Generally corresponds to class name
     */
    private $loggerName)
    {
        $this->initialize();
    }

    public function initialize(): void
    {
        $config = PayPalConfigManager::getInstance()->getConfigHashmap();
        if (!empty($config)) {
            $this->isLoggingEnabled = (array_key_exists('log.LogEnabled', $config) && $config['log.LogEnabled'] == '1');
            if ($this->isLoggingEnabled) {
                $this->loggerFile = $config['log.FileName'] ?: ini_get('error_log');
                $loggingLevel = strtoupper($config['log.LogLevel']);
                $this->loggingLevel = (isset($loggingLevel) && defined(\Psr\Log\LogLevel::class . '::' . $loggingLevel)) ?
                    constant(\Psr\Log\LogLevel::class . '::' . $loggingLevel) :
                    LogLevel::INFO;
            }
        }
    }

    public function log($level, string|\Stringable $message, array $context = []): void
    {
        // Checks if the message is at level below configured logging level
        if ($this->isLoggingEnabled && array_search($level, $this->loggingLevels, true) <= array_search($this->loggingLevel, $this->loggingLevels, true)) {
            error_log("[" . date('d-m-Y H:i:s') . "] " . $this->loggerName . " : " . strtoupper($level) . sprintf(': %s%s', $message, PHP_EOL), 3, $this->loggerFile);
        }
    }
}
