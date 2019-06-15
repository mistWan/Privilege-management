<?php
 //实例化Redis类
 $redis = new Redis();
//选择指定的redis数据库连接，默认端口号为6379
 $redis->connect('127.0.0.1', 6379);
 //设置 redis 字符串数据
 $redis->set("tutorial-name", "Redis tutorial");
 // 获取存储的数据并输出
 echo "Stored string in redis:: " . $redis->get("tutorial-name");
