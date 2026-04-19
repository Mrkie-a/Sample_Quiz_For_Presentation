<?php
// Show all errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once 'db.php'; // db.php should define $conn as mysqli connection

// Check if session data exists
$name = $_SESSION['name'] ?? '';
$course = $_SESSION['course'] ?? '';

if (empty($name) || empty($course)) {
    die("Session expired. Please start over.");
}

// Questions and correct answers
$questions = [
    1 => ['correct' => '1960s'],
    2 => ['correct' => 'Government researchers to share information'],
    3 => ['correct' => 'Launch of Sputnik satellite'],
    4 => ['correct' => 'ARPANET'],
    5 => ['correct' => 'January 1, 1983'],
    6 => ['correct' => 'TCP/IP'],
    7 => ['correct' => 'File Transfer Protocol'],
    8 => ['correct' => 'Downloading and uploading files'],
    9 => ['correct' => 'Telnet'],
    10 => ['correct' => 'IRC (Internet Relay Chat)'],
    11 => ['correct' => 'Asynchronous'],
    12 => ['correct' => 'A bulletin board system'],
    13 => ['correct' => 'Late 1980s'],
    14 => ['correct' => 'HyperText Transfer Protocol'],
    15 => ['correct' => 'HyperText Markup Language'],
    16 => ['correct' => 'View web pages on the Internet'],
    17 => ['correct' => 'Uniform Resource Locator'],
    18 => ['correct' => 'Crawlers or spiders'],
    19 => ['correct' => '.edu'],
    20 => ['correct' => '.gov']
];

// Calculate score
$score = 0;
foreach ($questions as $num => $q) {
    $answer = $_POST["q$num"] ?? '';
    if ($answer === $q['correct']) {
        $score++;
    }
}

// Insert result into database with time_submitted
$stmt = $conn->prepare("INSERT INTO results (name, course, score, time_submitted) VALUES (?, ?, ?, NOW())");

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ssi", $name, $course, $score);

if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

// ✅ Close statement safely
$stmt->close();

// ✅ Close database connection safely
$conn->close();

// ✅ Destroy session after submission
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Submitted</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
        }
        .result-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            padding: 50px 40px;
            width: 90%;
            max-width: 460px;
            margin: 0 auto;
            box-shadow: 0 25px 50px rgba(0,0,0,0.4);
            text-align: center;
        }
        .result-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #e94560, #0f3460);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 34px;
            color: white;
            box-shadow: 0 8px 20px rgba(233,69,96,0.4);
        }
        .result-card h2 { color: #ffffff; font-size: 1.6rem; font-weight: 700; margin: 0 0 8px; }
        .result-card p.subtitle { color: rgba(255,255,255,0.5); font-size: 0.9rem; margin: 0 0 30px; }
        .score-box {
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 28px;
        }
        .score-box .score-number {
            font-size: 3.5rem;
            font-weight: 800;
            color: #e94560;
            line-height: 1;
        }
        .score-box .score-label { color: rgba(255,255,255,0.5); font-size: 0.85rem; margin-top: 6px; }
        .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 32px;
            background: linear-gradient(135deg, #e94560, #c0392b);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 6px 20px rgba(233,69,96,0.4);
        }
        .btn-home:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(233,69,96,0.55); }
    </style>
</head>
<body>
    <div class="result-card">
        <div class="result-icon"><i class="fa-solid fa-trophy"></i></div>
        <h2>Quiz Submitted!</h2>
        <p class="subtitle">Thank you for taking the quiz.</p>
        <div class="score-box">
            <div class="score-number"><?php echo $score; ?><span style="font-size:1.5rem;color:rgba(255,255,255,0.4)">/20</span></div>
            <div class="score-label">Your Final Score</div>
        </div>
    </div>
</body>
</html>