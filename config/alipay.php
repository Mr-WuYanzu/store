<?php

return [
    //应用ID,您的APPID。
    'app_id' => "2016092500594759",

    //商户私钥
    'merchant_private_key' => "MIIEowIBAAKCAQEAxvzANM+P5rQn5Ypv1xlxcaUz+S53TyRpffu75G73m70IN0ihQCa/bwFug7oTSXy5Zt+LGLGve9kUweGztsRFfie/XCDDDAQNv+pgTVRlzTwuj6NshgobkT3LKIZhAht0OYkQNzXPGOHHkKwiZNR3zPTcv/u4dAAtTETqK9H5hJkuJHN9rW4bSWFdpK2xZgdCkz/nsiYD3e+1+1QAdtVh0fRMXUzpKmYsQ6iMv5tpWXh2xwUTBOZrRC0Yu6Ot+rjLVqRzrANqRQHIcY63KqxfcWUZlpsz/LJRqdYsm6sVHAepKnAD8uoJkXU8ZY/b3Ud88x6bAoRm4w97V6es3LUprwIDAQABAoIBAHZ8qjbIIXfObrNP66i5jcOOC5SlBoYpuGc8LnWnXeludiX1KY95gyQmRhhKBJINopiPI9RgeY3VhXatXsXFuVuVb2z8VSgigc11UkK5rqS24ULGnShzfFbP5NkMq1cF4f8gjndRoy+9wYdz+Ebx/SQd6hSnXv4z3MU9g/Lz5Q/+2ULaJ4CQ6dasoQ4jkg3+4ZaBUdJWm/taJCgYaPM0Sql+UQvuusFujmXVWKT+BPZzuTe9W/lkkFMi2Vxb/XfWPDBVC6YE1/skMIUpgD3wK13K22ZJNJhTHHbN2I36LHA4nQUhgBQmDd09n0QY0c6UF2/itakaJD624f50G9l6doECgYEA7cnE0GIKdtrr2lyLJ4CgPOy3sOTASnzTA120p8WSoslpO5UZLXt0Jo2F67sjn07b0fZlwC0cFRGfdymkiZE7McvYcG4KwqOkcgurNUvYMDvv0yv8FJ8Fr3UB6sfZbA9Z65jAZ3KN8OrZd0drQRmW1ft3m3aaf+HmL0hgKf1q050CgYEA1jo6Gix5uIjDB0CMINHfoANMb8WuDaZzgPRXwZPI5oNkymQSGgrUh4T9KvkxgUYsO5GaQtg06dPAqkmJ1hYFtTV0m0IPwmU/PfxWTJs7MfOAchKiThBEexiG57F6lE3Ti2mZvslfVj3IMQGlP4E2BKvoqt7VjqyYPH2NqZ5iDrsCgYBJltncC5tlcRbwuxctoHb2o+OtUP3Zj4vWTNet3E0nJ+HzWI80LjKiA8ZgT8gUc1lAP1r6AHviYVPSkwaitFl3bbiMAuI9nls0GDxiABjlxIbR+ZjH4Pbnd/Sh7jtxX8baTKmu2hrnZibq7SVaPksZ6fr4F9p0nTqZg3KPTCgVWQKBgAMkLW/u0QYcs0dq8eMVUMMm6TsGWgwHMdBlRNgo05xVtuek2gMZv44RLCkyKECuB74D35A1XWlEWqHknCnQftruYrxYFqUSGQBOr/FFoXOVD4Act9aPNIHdlTTWjGaaUYzMyp1alJROKZ5WWNb6jRE6eBnxVI5YB49zg91F3kg7AoGBAIpIUNw+bHLnIqm6/GL6BO1cZ8HwbmzNdRfQvrSNQ2FtKrbny1mrHvpicpaN+p/legx9wjRHXath3zhYID4D3Gsi6ThbGcpE3AiOGxu0mDkhgqu1cZCUTDex1r/HTyy0scIrbC5cVWr2AEh3pn5nDDVLwsZB2kUwAsh7T9ZJixeh",

    //异步通知地址
    'notify_url' => "http://api.zhbcto.com/notify_url",

    //同步跳转
    'return_url' => "http://api.zhbcto.com/return_url",

    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type'=>"RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAxvzANM+P5rQn5Ypv1xlxcaUz+S53TyRpffu75G73m70IN0ihQCa/bwFug7oTSXy5Zt+LGLGve9kUweGztsRFfie/XCDDDAQNv+pgTVRlzTwuj6NshgobkT3LKIZhAht0OYkQNzXPGOHHkKwiZNR3zPTcv/u4dAAtTETqK9H5hJkuJHN9rW4bSWFdpK2xZgdCkz/nsiYD3e+1+1QAdtVh0fRMXUzpKmYsQ6iMv5tpWXh2xwUTBOZrRC0Yu6Ot+rjLVqRzrANqRQHIcY63KqxfcWUZlpsz/LJRqdYsm6sVHAepKnAD8uoJkXU8ZY/b3Ud88x6bAoRm4w97V6es3LUprwIDAQAB",
];