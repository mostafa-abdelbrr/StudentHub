{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <title>Registration</title>--}}

{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"--}}
{{--          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"--}}
{{--            integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"--}}
{{--            crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"--}}
{{--            integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"--}}
{{--            crossorigin="anonymous"></script>--}}


{{--    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">--}}

{{--    <style>--}}
{{--        .bd-placeholder-img {--}}
{{--            font-size: 1.125rem;--}}
{{--            text-anchor: middle;--}}
{{--            -webkit-user-select: none;--}}
{{--            -moz-user-select: none;--}}
{{--            user-select: none;--}}
{{--        }--}}

{{--        @media (min-width: 768px) {--}}
{{--            .bd-placeholder-img-lg {--}}
{{--                font-size: 3.5rem;--}}
{{--            }--}}
{{--        }--}}

{{--        .b-example-divider {--}}
{{--            height: 3rem;--}}
{{--            background-color: rgba(0, 0, 0, .1);--}}
{{--            border: solid rgba(0, 0, 0, .15);--}}
{{--            border-width: 1px 0;--}}
{{--            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);--}}
{{--        }--}}

{{--        .b-example-vr {--}}
{{--            flex-shrink: 0;--}}
{{--            width: 1.5rem;--}}
{{--            height: 100vh;--}}
{{--        }--}}

{{--        .bi {--}}
{{--            vertical-align: -.125em;--}}
{{--            fill: currentColor;--}}
{{--        }--}}

{{--        .nav-scroller {--}}
{{--            position: relative;--}}
{{--            z-index: 2;--}}
{{--            height: 2.75rem;--}}
{{--            overflow-y: hidden;--}}
{{--        }--}}

{{--        .nav-scroller .nav {--}}
{{--            display: flex;--}}
{{--            flex-wrap: nowrap;--}}
{{--            padding-bottom: 1rem;--}}
{{--            margin-top: -1px;--}}
{{--            overflow-x: auto;--}}
{{--            text-align: center;--}}
{{--            white-space: nowrap;--}}
{{--            -webkit-overflow-scrolling: touch;--}}
{{--        }--}}

{{--        html,--}}
{{--        body {--}}
{{--            height: 100%;--}}
{{--        }--}}

{{--        body {--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            padding-top: 40px;--}}
{{--            padding-bottom: 40px;--}}
{{--            background-color: #f5f5f5;--}}
{{--        }--}}

{{--        .form-signin {--}}
{{--            max-width: 330px;--}}
{{--            padding: 15px;--}}
{{--        }--}}

{{--        .form-signin .form-floating:focus-within {--}}
{{--            z-index: 2;--}}
{{--        }--}}

{{--        .form-signin input[type="email"] {--}}
{{--            margin-bottom: -1px;--}}
{{--            border-bottom-right-radius: 0;--}}
{{--            border-bottom-left-radius: 0;--}}
{{--        }--}}

{{--        .form-signin input[type="password"] {--}}
{{--            margin-bottom: 10px;--}}
{{--            border-top-left-radius: 0;--}}
{{--            border-top-right-radius: 0;--}}
{{--        }--}}

{{--    </style>--}}
{{--</head>--}}
{{--<body class="text-center">--}}

{{--<main class="form-signin w-100 m-auto">--}}
    <form method="post" action="{{route('user.store')}}">
        @csrf
        {{--        <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">--}}
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
        <div class="form-floating">
            <input type="text" class="form-control" name="name" placeholder="John Doe">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="faculty">
            <label for="floatingInput">Faculty Name</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="faculty_department">
            <label for="floatingInput">Department</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="current_year">
            <label for="floatingInput">Current Level (0-5)</label>
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
{{--</main>--}}

{{--</body>--}}
{{--</html>--}}
