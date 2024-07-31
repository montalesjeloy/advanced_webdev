<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <style>
    #panorama {
        width: 100%;
        height: 750px;
    }
    </style>
</head>
<body>

<div id="panorama"></div>
<script>
pannellum.viewer('panorama', {   
    "default": {
        "firstScene": "circle",
        "author": "Juan Dela Cruz",
        "sceneFadeDuration": 1000,
	"preview": "museum.jpeg"
    },

    "scenes": {
        "circle": {
            "title": "National Museum",
            "hfov": 510,
            "pitch": -3,
            "yaw": 187,
            "type": "equirectangular",
            "panorama": "museum.jpeg",
            "hotSpots": [
                {
                    "pitch": -2.1,
                    "yaw": 132.9,
                    "type": "scene",
                    "text": "Entrance",
                    "sceneId": "house"
                }
            ]
        },

        "house": {
            "title": "Spring House or Dairy",
            "hfov": 110,
            "yaw": 5,
            "type": "equirectangular",
            "panorama": "/images/bma-0.jpg",
            "hotSpots": [
                {
                    "pitch": -0.6,
                    "yaw": 37.1,
                    "type": "scene",
                    "text": "Mason Circle",
                    "sceneId": "circle",
                    "targetYaw": -23,
                    "targetPitch": 2
                }
            ]
        },
	"house": {
            "title": "Painting",
            "hfov": 10,
            "yaw": 5,
            "type": "equirectangular",
            "panorama": "fish.jpeg",
            "hotSpots": [
                {
                    "pitch": -0.6,
                    "yaw": 37.1,
                    "type": "scene",
                    "text": "National Museum Entrance",
                    "sceneId": "circle",
                    "targetYaw": -23,
                    "targetPitch": 2
                }
            ]
        }

    }
});
</script>

</body>
</html>