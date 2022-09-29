<!DOCTYPE html>
<html>

<head>
    <script src="https://unpkg.com/konva@8.3.12/konva.min.js"></script>

    <meta charset="utf-8" />
    <title>Konva Simple Load Demo</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #f0f0f0;
        }
    </style>

    @vite('resources/js/app.js')
</head>

<body style="overflow-y: scroll">
    <div id="ad_container" >
    </div>

    <!-- <button id="download">
        download
    </button> -->

    <script>    
        var templates = {!! json_encode($templates, JSON_HEX_TAG) !!}
        var inventory_data = {!! json_encode($inventory_data, JSON_HEX_TAG) !!};
        console.log(inventory_data);
        console.log(templates);
    </script>

</body>

</html>

<script src="/js/script.js"></script>