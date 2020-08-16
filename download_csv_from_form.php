<?php
include 'include.php';
if ($_POST['pita']!=='hummus') exit;
$opt = $_POST;
$result = $db->query("SELECT * FROM data");
$array = [];

while ($row = $result->fetchArray(SQLITE3_ASSOC))
{
	$out = [];
	$settings = jsonDe($row['settings']);
	if ($opt['settings_timing'])
		$out['settings_timing'] = "מיסוך-לפני=".$settings['load_time']." מילה=".$settings['word_time']." מיסוך-אחרי=".$settings['mask_time']."אפשרות-דילוג=".$settings['skip_time']."";
	if ($opt['settings_words'])
		$out['settings_words'] = implode(' ',$settings['words']);
	if ($opt['settings_words_practice'])
		$out['settings_words_practice'] = implode(' ',$settings['words_practice']);
	if ($opt['row_id'])
		$out['id'] = $row['id'];
	if ($opt['created'])
		$out['date'] = date('c', $row['created']);
	if ($opt['meta'])
		$out += [
			'age' => $row['age'],
			'sex' => $row['sex'],
			'school_years' => $row['school_years'],
			'native_lang' => $row['native_lang'],
			'hebrew_level' => $row['hebrew_level'],
		];

	$summary = [
		'total' => 0,
		'correct' => 0,
		'wrong' => 0,
		'skip' => 0,
	];


	$count = 0;
	// go over answers	
	$answers = [];
	if ($opt['practice'])
		$answers = jsonDe($row['practice']);
	if ($opt['actual'])
		$answers = array_merge($answers, jsonDe($row['answers']));
	foreach ($answers as $answer)
	{
		$count++;
		if ($answer['key'] === '0')
			$answer['fidelity']	= 'skip';
		if ($answer['key'] === '1')
			$answer['fidelity']	= $answer['type'] === 'real' ? 'correct' : 'wrong';
		if ($answer['key'] === '3')
			$answer['fidelity']	= $answer['type'] === 'fake' ? 'correct' : 'wrong';


		if (($answer['couple'] === 'first' && $opt['filter-first']) ||
			($answer['couple'] === 'second' && $opt['filter-second']) ||
			($answer['type'] === 'real' && $opt['filter-real']) ||
			($answer['type'] === 'fake' && $opt['filter-fake']))
		{
			// filter applied
			$summary['total']++;
			$summary[$answer['fidelity']]++;

			if ($opt['answer-count'])
				$out["number$count"] = $answer['count'];
			if ($opt['answer-key'])
				$out["key$count"] = $answer['key'];
			if ($opt['answer-fidelity'])
				$out["fidelity$count"] = $answer['fidelity'];
			if ($opt['answer-time'])
				$out["time$count"] = $answer['time'];
			if ($opt['answer-type'])
				$out["type$count"] = $answer['type'];
			if ($opt['answer-couple'])
				$out["couple$count"] = $answer['couple'];
			if ($opt['answer-text'])
				$out["text$count"] = $answer['text'];
			if ($opt['answer-is_practice'])
				$out["is_practice$count"] = $answer['is_practice'] ? 'practice' : 'actual';
		}
	}

	if ($opt['summary'])
		$out += [
			'summary_total' => $summary['total'],
			'summary_correct' => $summary['correct'],
			'summary_wrong' => $summary['wrong'],
			'summary_skip' => $summary['skip'],
		];

	$array[]=$out;
}

array_to_csv_download($array,'table_of_data.csv',",");
