<?php

declare(strict_types=1);
/**
 * This file is part of 绿鸟科技.
 *
 * @link     https://www.greenbirds.cn
 * @document https://greenbirds.cn
 * @contact  liushaofan@greenbirds.cn
 */
namespace Gb\ApiDocs\Action;

use Gb\Framework\Action\AbstractAction;
use Hyperf\HttpMessage\Stream\SwooleFileStream;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;

#[Controller]
class Swagger extends AbstractAction
{
    #[GetMapping('/api-doc')]
    public function handle(): \Psr\Http\Message\ResponseInterface
    {
        $api = new SwooleFileStream(BASE_PATH . '/runtime/openapi.json');

        return $this->response->withBody($api);
    }
}
