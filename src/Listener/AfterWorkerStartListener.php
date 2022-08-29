<?php

declare(strict_types=1);
/**
 * This file is part of 绿鸟科技.
 *
 * @link     https://www.greenbirds.cn
 * @document https://greenbirds.cn
 * @contact  liushaofan@greenbirds.cn
 */
namespace Gb\ApiDocs\Listener;

use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Framework\Event\AfterWorkerStart;
use Hyperf\Server\Event\MainCoroutineServerStart;
use Hyperf\Utils\ApplicationContext;

/**
 * 添加路由到框架.
 */
class AfterWorkerStartListener implements ListenerInterface
{
    public static string $massage;

    public function listen(): array
    {
        return [
            AfterWorkerStart::class,
            MainCoroutineServerStart::class,        ];
    }

    public function process(object $event): void
    {
        # 如果生产环境择不启用接口文档
        if (config('api_doc.enable')) {
            $container = ApplicationContext::getContainer();
            $logger = $container->get(StdoutLoggerInterface::class);
            $path = config('api_doc.scan_paths');
            $outputDir = config('api_doc.output_dir');
            $format = config('api_doc.format');
            try {
                $scanner = \OpenApi\Generator::scan([$path]);
                $destnation = $outputDir . 'openapi.' . $format;
                $scanner->saveAs($destnation);
            } catch (\Exception $e) {
                $logger->error('swagger注释语法错误--->' . $e->getMessage());
            }
        }
    }
}
