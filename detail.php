<?php
//手機版頁面
include("include/cart.php");
$cart=new cart();
$weight=200;
if (isset($_GET['id'])) {
	$id=$_GET['id'];	
	$sql="SELECT * FROM `nutri` WHERE `id`='$id'";
	$temp=$cart->rundata($sql);
	//print_r($temp);
}
?>
<?php include("header1.php"); ?>	
<script>
 	$(document).ready(function() {
 		$("#btn").click(function(event) {
 			console.log("OK");
 			var id=$("#id").val();
 			var weight=$("#weight").val();
 			//console.log("id:"+id);
 			//console.log("weight:"+weight);
 		 	$.ajax({
 		 		url: 'ajax.php',
 		 		type: 'POST',
 		 		dataType:'json',
 		 		data: {
 		 			op:"weight",
 		 			id:id,
 		 			weight:weight
 		 		},success:function(rt){
 		 			console.log(rt);
 		 			for(var idx_Key in rt[0]){
 		 				$("#"+ idx_Key).html(rt[0][idx_Key]);//idx_key=n_...
 		 			}
 		 				$("#w").html(weight+"g");
 		 		}

 		 	});
 		
 		 	
 		});

 	});
</script>
<style>
	/* 現代化表格樣式 */
	.table {
		background-color: #fff;
		border-radius: 8px;
		overflow: hidden;
		box-shadow: 0 2px 10px rgba(0,0,0,0.1);
		margin-top: 20px;
	}
	
	.table th {
		text-align: left;
		background: linear-gradient(135deg, #4a90e2, #357abd);
		color: #fff;
		font-weight: 600;
		padding: 12px 16px;
		border: none;
	}

	.table td {
		padding: 12px 16px;
		border-bottom: 1px solid #e9ecef;
		vertical-align: middle;
	}

	.table tr:nth-child(odd) {
		background-color: #f8f9fa;
	}

	.table tr:nth-child(even) {
		background-color: #fff;
	}

	.table-hover tr:hover td {
		background-color: #e3f2fd;
		transition: background-color 0.2s ease;
	}

	/* 控制區域樣式 */
	.control-area {
		background: #fff;
		border-radius: 12px;
		padding: 20px;
		box-shadow: 0 4px 20px rgba(0,0,0,0.08);
		margin-bottom: 20px;
		border: 1px solid #e3f2fd;
	}

	/* 現代化按鈕樣式 */
	.btn-modern {
		background: linear-gradient(135deg, #4a90e2, #357abd);
		border: none;
		border-radius: 6px;
		color: #fff;
		padding: 10px 20px;
		margin: 5px;
		font-weight: 500;
		transition: all 0.2s ease;
		cursor: pointer;
	}

	.btn-modern:hover {
		background: linear-gradient(135deg, #357abd, #2968a3);
		transform: translateY(-1px);
		box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
	}

	.btn-back {
		background: linear-gradient(135deg, #6c757d, #545862);
	}

	.btn-back:hover {
		background: linear-gradient(135deg, #545862, #383d41);
		box-shadow: 0 4px 12px rgba(108, 117, 125, 0.3);
	}

	/* 輸入元素樣式 */
	.form-control-modern {
		border-radius: 6px;
		border: 2px solid #e9ecef;
		padding: 10px 15px;
		transition: border-color 0.2s ease;
		width: 120px;
		display: inline-block;
	}

	.form-control-modern:focus {
		border-color: #4a90e2;
		box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
		outline: none;
	}

	/* 重量輸入區域 */
	.weight-input-area {
		background: linear-gradient(135deg, #f8f9fa, #e9ecef);
		border-radius: 8px;
		padding: 15px;
		margin-bottom: 20px;
		border: 1px solid #dee2e6;
	}

	.weight-label {
		font-weight: 600;
		color: #495057;
		margin-right: 10px;
	}

	/* 響應式設計 */
	@media (max-width: 768px) {
		.control-area {
			padding: 15px;
			margin: 10px 0;
		}
		
		.btn-modern {
			width: 100%;
			margin: 5px 0;
		}
		
		.table th, .table td {
			padding: 8px;
			font-size: 14px;
		}
		
		.form-control-modern {
			width: 100%;
			margin: 5px 0;
		}
	}
</style>
<?php include("header2.php"); ?>

<div class="control-area">
	<button class="btn-modern btn-back" onclick="window.history.back();">← 返回上一頁</button>
	
	<div class="weight-input-area">
		<span class="weight-label">請輸入重量：</span>
		<input type="text" id="weight" value="<?php echo $weight; ?>" class="form-control-modern" placeholder="重量(g)">
		<button class="btn-modern" id="btn">🔄 重新計算</button>
		<input type="hidden" id="id" value="<?php echo $id; ?>">
		<p class="text-muted mt-2 mb-0" style="font-size: 0.9em;">*本資料庫所列數值單位均為每100g可食部分之含量</p>
	</div>
</div>

<table class="table table-hover">
<?php
if (isset($_GET['id'])) {
	$sql="SELECT * FROM `fileds`";
	$tempfiled=$cart->rundata($sql);
	for ($i=0; $i <sizeof($tempfiled) ; $i++) { 
		echo "<tr>";
		echo "<td>".$tempfiled[$i]['filedName']."</td>";
		$Spanstr="";
		if ($tempfiled[$i]['id']<=4) $Spanstr="colspan='2'";	
		$alignstr=""; 
		if ($tempfiled[$i]['id']>=5) $alignstr="text-align:right;";
		echo "<td $Spanstr style='width:120px;$alignstr'>".$temp[0][$tempfiled[$i]['filed']]."</td>";
		if ($tempfiled[$i]['id']>=5) {
			if ($tempfiled[$i]['id']==86) {
				$arr=explode("/",$temp[0][$tempfiled[$i]['filed']]);
				echo "<td style='text-align:right;' id=".$tempfiled[$i]['filed'].">";
				for ($j=0; $j <sizeof($arr) ; $j++) { 
					echo $weight/100*$arr[$j];
					if ($j<sizeof($arr)-1) echo "/"; 
				}
                echo "</td>";
			
			}else{
				echo "<td style='width:120px;$alignstr' id=".$tempfiled[$i]['filed'].">".($weight/100*$temp[0][$tempfiled[$i]['filed']])."</td>";
			}
		}
		echo "</tr>";
		if ($tempfiled[$i]['id']==4) {
			echo "<tr><td></td><td>100g</td><td id='w'>".$weight."g</td></tr>";
		}

	}	
}
?>
</table>	
<?php include("footer.php"); ?>