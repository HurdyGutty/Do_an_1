
<?php if(empty($_SESSION['access'])) {
	header('location:../logout.php');
	exit;
}else{ ?>	
		<div id="main_body">
			<?php 
				foreach ($ket_qua as $each) {
					?>
					<div class="items" onclick="viewpage(<?php echo $each['id'];?>)">
						<img src="<?php echo $each['photo']?>">
						<div><?php echo $each['name']; ?></div>
						<div><?php echo $each['phone'];?></div>
						<div><?php echo date_format(new DateTime($each['birthday']),"d/m/Y");?></div>
					</div>
				<?php }; ?>
			
			<div id="page">
				<?php for ($i=1 ; $i <= $max_page ; $i++) 
				{ ?>
					<a href="?link=<?php echo $link?><?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>&page=<?php echo $i?>&tool=<?php echo $tool;?>"><?php echo $i ?></a>	
				<?php }; ?>
			</div>
		</div>
<?php }; ?>