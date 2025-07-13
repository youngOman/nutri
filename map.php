<?php include("include/cart.php") ?>
<?php include("include/header1.php") ?>
<?php include("include/header2.php");
if (isset($_GET['gym_name'])) {
	$gym = $_GET['gym_name'];
	$sqlstr = "WHERE `gym_name`='$gym'"; //判斷get值跟sql的是否一樣
}
?>

<style>
	/* 健身地圖頁面樣式 */
	.gym-search-section {
		background: linear-gradient(135deg, #fff, #f8f9fa);
		border-radius: 15px;
		padding: 25px;
		margin-bottom: 25px;
		box-shadow: 0 4px 20px rgba(0,0,0,0.08);
		border: 1px solid #e9ecef;
	}
	
	.search-title {
		color: #2c3e50;
		font-weight: 600;
		margin-bottom: 20px;
		text-align: center;
	}
	
	.search-form {
		display: flex;
		flex-wrap: wrap;
		gap: 15px;
		align-items: center;
		justify-content: center;
	}
	
	.search-group {
		display: flex;
		align-items: center;
		gap: 8px;
	}
	
	.search-select, .search-input {
		border: 2px solid #e9ecef;
		border-radius: 8px;
		padding: 10px 15px;
		font-size: 14px;
		transition: all 0.3s ease;
		background: #fff;
	}
	
	.search-select:focus, .search-input:focus {
		border-color: #4a90e2;
		box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
		outline: none;
	}
	
	.search-btn {
		background: linear-gradient(135deg, #4a90e2, #357abd);
		border: none;
		border-radius: 8px;
		color: #fff;
		padding: 10px 20px;
		font-weight: 500;
		cursor: pointer;
		transition: all 0.3s ease;
	}
	
	.search-btn:hover {
		background: linear-gradient(135deg, #357abd, #2968a3);
		transform: translateY(-2px);
		box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
	}
	
	/* 表格樣式優化 */
	.gym-table-container {
		background: #fff;
		border-radius: 15px;
		overflow: hidden;
		box-shadow: 0 4px 20px rgba(0,0,0,0.08);
		border: 1px solid #e9ecef;
	}
	
	.table-modern {
		margin: 0;
		font-size: 14px;
	}
	
	.table-modern thead th {
		background: linear-gradient(135deg, #4a90e2, #357abd);
		color: #fff;
		font-weight: 600;
		padding: 15px 12px;
		border: none;
		text-align: center;
	}
	
	.table-modern tbody td {
		padding: 12px;
		vertical-align: middle;
		border-bottom: 1px solid #f8f9fa;
	}
	
	.table-modern tbody tr:hover {
		background: rgba(74, 144, 226, 0.05);
	}
	
	/* 響應式設計 */
	@media (max-width: 768px) {
		.search-form {
			flex-direction: column;
			align-items: stretch;
		}
		
		.search-group {
			flex-direction: column;
			align-items: stretch;
		}
		
		.search-select, .search-input {
			width: 100%;
		}
		
		.table-modern {
			font-size: 12px;
		}
		
		.table-modern thead th,
		.table-modern tbody td {
			padding: 8px 6px;
		}
	}
</style>

<div class="gym-search-section">
	<h2 class="search-title">🏋️ 健身地圖搜尋</h2>
	<form action="" method="get" class="search-form">
		<div class="search-group">
			<label for="gym_select">健身房：</label>
			<select name="gym_name" id="gym_select" class="search-select" onchange="submit();">
				<option value="all">全部</option>
				<?php
				$sql = "SELECT `gym_name` FROM `gym`";
				$temp = $cart->rundata($sql);
				foreach ($temp as $key => $value) {
					foreach ($value as $k => $v) {
						$selectstr = "";
						if ($gym == $v) {
							$selectstr = "selected";
						}
						echo "<option $selectstr>$v</option>";
					}
				}
				?>
			</select>
			<button type="submit" class="search-btn">查詢</button>
		</div>

		<div class="search-group">
			<label for="keyword_input">關鍵字：</label>
			<input type="text" name="fastp" id="keyword_input" class="search-input" placeholder="輸入關鍵字搜尋...">
			<button type="submit" class="search-btn">查詢</button>
		</div>
	</form>
</div>

<div class="gym-table-container">
	<table class="table table-hover table-modern">
		<thead>
			<tr>
				<th>🏋️ 健身房名稱</th>
				<th>📞 聯絡電話</th>
				<th>📍 地址</th>
				<th>🕒 營業時間</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT * FROM `gym` $sqlstr ORDER BY `id` ";
			$temp = $cart->rundata($sql);
			for ($i = 0; $i < sizeof($temp); $i++) {
				echo "<tr>";
				echo "<td><strong>" . $temp[$i]['gym_name'] . "</strong></td>";
				echo "<td>" . $temp[$i]['gym_tel'] . "</td>";
				echo "<td>" . $temp[$i]['gym_address'] . "</td>";
				echo "<td>" . $temp[$i]['opentime'] . "</td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
</div>
<?php include("include/footer.php") ?>