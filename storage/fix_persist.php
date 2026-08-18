<?php

$files = [
    'resources/views/admin/students/form.blade.php',
    'resources/views/admin/parents/form.blade.php',
    'resources/views/admin/mentor/form.blade.php',
    'resources/views/admin/packages/form.blade.php',
];

foreach ($files as $file) {
    if (!file_exists($file)) continue;
    $content = file_get_contents($file);
    
    // Replace $persist(X).as('Y') with just X
    // $persist(@js((string) old('name', $mentor->name ?? ''))).as('mentor_form_name_{{ $mentor->id ?? 'new' }}')
    // Regex: \$persist\((.*?)\)\.as\('[^']+'\)
    
    $count = 0;
    $newContent = preg_replace('/\$persist\((.*?)\)\.as\([^\)]+\)/', '$1', $content, -1, $count);
    
    if ($count > 0) {
        file_put_contents($file, $newContent);
        echo "Fixed $count instances in $file\n";
    }
}
echo "Done.\n";
