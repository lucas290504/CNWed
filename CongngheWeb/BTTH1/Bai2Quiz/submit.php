<?php
// Lấy đáp án đúng từ file
$filename = 'Quiz.txt';
$correctAnswers = [];

if (file_exists($filename)) {
    $content = file_get_contents($filename);
    $lines = explode("\n", $content);

    foreach ($lines as $line) {
        if (strpos($line, 'Đáp án:') === 0) {
            $correctAnswers[] = trim(str_replace('Đáp án:', '', $line));
        }
    }
}

// Kiểm tra kết quả
$userAnswers = $_POST;
$score = 0;

foreach ($userAnswers as $key => $answer) {
    $index = str_replace('question_', '', $key);
    if (isset($correctAnswers[$index]) && $correctAnswers[$index] === $answer) {
        $score++;
    }
}

echo "Bạn đã trả lời đúng $score/" . count($correctAnswers) . " câu hỏi.";
?>
