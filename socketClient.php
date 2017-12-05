<?php
/**
 * socketClient.php
 * @author     			singleside(singleside@singleside.cn)
 * @create-time			2017-12-05 10:39
 * @Last-Time			2017-12-05 10:39 + singleside
 * @des					socket客户端
 * @socket_create		创建套接字(通讯节点)
 * @socket_connect		链接服务器通讯节点
 * @socket_write		向服务器发起请求
 * @socket_read			读取服务器返回的数据
 * @socket_close		关闭链接
 */

// 创建变量
$ip = "127.0.0.1";
$port = 2012;

// 创建套接字(通讯节点)
if( ($socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0 ){
	echo "socket_create创建套接字失败".socket_strerror($socket),PHP_EOL;
}

// 链接远程服务器
if( ($res = socket_connect($socket,$ip,$port)) < 0 ){
	echo "socket_connect() falied:reason:".socket_strerror( $res ),PHP_EOL;
}

// 将数据发送到服务器
$in = 11111;
if( ($for = socket_write($socket,$in,strlen($in))) < 0 ){
	echo "socket_write() falied:reason:".socket_strerror( $for ),PHP_EOL;
}else{
	echo "数据发送成功",PHP_EOL;
}

if( ($get = socket_read($socket,8192)) < 0 ){
	echo "socket_read() falied:reason:".socket_strerror( $get ),PHP_EOL;
}else{
	echo "接收服务器端数据成功：",$get,PHP_EOL;
}

