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

<body>
    <div id="ad_container">
    </div>

    <!-- <button id="download">
        download
    </button> -->

    <script>
        const template = {
            "attrs": {
                "width": 380,
                "height": 380,
                "scaleX": 0.35185185185185186,
                "scaleY": 0.35185185185185186
            },
            "className": "Stage",
            "children": [
                {
                    "attrs": {},
                    "className": "Layer",
                    "children": [
                        {
                            "attrs": {
                                "width": 1080,
                                "height": 1080,
                                "listening": false,
                                "image_type": "background"
                            },
                            "className": "Image"
                        },
                        {
                            "attrs": {
                                "width": 1080,
                                "height": 1080,
                                "listening": false,
                                "image_type": "background"
                            },
                            "className": "Image"
                        }
                    ]
                },
                {
                    "attrs": {},
                    "className": "Layer",
                    "children": [
                        {
                            "attrs": {
                                "x": 583.4645669291342,
                                "y": 46.85039370078741,
                                "width": 200,
                                "height": 50,
                                "strokeWidth": 60,
                                "draggable": true,
                                "image_type": "logo",
                                "scaleX": 2.1622047244094516,
                                "scaleY": 5.025196850393697
                            },
                            "className": "Image"
                        },
                        {
                            "attrs": {
                                x: 0,
                                y: 380,
                                text: 'example text',
                                fontSize: 100,
                                fontFamily: 'Calibri',
                                fill: 'WHITE',
                            },
                            "className": "Text"
                        },
                        {
                            "attrs": {
                                "fill": "rgba(0,0,255,0.5)",
                                "visible": false
                            },
                            "className": "Rect"
                        }
                    ]
                },
                {
                    "attrs": {},
                    "className": "Layer",
                    "children": [
                        {
                            "attrs": {
                                "x": 50,
                                "y": 50,
                                "width": 200,
                                "height": 200,
                                "strokeWidth": 10,
                                "draggable": true
                            },
                            "className": "Image"
                        }
                    ]
                },
                {
                    "attrs": {},
                    "className": "Layer",
                    "children": [
                        {
                            "attrs": {
                                "x": 50,
                                "y": 350,
                                "width": 400,
                                "height": 237,
                                "strokeWidth": 10,
                                "draggable": true
                            },
                            "className": "Image"
                        }
                    ]
                },
                {
                    "attrs": {},
                    "className": "Layer",
                    "children": []
                },
                {
                    "attrs": {},
                    "className": "Layer",
                    "children": [
                        {
                            "attrs": {
                                "x": 44.01574803149604,
                                "y": 89.3700787401575,
                                "draggable": true
                            },
                            "className": "Image"
                        }
                    ]
                },
                {
                    "attrs": {},
                    "className": "Layer",
                    "children": [
                        {
                            "attrs": {
                                "x": 10,
                                "y": 50,
                                "draggable": true
                            },
                            "className": "Image"
                        }
                    ]
                }
            ]
        }
    </script>

</body>

</html>

<script src="/js/script.js"></script>