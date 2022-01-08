			
			<a href="?link=<?php echo $link?>&tool=view" class="<?php echo $tool == "view"?"active ":""?>page_func"><li>Danh sách</li></a>

			<?php if (($_SESSION['access'] == 0 && $link === 'product') || ($_SESSION['access'] == 1 && $link !== 'out')) {?>
			<a href="?link=<?php echo $link?>&tool=create" class="<?php echo $tool == "create"?"active ":""?>page_func"><li>Thêm đối tượng</li></a>
			<?php }?>

			<?php if ($_SESSION['access'] == 1 && ($link!=='out') && ($link!=='manufacturers')){ ?>
			<a href="?link=<?php echo $link?>&tool=del" class="<?php echo $tool == "del"?"active ":""?>page_func"><li>Xóa đối tượng</li></a>
			<?php }?>