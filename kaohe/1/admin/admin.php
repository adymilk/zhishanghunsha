<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理</title>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/comm.css">
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
	  <div class="container">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="/htdocs/kaohe/1/article/index.html">
	        后台管理
	      </a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">管理文章</a></li>
				<li><a href="add.html">添加文章</a></li>
			</ul>
		</div>
	  </div>
	</nav>
	<div class="container">
		<div class="col-md-8">
			<table class="table table-hover">
			  <tr>
			  	<th>ID</th>
			  	<th>标题</th>
			  	<th>作者</th><!--这里需要连表操作-->
			  	<th>浏览量</th>
			  	<th>字数</th>
			  	<th>操作</th>
			  </tr>
			  <!--对这个tr标签进行循环-->

			  <?php
					include_once "php/connect.php";
					$link = conn();

					$sql = "select * from shuju";
					$res = mysqli_query($link , $sql);
					if(mysqli_affected_rows($link)>0)
					{
						while($val = mysqli_fetch_array($res,MYSQLI_ASSOC)) {
							?>
							<tr>
								<a href="details.php?cid=<?php echo $val['id']; ?>"></a>

								<td><?php echo $val['id']; ?></td>
								<td><?php echo $val['biaoti']; ?></td>
								<td><?php echo $val['zuozhe']; ?></td>
								<td><?php echo $val['liulanliang']; ?></td>
								<td><?php echo $val['zishu']; ?></td>
								<td>
									<a href="update.php?cid=<?php echo $val['id']; ?>">
										<button type="button" class="btn btn-primary btn-xs">
											<i class="glyphicon glyphicon-pencil "></i>
										</button>
									</a>

									<a href="php/delete.php?cid=<?php echo $val['id']; ?>">
										<button type="button" class="btn btn-danger btn-xs">
											<i class="glyphicon glyphicon-trash "></i>
										</button>
									</a>
								</td>
							</tr>
							<?php
						}
					}
				?>
			</table>
		</div>
		<div class="col-md-4 hidden-xs hidden-sm">
			<ul class="list">
				<li><a href="add.html">添加文章</a></li>
				<li class="active"><a href="">管理文章</a></li>
			</ul>
		</div>
	</div>
	<footer>&copy; <a href="e8net.cn">e8net</a></footer>
</body>
</html>
