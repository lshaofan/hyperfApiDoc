<?php

declare(strict_types=1);
/**
 * This file is part of 绿鸟科技.
 *
 * @link     https://www.greenbirds.cn
 * @document https://greenbirds.cn
 * @contact  liushaofan@greenbirds.cn
 */
namespace Gb\ApiDocs;

use Gb\ApiDocs\Listener\AfterWorkerStartListener;

class ConfigProvider
{
    /**
     * @return array<string, mixed>
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => [],
            'exceptions' => [
                'handler' => [
                    'http' => [
                    ],
                ],
            ],
            'middlewares' => [
                'http' => [
                ],
            ],
            'commands' => [
            ],
            'listeners' => [
                AfterWorkerStartListener::class,
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'apidoc配置',
                    'source' => __DIR__ . '/../publish/api_doc.php',
                    'destination' => BASE_PATH . '/config/autoload/api_doc.php',
                ],
            ],
        ];
    }
}
