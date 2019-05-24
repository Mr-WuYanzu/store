<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>订单号</td>
            <td>总价格</td>
            <td>操作</td>
        </tr>
        @foreach($order_info as $k=>$v)
        <tr>
            <td>{{$v->order_no}}</td>
            <td>{{$v->order_amout}}</td>
            <td><a href="/pay/alipay?oid={{$v->order_id}}" class="btn button-default">去支付</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>