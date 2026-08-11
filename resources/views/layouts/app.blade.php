<!DOCTYPE html>
<html lang="en" x-data="{ 
    theme: localStorage.getItem('datalens_theme') || 'system',
    init() {
        this.$watch('theme', val => {
            localStorage.setItem('datalens_theme', val);
            this.applyTheme();
        });
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            if(this.theme === 'system') this.applyTheme();
        });
        this.applyTheme();
    },
    applyTheme() {
        if (this.theme === 'dark' || (this.theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }
}" @set-theme.window="theme = $event.detail">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataLens - Database Management Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/theme/monokai.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/sql/sql.min.js"></script>
    <style>
        .CodeMirror { height: 100%; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; }
    </style>
    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100 font-sans antialiased h-screen overflow-hidden">
    {{ $slot }}
    @livewireScripts
</body>
</html>
