<?php include("include/cart.php") ?>
<?php include("include/header1.php") ?>
<?php include("include/header2.php") ?>

<style>
	/* 計算器頁面樣式 */
	.calculator-container {
		max-width: 800px;
		margin: 0 auto;
		padding: 20px;
	}
	
	.calc-section {
		background: linear-gradient(135deg, #fff, #f8f9fa);
		border-radius: 15px;
		padding: 30px;
		margin-bottom: 25px;
		box-shadow: 0 4px 20px rgba(0,0,0,0.08);
		border: 1px solid #e9ecef;
	}
	
	.calc-title {
		color: #2c3e50;
		font-weight: 600;
		margin-bottom: 25px;
		text-align: center;
		font-size: 1.8rem;
	}
	
	.calc-subtitle {
		color: #2c3e50;
		font-weight: 600;
		margin-bottom: 20px;
		text-align: center;
		font-size: 1.5rem;
	}
	
	.input-group-modern {
		margin-bottom: 20px;
	}
	
	.input-label {
		display: block;
		margin-bottom: 8px;
		color: #495057;
		font-weight: 500;
		font-size: 14px;
	}
	
	.input-modern {
		width: 100%;
		border: 2px solid #e9ecef;
		border-radius: 8px;
		padding: 12px 15px;
		font-size: 16px;
		transition: all 0.3s ease;
		background: #fff;
	}
	
	.input-modern:focus {
		border-color: #4a90e2;
		box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
		outline: none;
	}
	
	.select-modern {
		width: 100%;
		border: 2px solid #e9ecef;
		border-radius: 8px;
		padding: 12px 15px;
		font-size: 16px;
		transition: all 0.3s ease;
		background: #fff;
		cursor: pointer;
	}
	
	.select-modern:focus {
		border-color: #4a90e2;
		box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
		outline: none;
	}
	
	.btn-calc {
		background: linear-gradient(135deg, #4a90e2, #357abd);
		border: none;
		border-radius: 8px;
		color: #fff;
		padding: 12px 30px;
		font-size: 16px;
		font-weight: 500;
		cursor: pointer;
		transition: all 0.3s ease;
		width: 100%;
		margin-top: 15px;
	}
	
	.btn-calc:hover {
		background: linear-gradient(135deg, #357abd, #2968a3);
		transform: translateY(-2px);
		box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
	}
	
	.result-display {
		background: linear-gradient(135deg, #28a745, #20c997);
		color: #fff;
		padding: 20px;
		border-radius: 10px;
		margin-top: 20px;
		text-align: center;
		font-size: 1.2rem;
		font-weight: 600;
		box-shadow: 0 4px 15px rgba(40, 167, 69, 0.2);
	}
	
	.input-row {
		display: grid;
		grid-template-columns: 1fr 1fr;
		gap: 15px;
	}
	
	/* 響應式設計 */
	@media (max-width: 768px) {
		.calculator-container {
			padding: 10px;
		}
		
		.calc-section {
			padding: 20px;
		}
		
		.input-row {
			grid-template-columns: 1fr;
		}
		
		.calc-title {
			font-size: 1.5rem;
		}
		
		.calc-subtitle {
			font-size: 1.3rem;
		}
	}
</style>

<div class="calculator-container">
	<div class="calc-section">
		<h1 class="calc-title">🧮 BMI 身體質量指數計算</h1>
		<form action="" method="get" name="form1">
			<div class="input-row">
				<div class="input-group-modern">
					<label class="input-label" for="height_input">📏 身高 (公分)</label>
					<input type="number" class="input-modern" id="height_input" placeholder="請輸入身高 (cm)" name="cm" required="required" value="<?php echo $_GET['cm'] ?>">
				</div>
				<div class="input-group-modern">
					<label class="input-label" for="weight_input">⚖️ 體重 (公斤)</label>
					<input type="number" class="input-modern" id="weight_input" placeholder="請輸入體重 (kg)" name="kg" required="required" value="<?php echo $_GET['kg'] ?>">
				</div>
			</div>
			<button type="button" class="btn-calc" onclick="form1.submit();">🧮 計算 BMI</button>
			
			<?php
			if (isset($_GET['cm'])) {
				$cm = $_GET['cm'];
				$kg = $_GET['kg'];
				$BMI = round(($kg / ($cm * $cm)) * 10000, 1);
				
				$bmi_status = "";
				if ($BMI < 18.5) {
					$bmi_status = "體重過輕";
				} elseif ($BMI < 24) {
					$bmi_status = "正常範圍";
				} elseif ($BMI < 27) {
					$bmi_status = "過重";
				} elseif ($BMI < 30) {
					$bmi_status = "輕度肥胖";
				} elseif ($BMI < 35) {
					$bmi_status = "中度肥胖";
				} else {
					$bmi_status = "重度肥胖";
				}
				
				echo '<div class="result-display">📊 您的 BMI 為 ' . $BMI . '<br>健康狀態：' . $bmi_status . '</div>';
			}
			?>
		</form>
	</div>

	<div class="calc-section">
		<h2 class="calc-subtitle">🔥 TDEE 每日總消耗熱量 & BMR 基礎代謝計算</h2>
		<form action="" method="get" name="form2">
			<div class="input-row">
				<div class="input-group-modern">
					<label class="input-label" for="age_input">🎂 年齡</label>
					<input type="number" class="input-modern" id="age_input" placeholder="請輸入年齡" name="age" required="required" value="<?php echo $_GET['age']; ?>">
				</div>
				<div class="input-group-modern">
					<label class="input-label" for="height_input2">📏 身高 (公分)</label>
					<input type="number" class="input-modern" id="height_input2" placeholder="請輸入身高 (cm)" name="height" required="required" value="<?php echo $_GET['height']; ?>">
				</div>
			</div>
			
			<div class="input-row">
				<div class="input-group-modern">
					<label class="input-label" for="weight_input2">⚖️ 體重 (公斤)</label>
					<input type="number" class="input-modern" id="weight_input2" placeholder="請輸入體重 (kg)" name="weight" required="required" value="<?php echo $_GET['weight']; ?>">
				</div>
				<div class="input-group-modern">
					<label class="input-label" for="sex_select">👤 性別</label>
					<select class="select-modern" id="sex_select" name="sex">
						<option value="">請選擇性別</option>
						<?php
						$sexarray = array("male" => "👨 男性", "female" => "👩 女性");
						foreach ($sexarray as $key => $value) {
							$selectstr = "";
							if ($key == $_GET['sex']) $selectstr = "selected";
							echo "<option value='$key' $selectstr>$value</option>";
						}
						?>
					</select>
				</div>
			</div>

			<div class="input-group-modern">
				<label class="input-label" for="activity_select">🏃 日常活動等級</label>
				<select class="select-modern" id="activity_select" name="act">
					<option value="">請選擇活動等級</option>
					<?php
					$actarr = array(
						1 => "😴 久坐不動 (辦公室工作，很少運動)", 
						2 => "🚶 輕度活動 (一週運動1~3天)", 
						3 => "🏃 中度活動 (一週運動3~5天)", 
						4 => "💪 高度活動 (一週運動6~7天)", 
						5 => "🔥 超高活動 (每天高強度運動)"
					);
					foreach ($actarr as $key => $value) {
						$selectstr = "";
						if ($key == $_GET['act']) $selectstr = "selected";
						echo "<option value='$key' $selectstr>$value</option>";
					}
					?>
				</select>
			</div>
			
			<button type="button" class="btn-calc" onclick="form2.submit();">🔥 計算 TDEE & BMR</button>
			
			<?php
			if (isset($_GET['sex']) && isset($_GET['age']) && isset($_GET['height']) && isset($_GET['weight']) && isset($_GET['act'])) {
				$age = $_GET['age'];
				$cm = $_GET['height'];
				$kg = $_GET['weight'];
				$selectOp = $_GET['act'];
				
				// 計算 BMR
				if ($_GET['sex'] == 'female') {
					$BMR = round((655 + (9.6 * $kg) + (1.8 * $cm) - (4.7 * $age)), 1);
				} else if ($_GET['sex'] == 'male') {
					$BMR = round((66 + (13.7 * $kg) + (5 * $cm) - (6.8 * $age)), 1);
				}
				
				// 計算 TDEE
				$multiplier = array(
					"1" => 1.2,
					"2" => 1.375,
					"3" => 1.55,
					"4" => 1.725,
					"5" => 1.9
				);
				
				$TDEE = round($BMR * $multiplier[$selectOp], 1);
				
				echo '<div class="result-display">';
				echo '🔥 您的基礎代謝率 (BMR)：' . $BMR . ' 大卡/天<br>';
				echo '💪 您的每日總消耗熱量 (TDEE)：' . $TDEE . ' 大卡/天<br>';
				echo '<small style="font-size: 0.9rem; opacity: 0.9;">建議減重時攝取 ' . round($TDEE * 0.8, 0) . '-' . round($TDEE * 0.9, 0) . ' 大卡/天</small>';
				echo '</div>';
			}
			?>
		</form>
	</div>
</div>
<?php include("include/footer.php") ?>