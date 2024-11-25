<?php
// Đọc nội dung từ file Quiz.txt
$filename = 'Quiz.txt';
$questions = [];

if (file_exists($filename)) {
    $content = file_get_contents($filename);
    $lines = explode("\n", $content);
    $question = [];

    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line)) {
            if (!empty($question)) {
                $questions[] = $question;
                $question = [];
            }
            continue;
        }

        if (strpos($line, 'Câu hỏi') === 0) {
            $question['question'] = $line;
        } elseif (strpos($line, 'Đáp án:') === 0) {
            $question['answer'] = trim(str_replace('Đáp án:', '', $line));
        } else {
            $question['options'][] = $line;
        }
    }
    if (!empty($question)) {
        $questions[] = $question;
    }
} else {
    echo "File Quiz.txt không tồn tại.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thi trắc nghiệm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<style>
    /* Đặt nền cho trang */
    body {
        background-color: #f7f9fc;
        font-family: 'Arial', sans-serif;
    }

    /* Định dạng tiêu đề */
    h1 {
        color: #333;
        font-size: 2.5rem;
        font-weight: bold;
    }

    /* Định dạng container */
    .container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    /* Định dạng các câu hỏi */
    .mb-4 {
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 15px;
        margin-bottom: 20px;
    }

    .mb-4:last-child {
        border-bottom: none;
    }

    /* Định dạng form-check (radio button) */
    .form-check-label {
        font-size: 1.1rem;
        color: #555;
    }

    .form-check-input {
        margin-right: 10px;
    }

    /* Định dạng nút */
    button {
        font-size: 1rem;
        font-weight: bold;
        padding: 10px 20px;
    }

    /* Hiệu ứng khi rê chuột vào nút */
    button:hover {
        background-color: #007bff;
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
</style>
<div class="container mt-5">
    <h1 class="text-center">Bài thi trắc nghiệm</h1>
    <form action="submit.php" method="POST" class="mt-4">
        <?php foreach ($questions as $index => $q): ?>
            <div class="mb-4">
                <p><strong><?= $q['question'] ?></strong></p>
                <?php foreach ($q['options'] as $option): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question_<?= $index ?>"
                               value="<?= $option ?>" id="q<?= $index ?>_<?= $option ?>" required>
                        <label class="form-check-label" for="q<?= $index ?>_<?= $option ?>">
                            <?= $option ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary">Nộp bài</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
