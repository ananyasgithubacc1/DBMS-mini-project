<?php
/**
 * Database Setup Script
 * Run this script to initialize the database with schema and sample data
 */

require_once 'config/database.php';

echo "<h2>Restaurant Management System - Database Setup</h2>";

// Test database connection
echo "<h3>1. Testing Database Connection...</h3>";
if (testDBConnection()) {
    echo "✅ Database connection successful!<br>";
} else {
    echo "❌ Database connection failed. Please check your configuration in config/database.php<br>";
    exit;
}

// Initialize database
echo "<h3>2. Initializing Database Schema...</h3>";
if (initializeDatabase()) {
    echo "✅ Database schema created successfully!<br>";
} else {
    echo "❌ Failed to create database schema.<br>";
    exit;
}

// Insert sample data
echo "<h3>3. Loading Sample Data...</h3>";
try {
    $pdo = getDBConnection();
    
    // Read and execute sample data file
    $sample_data_file = __DIR__ . '/database/init_sample_data.sql';
    if (file_exists($sample_data_file)) {
        $sql = file_get_contents($sample_data_file);
        $statements = explode(';', $sql);
        
        $success_count = 0;
        $total_statements = 0;
        
        foreach ($statements as $statement) {
            $statement = trim($statement);
            if (!empty($statement) && !preg_match('/^--/', $statement)) {
                $total_statements++;
                try {
                    $pdo->exec($statement);
                    $success_count++;
                } catch (PDOException $e) {
                    // Skip errors for duplicate entries (sample data might already exist)
                    if (strpos($e->getMessage(), 'Duplicate entry') === false) {
                        echo "⚠️ Warning: " . $e->getMessage() . "<br>";
                    }
                }
            }
        }
        
        echo "✅ Sample data loaded successfully! ($success_count/$total_statements statements executed)<br>";
    } else {
        echo "⚠️ Sample data file not found. Skipping sample data insertion.<br>";
    }
    
} catch (Exception $e) {
    echo "❌ Error loading sample data: " . $e->getMessage() . "<br>";
}

// Verify tables were created
echo "<h3>4. Verifying Database Tables...</h3>";
try {
    $pdo = getDBConnection();
    $tables = ['reservations', 'contact_messages', 'newsletter_subscriptions', 'menu_categories', 'menu_items', 'chefs', 'testimonials', 'events', 'restaurant_info'];
    
    foreach ($tables as $table) {
        $stmt = $pdo->query("SHOW TABLES LIKE '$table'");
        if ($stmt->rowCount() > 0) {
            echo "✅ Table '$table' exists<br>";
        } else {
            echo "❌ Table '$table' not found<br>";
        }
    }
    
} catch (Exception $e) {
    echo "❌ Error verifying tables: " . $e->getMessage() . "<br>";
}

// Display database statistics
echo "<h3>5. Database Statistics...</h3>";
try {
    $pdo = getDBConnection();
    
    $stats = [
        'reservations' => 'SELECT COUNT(*) as count FROM reservations',
        'contact_messages' => 'SELECT COUNT(*) as count FROM contact_messages',
        'newsletter_subscriptions' => 'SELECT COUNT(*) as count FROM newsletter_subscriptions WHERE status = "active"',
        'menu_items' => 'SELECT COUNT(*) as count FROM menu_items',
        'chefs' => 'SELECT COUNT(*) as count FROM chefs',
        'testimonials' => 'SELECT COUNT(*) as count FROM testimonials'
    ];
    
    foreach ($stats as $table => $query) {
        $stmt = $pdo->query($query);
        $result = $stmt->fetch();
        echo "📊 $table: " . $result['count'] . " records<br>";
    }
    
} catch (Exception $e) {
    echo "❌ Error getting statistics: " . $e->getMessage() . "<br>";
}

echo "<h3>6. Setup Complete! 🎉</h3>";
echo "<p>Your restaurant management database is now ready to use.</p>";
echo "<p><strong>Next steps:</strong></p>";
echo "<ul>";
echo "<li>Test the forms on your website</li>";
echo "<li>Check the database tables in phpMyAdmin or your preferred MySQL client</li>";
echo "<li>Customize the sample data as needed</li>";
echo "<li>Set up email notifications (optional)</li>";
echo "</ul>";

echo "<h3>7. Database Configuration</h3>";
echo "<p>Current database settings:</p>";
echo "<ul>";
echo "<li><strong>Host:</strong> " . DB_HOST . "</li>";
echo "<li><strong>Database:</strong> " . DB_NAME . "</li>";
echo "<li><strong>User:</strong> " . DB_USER . "</li>";
echo "<li><strong>Charset:</strong> " . DB_CHARSET . "</li>";
echo "</ul>";

echo "<p><strong>Note:</strong> Make sure to update the database credentials in config/database.php if needed.</p>";
?>
