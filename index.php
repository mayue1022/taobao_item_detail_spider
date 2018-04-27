<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<title>淘宝图片抓取</title>
	<meta name="author" content="rooma">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="format-detection" content="telephone=no">
	<meta name="format-detection" content="email=no">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <link href="https://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
		body {
			font-family: "Microsoft Yahei";
			background: #e6e6e6 url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkAgMAAAANjH3HAAAAA3NCSVQICAjb4U/gAAAADFBMVEXX19fm5ube3t7r6+sdGJkMAAAACXBIWXMAAAsSAAALEgHS3X78AAAAHHRFWHRTb2Z0d2FyZQBBZG9iZSBGaXJld29ya3MgQ1M1cbXjNgAABGJJREFUSIltVkGO5DYM1DkPyCPyH2rWAvaoAaT7PoUGWscFKIyUc54y/0kVJbt7JlFPo23TpIrFIjWhJ2sS1Q4ROeWsc8RHPvANwhVFD3NLmuP9sNRHDX3a9PVXm7PiM3jjlurPz3FKRlS5Vgn7IoqkqlELLpMVvBsQfv7PGiVMleE+JyM9o9Uwkw08j+seltRFkMIMs27/3uZJbA85KqMQgb7Jiw+87IhAMNOcBYnDpzY9sfcKYiGO2MaETwdm6RXva0FECfJtTQ/o0WafV0aa9kUFvjCxo7+EfGCIzDLTN6jEh2eKXTbAI9OX2JrUV15WYEZbPvPcEI79DTP2BmqrRa2T4Y53MiA5oCiN284/wUy/KmeNCFZ9niyvaOB6bQsq8BOZWacPLJ21IG/n9GxcHbPrskga0fpJrFmqJfcLX9O4lvvsxCANklLVwfyU71z/En96CPRmwhRXaPjWdRGnBlm320K8JnMwnzvQz+vCvICTekPlgNvSKzhwDUCNhcn58lkXUC92kfmIwySrsK7bGZacEoo00CztTpv1MS2IBkY1fcZL1wcRoBKQNlKbDW+OTE6jIzDdBTFqVytvWf8axpbHH70llWZzdDBArhfHDQ9adQzDWmy28gGPZDI9tcNFi6vQchJVcPaA62PpAM0QG1ElpGTgF7fIKGQ94HOK2fRslH9LiVfaNhOIMttEeDTCFsSBvmFbKc1v1b70GA0+o48oNf5nXKQwMLIYY7pIJzRUNLGVwp3aW/x8qdyZwuKGBX+RiWOz3GhRf9rsNCmoFqMhVvzHO5SDzKghvzlWNHZ5OZNisqEIDiaFv33LyIHou28JHUCN7iRIIrCdJ0fIDHsAOVtGtkFT4n0Ycr+oirYytXhIrhKKZxqVQBUDNvcBF6MlY/IU8SmpEfU/h6NGtALLUbnpaW2onWPqjzF/uyVhpkPA0c6pOWKm0yscTKBw6HS5qD2WpUww94Fte/xSoOdU5j6eVCHQuvJRLxGI3ak93CKf1Cg0Xru+X94fHq2QN9bnudoEscB2vnTni7BROSgJm+IsAOU8fljLISk0sKS0cKaxQ7H/A/FT0M9vMoyHv1CZT0aK7A2wsqTMVsA+sCR2jVzn07EAheNrNEx+sFbx4+ycOHzi6MZG3cdphkKW1geiadYlOxAFC1ry84qW455XGKMaWHVEvEaOurh7M0Y7mTwP35tpRkc0DCotaMNBHqqW5UsfgISQdZ1quJxplR0KudKL/pf9FkINv+vHQr0bDF3Q59DMblRy8Yb6gHJ0NauAZ/f5U/I+mnNCbYaKs8OXh1vwWfuQ0UT1Qh3QNbF19FA8XW/jODeCZ1/Py8L9hJkKQd3R+PNLXlbcQO5JkfFvgEjdjamZ0dBRJavrDZfexUXzPcWUPpkHB2rNW0T7evSthWc+XdbsLKqLqCMmBr8sOyYsNV351LvKejeZ5zMKxkCO3gv5HvBynad+BPSta/HG8Ez9xDaghg66RV1v/gsXm78L6/uerAAAAABJRU5ErkJggg==") repeat;
		}
		.container-fluid {
			padding-top: 10px;
			padding-bottom: 10px;
		}
		.i-imgs > div {
			display: inline-block;
			margin: 0 20px 20px 0;
			text-align: center;
		}
		.i-imgs > div img {
			max-height: 200px;
			max-width: 100%;
		}
	</style>
</head>
<body>
<div class="container-fluid" ms-controller="app">

	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info">
				<p><strong>淘宝图片抓取</strong></p>
				<p>1、抓取淘宝商品的缩略图；</p>
				<p>2、抓取淘宝商品的详情图；</p>
			</div>
		</div>
	</div>

	<div class="row" style="margin-bottom: 20px;">
		<div class="col-md-12">
			<form class="form" action="#" method="post" onsubmit="javascript:return false;">
				<div class="form-group">
					<label class="form_control">商品网址：</label>
					<input type="text" class="form-control" ms-duplex-value="form['url']" required placeholder="支持淘宝和天猫网址" style="width:800px;">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary" ms-on-click="changeType('thumb')">抓取缩略图</button>
					<button type="submit" class="btn btn-primary" ms-on-click="changeType('detail')">抓取详情图</button>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 i-imgs">
			<div ms-repeat="datas">
				<a ms-attr-href="el" target="_blank">
					<img ms-attr-src="el"><br>
					[点击打开大图]
				</a>
			</div>
		</div>
	</div>

</div>
</body>
</html>
<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script src="avalon.modern.min.js" charset="utf-8"></script>
<script>
(function(){
	var app = avalon.define({
		$id: 'app',
		form: {url:null,type:null},
		datas: [],
		changeType: function(type){
			app.form.type =type;
			app.search();
		},
		search: function(){
			app.datas.removeAll();
			$.getJSON( './taobao.php' , app.form.$model , function(data){
				app.datas = data;
			});
		}
	});
	avalon.scan();
	app.form.url = 'https://item.taobao.com/item.htm?spm=a1z09.2.0.0.610f2e8dpwfXSo&id=566043568956&_u=r175hrfe39f';
})();
</script>
