# demo-socket

##socketServer
服务器端socket

	 * @socket_create		创建socket套接字
	 * @socket_bind			绑定端口
	 * @socket_listen		监听端口
	 * @socket_accept		创建阻塞
	 * @socket_read			获取客户端发出的请求
	 * @socket_write		将数据返回到客户端
	 * @socket_close		关闭阻塞，套接字

客户端socket

	 * @des					socket客户端
	 * @socket_create		创建套接字(通讯节点)
	 * @socket_connect		链接服务器通讯节点
	 * @socket_write		向服务器发起请求
	 * @socket_read			读取服务器返回的数据
	 * @socket_close		关闭链接

SOCKET 实现流程

	![](https://i.imgur.com/S5PAgps.jpg)