<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App Template</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 100;
            opacity: 0;
            pointer-events: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.3s;
            opacity: 1;
            pointer-events: auto;
        }
    </style>
    @livewireStyles
</head>

<body>
    @livewire('todo-component')
    @livewireScripts
</body>

</html>
