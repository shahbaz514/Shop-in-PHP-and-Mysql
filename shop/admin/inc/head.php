<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo ucfirst($_SESSION['username']); ?> | NYXIE</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <!-- Light Gallery Plugin Css -->
    <link href="plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!--<script>
        window.onload = function() {
            var el = document.documentElement,
                rfs = el.requestFullScreen
                    || el.webkitRequestFullScreen
                    || el.mozRequestFullScreen;
            rfs.call(el);
        };
        document.onkeydown = function (e) {
            e = e || window.event;//Get event

            if (!e.ctrlKey) return;

            var code = e.which || e.keyCode;//Get key code

            switch (code) {
                case 83://Block Ctrl+S
                case 87://Block Ctrl+W -- Not work in Chrome and new Firefox
                    e.preventDefault();
                    e.stopPropagation();
                    break;
            }
        };
    </script>-->

    <!--<style>
        body
        {
            -webkit-user-select:none;
            -ms-user-select:none;
            user-select:none
        }
    </style>
    oncontextmenu="return false;"
    -->

</head>
<body class="theme-black">