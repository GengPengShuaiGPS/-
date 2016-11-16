<?php 
//设置每页显示记录数、总页数
$pagesize = 4;
$pages = ceil($records/$pagesize);
//获取当前页码和计算开始行号
if (isset($_GET['page'])) {
	$page = $_GET['page'];
	$startrow = ($page-1)*$pagesize;
}else{
	$page = 1;
	$startrow = 0;
}
?>

<?php 
if($pagesize%2!=0){
	$halfPageSize = ($pagesize+1)/2;
	if ($page<=$halfPageSize+1) {
		$start = 1;
		$end = $pagesize;
	}
	if ($page>=$halfPageSize+2 && $page<=$pages-($halfPageSize-2)) {
		$start = $page-$halfPageSize;
		$end = $page+($halfPageSize-2);
	}
	if ($page>$pages-($halfPageSize-2)) {
		$start = $pages-($halfPageSize-3);
		$end = $pages;
	}
}else{
	$halfPageSize = $pagesize/2;
	if ($page<=$halfPageSize+1) {
		$start = 1;
		$end = $pagesize;
	}
	if ($page>=$halfPageSize+2 && $page<=$pages-($halfPageSize-1)){
		$start = $page-$halfPageSize;
		$end = $page+($halfPageSize-1);
	}
	if ($page>$pages-($halfPageSize-1)) {
		$start = $pages-($halfPageSize-2);
		$end = $pages;
	}
}
//上一页
$uppage = $page-1;
if ($page !=1) {
	echo "<a href='?page=$uppage'>上一页</a>";
}
for ($i=$start; $i<=$end; $i++) {
	if ($i == $page){
		//如果是当前页，那么当前页不带链接，并且赋予背景颜色
		echo "<span class='current'>$i</span>";
	}else{
		echo "<a href='?page=$i'>$i</a>";
	}
}
//下一页
$nextpage = $page+1;
if($page != $pages){
	echo "<a href='?page=$nextpage'>下一页</a>";
}
?>
