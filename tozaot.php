<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>export test results</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style>
		.form {
			margin:10px 20px;
		}
	</style>
</head>
<body>
	<form method="POST" class="form" action="download_csv_from_form.php" target="_blank">
		<h4>יש לסמן את השדות והפילטרים הרלוונטיים *</h4>
		<input type="hidden" name="pita" value="hummus">
		<h2>להציג הגדרות של:</h2>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="settings_timing">תזמונים</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="settings_words">רשימת מילים</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="settings_words_practice">רשימת מילים בתרגול</label></div>

		<h2>מידע על הנבדק:</h2>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="row_id">מספר סידורי</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="created">תאריך מענה על השאלון</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="meta">גיל רמת שפה וכל זה</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="summary">שורת סיכום לפי correct/wrong/skip</label></div>
		<br>
		
		<h3>תשובה:</h3>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="answer-key">על איזה מקש לחצו (1/3/0)</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="answer-count">מספר סידורי</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="answer-fidelity">צדק או לא (correct/wrong/skip)</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="answer-time">זמן שעבר מהחשיפה לתשובה (מילישניות)</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="answer-type">האם זה מילה (real/fake)</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="answer-couple">איפה המילה הנכונה בזוג (first/second)</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="answer-text">המילה שהוצגה על המסך</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="answer-is_practice">האם זה מילה משלב התרגול (practice/actual)</label></div>
		<br>
		
		<h3>פילטר:</h3>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="practice">שלב התרגול</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="actual">שלב ניסוי אמיתי</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="filter-first">זוגות שבהם המילה הראשונה נכונה</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="filter-second">זוגות שבהם המילה השניה נכונה</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="filter-real">מילים אמיתיות</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="filter-fake">מילים לא אמיתיות</label></div>
		<br>
		<div class="form-group">
			<input type="submit" class="button button-primary" value="DOWNLOAD">
		</div>
	</form>

</body>
<html>
