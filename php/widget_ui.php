<script language="javascript" type="text/javascript">
			blogInfo = new BlogInfo();
			function BlogInfo (){
				this.name = "<?php echo $blog_title = get_bloginfo('name');?>";
			}
		</script>
<script type='text/javascript'
	src="<?php echo plugins_url( '../js/allinsub-core.js' , __FILE__ );?>"></script>
<link rel="stylesheet" type='text/css'
	href="<?php echo plugins_url( '../css/widgets.css' , __FILE__ );?>"></link>
<div id="EP_Widget">
	<h1>Allinsub</h1>
	<br />
	<div>Soutenez <?php echo $blog_title = get_bloginfo('name');?></div>
	<br />
	<button id="bSubscribe" onClick="showAuthDialog()">Je m'abonne</button>
	<br />
	<div id="textViaDiv">
		Via <a href="www.allinsub.com">Allinsub</a>
	</div>
</div>
<div id="dialog" title="Basic dialog" style="display: none;"></div>