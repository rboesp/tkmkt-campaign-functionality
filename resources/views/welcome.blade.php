<!DOCTYPE html>
<html>

<head>
    <script src="https://unpkg.com/konva@8.3.12/konva.min.js"></script>
    <script src='https://code.jquery.com/jquery-3.6.1.min.js' integrity='sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' integrity='sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N' crossorigin='anonymous'>


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

{{-- <template id="ad-preview">
    <slot class="class='m-5" name='my-text'></slot>
</template> --}}

<body style="overflow-y: scroll">
    <div>
        Cars
        <div id="ad_container" class="d-flex flex-wrap border">
        </div>
    </div>

    

    {{-- <div>
        <h5>Height: 380</h5>
        <h5>Width: 380</h5>
        <div class='m-5' id=${childID}>
        </div>
    </div> --}}

    <script>    
        var templates = {!! json_encode($templates, JSON_HEX_TAG) !!}
        var inventory_data = {!! json_encode($inventory_data, JSON_HEX_TAG) !!};
        console.log(inventory_data);
        console.log(templates);
    </script>

</body>

</html>

<script src="/js/script.js"></script>