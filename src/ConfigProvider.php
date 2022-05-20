<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-lock.
 *
 * @link     https://github.com/friendsofhyperf/lock
 * @document https://github.com/friendsofhyperf/lock/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */
namespace FriendsOfHyperf\Lock;

class ConfigProvider
{
    public function __invoke(): array
    {
        defined('BASE_PATH') or define('BASE_PATH', '');

        return [
            'dependencies' => [],
            'aspects' => [
                Annotation\LockAspect::class,
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'commands' => [],
            'listeners' => [
                Listener\RegisterPropertyHandlerListener::class,
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'config file of lock.',
                    'source' => __DIR__ . '/../publish/lock.php',
                    'destination' => BASE_PATH . '/config/autoload/lock.php',
                ],
                [
                    'id' => 'migrations',
                    'description' => 'migrations file of lock',
                    'source' => __DIR__ . '/../migrations/create_lock_table.php',
                    'destination' => BASE_PATH . '/migrations/2021_01_31_000000_create_lock_table.php',
                ],
            ],
        ];
    }
}
