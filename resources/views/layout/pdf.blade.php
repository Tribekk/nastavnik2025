<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Профтрекер. Отчет.</title>

    <style>
        @font-face {
            font-family: "Roboto";
            src: local("Roboto Regular"), url({{ storage_path("fonts/Roboto-Regular.ttf") }}) format("truetype");
            font-weight: normal;
            font-style: normal;

        }

        @font-face {
            font-family: "Roboto";
            src: local("Roboto Bold"), url({{ storage_path("fonts/Roboto-Bold.ttf") }}) format("truetype");
            font-weight: bold;
            font-style: normal;

        }

        body {
            background: #fff;
            color: #1b1b1b;
            font-family: "roboto";
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        * {
            box-sizing: border-box;
        }

        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
            margin-top: 0;
            margin-bottom: 4px;
            font-weight: bold;
            line-height: 1.2;
        }

        .text-primary {
            color: #C1121C;
        }

        .font-size-lg {
            font-size: 18rem;
        }

        .font-size-h1 {
            font-size: 32px;
        }

        .font-size-h2 {
            font-size: 21px;
        }

        .font-size-h3 {
            font-size: 20px;
        }

        .font-size-h4 {
            font-size: 18px;
        }

        .font-size-h5 {
            font-size: 16px;
        }

        .font-size-h6 {
            font-size: 12px;
        }

        .mb-2 {
            margin-bottom: 4px;
        }

        .mb-4 {
            margin-bottom: 10px;
        }

        .mt-5 {
            margin-top: 14px;
        }

        .mb-48,
        .my-48 {
            margin-bottom: 152px;
        }

        .mt-48,
        .my-48 {
            margin-top: 152px;
        }

        .mt-8, .my-8 {
            margin-top: 32px;
        }

        .mr-5, .mx-5 {
            margin-right: 20px;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .font-weight-normal {
            font-weight: normal;
        }

        table {
            width: 100%;
        }

        table, table tr, table td {
            border: 0;
            padding: 0;
            margin: 0;
        }

        table td {
            vertical-align: top;
        }

        .screen {
            position: relative;
            page-break-after: always;
            width: 100%;
        }

        .screen > .content {
            padding: 0 25px;
            margin: 20px 0 0 0;
            width: 100%;
        }

        .end-screen {
            page-break-after: unset!important;
        }

        .d-block {
            display: block;
        }

        .pill {
            font-weight: bold;
            text-align: center;
            padding: 0 25px;
            border-radius: 30px;
            width: auto;
            height: 60px;
            margin-top: 20px;
            margin-bottom: 30px;
            line-height: 35px;
        }

        .pill__blue {
            background: #385E9D;
            color: #fff;
        }

        .text-blue {
            color: #385E9D;
        }

        .bg-blue {
            background: #385E9D!important;
        }

        .rounded-pill {
            border-radius: 20px;
        }

        .pill__orange {
            background: #FFC72C;
            color: #fff;
        }

        .bg-orange {
            background: #FFC72C!important;
        }

        .text-orange {
            color: #FFC72C;
        }

        .pill__alla {
            background: #912F46;
            color: #fff;
        }

        .text-alla {
            color: #912F46;
        }

        .bg-alla {
            background: #912F46!important;
        }

        .text-green {
            color: #20ae40;
        }

        .text-dark-50 {
            color: #7E8299;
        }

        .p-0 {
            padding: 0;
        }

        .m-0 {
            margin: 0;
        }

        .bg-transparent {
            background: transparent!important;
        }

        .bg-gray {
            background: #dedede !important;
        }

        .progress__bg-line {
            height: 2px!important;
            top: 10px !important;
            left: 0;
            border-radius: 0!important;
            background-color: #0c0909!important;
            z-index: 1!important;
            position: absolute;
        }

        .progress {
            display: block;
            height: 18px;
            font-size: 16px;
            background: #EBEDF3;
            border-radius: 0;
            width: 100%;
            position: relative;
            z-index: 2;
            overflow: hidden;
        }

        .progress-bar {
            color: #ffffff;
            text-align: center;
            white-space: nowrap;
            background: #912F46;
            height: 18px;
            z-index: 2;
            border-radius: 8px;
            top: 0;
            left: 0;
            position: absolute;
        }

        hr {
            border: 1px solid #EBEDF3;
        }

        .table__header {
            background: #f9f9f9;
            border: 1px solid #ccc;
        }

        .table__header-cell {
            margin: 0;
            padding: 10px 12px;
            text-align: center;
            display: inline-block;
            vertical-align: top;
        }

        .table__row {
            border-bottom: 1px solid #ccc;
            border-left: 1px solid #ccc;
            border-right: 1px solid #ccc;
            position: relative;
        }

        .table__row-cell {
            margin: 0;
            padding: 10px 12px;
            text-align: left;
            display: inline-block;
            vertical-align: top;
        }

        .text-success {
            color: #1BC5BD;
        }
    </style>
</head>
<body id="kt_body" class="">@yield('content')</body></html>
