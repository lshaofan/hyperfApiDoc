# Api Doc

hyper 的docs


## 安装

```bash
composer require gb-hyperf/api-doc
```

## 发布配置

```bash
php bin/hyperf.php vendor:publish gb-hyperf/api-doc
```

- 随框架启动自动扫描生成api文件 runtime/openapi.json
- 自动路由 /api-doc 获取api文档
- 
  http://localhost:9501/api-doc