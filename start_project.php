<?php
/**
 * Project Launcher
 * Quick start script for the Restaurant Management System
 */

// Set content type to HTML
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Management System - Launcher</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            padding: 40px;
            max-width: 800px;
            width: 90%;
            text-align: center;
        }
        
        .logo {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 2.5rem;
        }
        
        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 1.2rem;
        }
        
        .status-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        
        .status-item {
            padding: 20px;
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
        }
        
        .status-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .status-item.success {
            border-color: #4CAF50;
            background: #f1f8e9;
        }
        
        .status-item.error {
            border-color: #f44336;
            background: #ffebee;
        }
        
        .status-item.warning {
            border-color: #ff9800;
            background: #fff3e0;
        }
        
        .status-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .status-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .status-text {
            font-size: 0.9rem;
            color: #666;
        }
        
        .action-buttons {
            margin-top: 30px;
        }
        
        .btn {
            display: inline-block;
            padding: 15px 30px;
            margin: 10px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }
        
        .btn:hover {
            background: #5a6fd8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .btn.secondary {
            background: #6c757d;
        }
        
        .btn.secondary:hover {
            background: #5a6268;
        }
        
        .btn.success {
            background: #28a745;
        }
        
        .btn.success:hover {
            background: #218838;
        }
        
        .instructions {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: left;
        }
        
        .instructions h3 {
            color: #333;
            margin-bottom: 15px;
        }
        
        .instructions ol {
            padding-left: 20px;
        }
        
        .instructions li {
            margin: 10px 0;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">🍽️</div>
        <h1>Restaurant Management System</h1>
        <p class="subtitle">Your complete restaurant website with database backend</p>
        
        <?php
        // Check system status
        $assets_ok = is_dir('assets') && file_exists('assets/css/main.css');
        $config_ok = file_exists('config/database.php');
        $forms_ok = file_exists('forms/book-a-table.php') && file_exists('forms/contact.php') && file_exists('forms/newsletter.php');
        $database_ok = false;
        
        // Test database connection
        if ($config_ok) {
            try {
                require_once 'config/database.php';
                $database_ok = testDBConnection();
            } catch (Exception $e) {
                $database_ok = false;
            }
        }
        ?>
        
        <div class="status-grid">
            <div class="status-item <?php echo $assets_ok ? 'success' : 'error'; ?>">
                <div class="status-icon"><?php echo $assets_ok ? '✅' : '❌'; ?></div>
                <div class="status-title">Assets</div>
                <div class="status-text"><?php echo $assets_ok ? 'CSS & JS files ready' : 'Missing assets folder'; ?></div>
            </div>
            
            <div class="status-item <?php echo $config_ok ? 'success' : 'error'; ?>">
                <div class="status-icon"><?php echo $config_ok ? '✅' : '❌'; ?></div>
                <div class="status-title">Configuration</div>
                <div class="status-text"><?php echo $config_ok ? 'Database config ready' : 'Config file missing'; ?></div>
            </div>
            
            <div class="status-item <?php echo $forms_ok ? 'success' : 'error'; ?>">
                <div class="status-icon"><?php echo $forms_ok ? '✅' : '❌'; ?></div>
                <div class="status-title">Forms</div>
                <div class="status-text"><?php echo $forms_ok ? 'Form handlers ready' : 'Form files missing'; ?></div>
            </div>
            
            <div class="status-item <?php echo $database_ok ? 'success' : 'warning'; ?>">
                <div class="status-icon"><?php echo $database_ok ? '✅' : '⚠️'; ?></div>
                <div class="status-title">Database</div>
                <div class="status-text"><?php echo $database_ok ? 'Connected successfully' : 'Not connected'; ?></div>
            </div>
        </div>
        
        <div class="instructions">
            <h3>🚀 Quick Start Instructions</h3>
            <ol>
                <li><strong>Start Web Server:</strong> Make sure Apache and MySQL are running (XAMPP/WAMP/MAMP)</li>
                <li><strong>Setup Database:</strong> Click "Setup Database" below to create tables and sample data</li>
                <li><strong>View Website:</strong> Click "Open Website" to see your restaurant site</li>
                <li><strong>Test Forms:</strong> Try the reservation, contact, and newsletter forms</li>
            </ol>
        </div>
        
        <div class="action-buttons">
            <a href="index.html" class="btn success">🏠 Open Website</a>
            <a href="setup_database.php" class="btn">🗄️ Setup Database</a>
            <a href="test_setup.php" class="btn secondary">🔍 Test Setup</a>
            <a href="run_project.md" class="btn secondary">📖 Full Guide</a>
        </div>
        
        <?php if (!$database_ok): ?>
        <div style="margin-top: 20px; padding: 15px; background: #fff3cd; border: 1px solid #ffeaa7; border-radius: 10px;">
            <strong>⚠️ Database Not Connected</strong><br>
            Make sure MySQL is running and click "Setup Database" to initialize.
        </div>
        <?php endif; ?>
        
        <div style="margin-top: 30px; color: #666; font-size: 0.9rem;">
            <p><strong>Project Features:</strong> Restaurant Website • Reservation System • Contact Forms • Newsletter • Database Backend</p>
            <p><strong>Technologies:</strong> HTML5 • CSS3 • JavaScript • PHP • MySQL • Bootstrap</p>
        </div>
    </div>
</body>
</html>
