<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 50px 40px;
            width: 90%;
            max-width: 460px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
            text-align: center;
        }

        .quiz-icon {
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, #e94560, #0f3460);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 30px;
            color: white;
            box-shadow: 0 8px 20px rgba(233, 69, 96, 0.4);
        }

        .login-card h2 {
            color: #ffffff;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 0 6px;
            line-height: 1.4;
        }

        .login-card p.subtitle {
            color: rgba(255,255,255,0.5);
            font-size: 0.875rem;
            margin: 0 0 30px;
        }

        .input-group {
            position: relative;
            margin-bottom: 18px;
            text-align: left;
        }

        .input-group i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.4);
            font-size: 15px;
        }

        .input-group input[type="text"] {
            width: 100%;
            padding: 13px 14px 13px 42px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 10px;
            color: #ffffff;
            font-size: 0.95rem;
            box-sizing: border-box;
            transition: border-color 0.3s, background 0.3s;
            margin: 0;
        }

        .input-group input[type="text"]::placeholder {
            color: rgba(255,255,255,0.35);
        }

        .input-group input[type="text"]:focus {
            outline: none;
            border-color: #e94560;
            background: rgba(255,255,255,0.12);
        }

        .input-group select {
            width: 100%;
            padding: 13px 14px 13px 42px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 10px;
            color: #ffffff;
            font-size: 0.95rem;
            box-sizing: border-box;
            appearance: none;
            cursor: pointer;
            transition: border-color 0.3s, background 0.3s;
        }

        .input-group select option {
            background: #16213e;
            color: #ffffff;
        }

        .input-group select:focus {
            outline: none;
            border-color: #e94560;
            background: rgba(255,255,255,0.12);
        }

        .select-arrow {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.4);
            font-size: 13px;
            pointer-events: none;
        }

        .btn-start {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #e94560, #c0392b);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
            letter-spacing: 0.5px;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 6px 20px rgba(233, 69, 96, 0.4);
        }

        .btn-start:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(233, 69, 96, 0.55);
            background: linear-gradient(135deg, #e94560, #c0392b);
        }

        .btn-start i {
            margin-left: 8px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="quiz-icon"><i class="fa-solid fa-brain"></i></div>
        <h2>History of the Internet</h2>
        <p class="subtitle">Multiple Choice Quiz &mdash; Test your knowledge!</p>
        <form action="quiz.php" method="POST">
            <div class="input-group">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="name" placeholder="Enter Your Name" required>
            </div>
            <div class="input-group">
                <i class="fa-solid fa-graduation-cap"></i>
                <select name="course" required>
                    <option value="" disabled selected>Select Your Course</option>
                    <option value="TOURISM">TOURISM</option>
                    <option value="BSCS">BSCS</option>
                </select>
                <i class="fa-solid fa-chevron-down select-arrow"></i>
            </div>
            <button type="submit" class="btn-start">Start Quiz <i class="fa-solid fa-arrow-right"></i></button>
        </form>
    </div>
</body>
</html>