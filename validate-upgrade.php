#!/usr/bin/env php
<?php

/**
 * Laravel 5.6 to 12 Upgrade Validation Script
 * 
 * This script validates that all the upgrade components are properly structured
 * and can be loaded without dependencies.
 */

echo "🚀 Laravel 5.6 to 12 Upgrade Validation\n";
echo "=====================================\n\n";

$baseDir = __DIR__;
$errors = [];
$checks = 0;

function validateFile($path, $description) {
    global $errors, $checks, $baseDir;
    $checks++;
    
    $fullPath = $baseDir . '/' . $path;
    
    if (!file_exists($fullPath)) {
        $errors[] = "❌ $description: File not found at $path";
        return false;
    }
    
    // Check syntax
    $output = [];
    $returnCode = 0;
    exec("php -l '$fullPath' 2>&1", $output, $returnCode);
    
    if ($returnCode !== 0) {
        $errors[] = "❌ $description: Syntax error in $path";
        return false;
    }
    
    echo "✅ $description\n";
    return true;
}

function validateNamespace($file, $expectedNamespace) {
    global $errors, $checks, $baseDir;
    $checks++;
    
    $content = file_get_contents($baseDir . '/' . $file);
    if (strpos($content, "namespace $expectedNamespace") === false) {
        $errors[] = "❌ $file: Expected namespace '$expectedNamespace' not found";
        return false;
    }
    
    echo "✅ Namespace validation: $file has correct namespace\n";
    return true;
}

echo "1. Core File Structure Validation\n";
echo "──────────────────────────────────\n";

// Validate core files
validateFile('composer.json', 'Composer configuration');
validateFile('app/Models/Student.php', 'Student model');
validateFile('app/Models/User.php', 'User model');
validateFile('app/Http/Controllers/StudentController.php', 'Student controller');
validateFile('app/Http/Controllers/HomeController.php', 'Home controller');
validateFile('app/Http/Kernel.php', 'HTTP Kernel');
validateFile('routes/web.php', 'Web routes');
validateFile('routes/api.php', 'API routes');

echo "\n2. Middleware Validation\n";
echo "────────────────────────\n";

validateFile('app/Http/Middleware/Authenticate.php', 'Authenticate middleware');
validateFile('app/Http/Middleware/PreventRequestsDuringMaintenance.php', 'Maintenance middleware');
validateFile('app/Http/Middleware/ValidateSignature.php', 'Signature validation middleware');
validateFile('app/Http/Middleware/RedirectIfAuthenticated.php', 'Guest middleware');
validateFile('app/Http/Middleware/TrustProxies.php', 'Proxy middleware');

echo "\n3. Service Provider Validation\n";
echo "──────────────────────────────\n";

validateFile('app/Providers/RouteServiceProvider.php', 'Route service provider');

echo "\n4. Migration Validation\n";
echo "───────────────────────\n";

validateFile('database/migrations/2014_10_12_000000_create_users_table.php', 'Users migration');
validateFile('database/migrations/2014_10_12_100000_create_password_resets_table.php', 'Password resets migration');
validateFile('database/migrations/2018_03_16_040651_create_students_table.php', 'Students migration');

echo "\n5. Namespace Validation\n";
echo "───────────────────────\n";

validateNamespace('app/Models/Student.php', 'App\Models');
validateNamespace('app/Models/User.php', 'App\Models');
validateNamespace('app/Http/Controllers/StudentController.php', 'App\Http\Controllers');

echo "\n6. Composer Configuration Validation\n";
echo "────────────────────────────────────\n";

$composerContent = file_get_contents($baseDir . '/composer.json');
$composer = json_decode($composerContent, true);

if ($composer['require']['php'] === '^8.3') {
    echo "✅ PHP version requirement: ^8.3\n";
} else {
    $errors[] = "❌ PHP version requirement not set to ^8.3";
}

if (strpos($composer['require']['laravel/framework'], '^12.0') !== false) {
    echo "✅ Laravel framework version: ^12.0\n";
} else {
    $errors[] = "❌ Laravel framework version not set to ^12.0";
}

if (isset($composer['autoload']['psr-4']['App\\']) && $composer['autoload']['psr-4']['App\\'] === 'app/') {
    echo "✅ PSR-4 autoloading for App namespace\n";
} else {
    $errors[] = "❌ PSR-4 autoloading for App namespace not properly configured";
}

echo "\n7. Route Structure Validation\n";
echo "─────────────────────────────\n";

$routesContent = file_get_contents($baseDir . '/routes/web.php');

if (strpos($routesContent, '[HomeController::class, \'index\']') !== false) {
    echo "✅ Routes use class-based controller references\n";
} else {
    $errors[] = "❌ Routes still use string-based controller references";
}

if (strpos($routesContent, 'use App\Http\Controllers\StudentController') !== false) {
    echo "✅ Controller imports present in routes\n";
} else {
    $errors[] = "❌ Controller imports missing in routes";
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "VALIDATION SUMMARY\n";
echo str_repeat("=", 50) . "\n";

echo "Total checks performed: $checks\n";

if (empty($errors)) {
    echo "🎉 All validations passed! Laravel 12 upgrade is complete.\n";
    echo "\nThe application is ready for:\n";
    echo "- Dependency installation (composer install)\n";
    echo "- Environment configuration\n";
    echo "- Database setup and migration\n";
    echo "- Functional testing\n";
    exit(0);
} else {
    echo "❌ " . count($errors) . " validation errors found:\n\n";
    foreach ($errors as $error) {
        echo "$error\n";
    }
    echo "\nPlease fix these issues before proceeding.\n";
    exit(1);
}