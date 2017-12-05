<?php
/**
 *socketServer.php		服务器端创建socket
 * @author     			singleside(singleside@singleside.cn)
 * @create-time			2017-12-05 10:39
 * @Last-Time			2017-12-05 10:39 + singleside
 * @des					socket服务器端
 * socket通信流程
 * @socket_create		创建socket套接字
 * @socket_bind			绑定端口
 * @socket_listen		监听端口
 * @socket_accept		创建阻塞
 * @socket_read			获取客户端发出的请求
 * @socket_write		将数据返回到客户端
 * @socket_close		关闭阻塞，套接字
 */
//确保在连接客户端时不会超时
header("content-type:text/html;charset=utf-8");
set_time_limit(0);
// 定义变量
$ip = "127.0.0.1";
$port = 2012;


// 创建套接字(通讯节点)

if(($sock = socket_create(AF_INET,SOCK_STREAM,SOL_TCP)) < 0){
	echo "socket_create() falied:reason:".socket_strerror($sock),PHP_EOL;
}

// 绑定端口

if( ($res = socket_bind($sock,$ip,$port)) < 0){
	echo "socket_bind() falied:reason:".socket_strerror( $res ),PHP_EOL;
}


// 监听端口

if( ($res = socket_listen($sock,5)) < 0 ){
	echo "socket_listen() falied:reason:".socket_strerror( $res ),PHP_EOL;
}

// 对通讯进行阻塞
do{
	if ( ($block = socket_accept($sock)) < 0 ){
		echo "socket_accept() falied:reason:".socket_strerror( $res ),PHP_EOL;
	}else{
		// 获取客户端传输的数据
		$buf = socket_read($block,8192);
		$return = 2*$buf+1;
		socket_write($block, $return, strlen($return));
	}
}while(true);
