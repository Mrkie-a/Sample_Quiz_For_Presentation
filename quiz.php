<?php
session_start();

// Store user info in session
session_start();
$_SESSION['name'] = $_POST['name'];
$_SESSION['course'] = $_POST['course'];

// Define questions and answers
$questions = [
    1 => [
        'question' => 'The Internet started in which decade?',
        'options' => ['1950s', '1960s', '1970s', '1980s'],
        'correct' => '1960s'
    ],
    2 => [
        'question' => 'The Internet was originally developed for:',
        'options' => ['Online shopping', 'Entertainment', 'Government researchers to share information', 'Social networking'],
        'correct' => 'Government researchers to share information'
    ],
    3 => [
        'question' => 'Which event pushed the U.S. to develop better communication systems?',
        'options' => ['World War II', 'Launch of Sputnik satellite', 'Moon landing', 'Personal computers'],
        'correct' => 'Launch of Sputnik satellite'
    ],
    4 => [
        'question' => 'What network eventually evolved into the Internet?',
        'options' => ['TELNET', 'ARPANET', 'Ethernet', 'Intranet'],
        'correct' => 'ARPANET'
    ],
    5 => [
        'question' => 'What is considered the official birthday of the Internet?',
        'options' => ['January 1, 1975', 'January 1, 1983', 'December 31, 1990', 'March 15, 1985'],
        'correct' => 'January 1, 1983'
    ],
    6 => [
        'question' => 'What protocol allowed computers from different networks to communicate?',
        'options' => ['HTTP', 'FTP', 'TCP/IP', 'SMTP'],
        'correct' => 'TCP/IP'
    ],
    7 => [
        'question' => 'FTP stands for:',
        'options' => ['File Transfer Protocol', 'Fast Transfer Program', 'File Tracking Process', 'File Text Protocol'],
        'correct' => 'File Transfer Protocol'
    ],
    8 => [
        'question' => 'FTP is mainly used for:',
        'options' => ['Sending emails', 'Downloading and uploading files', 'Chatting online', 'Creating websites'],
        'correct' => 'Downloading and uploading files'
    ],
    9 => [
        'question' => 'Which protocol allows users to connect to a remote computer program?',
        'options' => ['Telnet', 'Gopher', 'HTTP', 'SMTP'],
        'correct' => 'Telnet'
    ],
    10 => [
        'question' => 'Which protocol allows real-time communication between users?',
        'options' => ['Email', 'IRC (Internet Relay Chat)', 'FTP', 'Gopher'],
        'correct' => 'IRC (Internet Relay Chat)'
    ],
    11 => [
        'question' => 'Email communication is considered:',
        'options' => ['Synchronous', 'Asynchronous', 'Instant', 'Offline'],
        'correct' => 'Asynchronous'
    ],
    12 => [
        'question' => 'Usenet is similar to:',
        'options' => ['A search engine', 'A bulletin board system', 'A file server', 'A website builder'],
        'correct' => 'A bulletin board system'
    ],
    13 => [
        'question' => 'The World Wide Web was developed in the:',
        'options' => ['1960s', '1970s', 'Late 1980s', 'Early 2000s'],
        'correct' => 'Late 1980s'
    ],
    14 => [
        'question' => 'What does HTTP stand for?',
        'options' => ['Hyper Transfer Text Protocol', 'HyperText Transfer Protocol', 'High Transfer Text Protocol', 'Host Transfer Text Program'],
        'correct' => 'HyperText Transfer Protocol'
    ],
    15 => [
        'question' => 'HTML stands for:',
        'options' => ['Hyper Tool Machine Language', 'HyperText Markup Language', 'High Text Machine Language', 'Home Tool Markup Language'],
        'correct' => 'HyperText Markup Language'
    ],
    16 => [
        'question' => 'A browser is used to:',
        'options' => ['Create programs', 'Send email', 'View web pages on the Internet', 'Build hardware'],
        'correct' => 'View web pages on the Internet'
    ],
    17 => [
        'question' => 'What does URL stand for?',
        'options' => ['Universal Retrieval Link', 'Uniform Resource Locator', 'User Resource Link', 'Universal Reference Locator'],
        'correct' => 'Uniform Resource Locator'
    ],
    18 => [
        'question' => 'A search engine works by collecting information using programs called:',
        'options' => ['Crawlers or spiders', 'Indexers', 'Robots only', 'Servers'],
        'correct' => 'Crawlers or spiders'
    ],
    19 => [
        'question' => 'Which domain suffix is used for educational institutions?',
        'options' => ['.com', '.edu', '.gov', '.net'],
        'correct' => '.edu'
    ],
    20 => [
        'question' => 'Which domain suffix is used by government websites?',
        'options' => ['.org', '.gov', '.edu', '.net'],
        'correct' => '.gov'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History of the Internet Quiz</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="script.js" defer></script>
    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            align-items: flex-start;
            padding: 40px 16px;
            box-sizing: border-box;
        }

        .quiz-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            box-shadow: 0 25px 50px rgba(0,0,0,0.4);
        }

        .quiz-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .quiz-header h2 {
            color: #fff;
            font-size: 1.2rem;
            margin: 0;
        }

        .quiz-header h2 span {
            color: rgba(255,255,255,0.5);
            font-size: 0.85rem;
            font-weight: 400;
            display: block;
        }

        #timer {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(233,69,96,0.15);
            border: 1px solid rgba(233,69,96,0.4);
            color: #e94560;
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            white-space: nowrap;
        }

        .question-block {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px;
            padding: 20px 24px;
            margin-bottom: 16px;
        }

        .question-block h3 {
            color: #ffffff;
            font-size: 0.95rem;
            margin: 0 0 14px;
            line-height: 1.5;
        }

        .question-block label {
            display: flex;
            align-items: center;
            gap: 10px;
            color: rgba(255,255,255,0.75);
            font-size: 0.9rem;
            padding: 9px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.2s;
            margin: 4px 0;
        }

        .question-block label:hover {
            background: rgba(255,255,255,0.07);
            color: #fff;
        }

        .question-block input[type="radio"] {
            accent-color: #e94560;
            width: 16px;
            height: 16px;
            flex-shrink: 0;
            margin: 0;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #e94560, #c0392b);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            letter-spacing: 0.5px;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 6px 20px rgba(233,69,96,0.4);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(233,69,96,0.55);
        }
    </style>
</head>
<body>
    <div class="quiz-card">
        <div class="quiz-header">
            <h2>History of the Internet <span>Multiple Choice &mdash; 20 Questions</span></h2>
            <div id="timer"><i class="fa-solid fa-clock"></i> <span id="timer-text">04:00</span></div>
        </div>
        <form id="quizForm" action="submit.php" method="POST">
            <?php foreach ($questions as $num => $q): ?>
                <div class="question-block">
                    <h3><?php echo $num . '. ' . htmlspecialchars($q['question']); ?></h3>
                    <?php foreach ($q['options'] as $option): ?>
                        <label>
                            <input type="radio" name="q<?php echo $num; ?>" value="<?php echo htmlspecialchars($option); ?>" required>
                            <?php echo htmlspecialchars($option); ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn-submit"><i class="fa-solid fa-paper-plane"></i> Submit Quiz</button>
        </form>
    </div>
</body>
</html>