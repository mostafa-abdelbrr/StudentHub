<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>User Verified</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/modals/">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="css/modals.css" rel="stylesheet">
</head>
<body>
<div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h2 class="fw-bold mb-0">Verification Notification</h2>
            </div>

            <div class="modal-body p-5 pt-0">
                <p class="mb-0">
                    Hi {{$user->name}},
                    A new internship which you qualify for has been recently added.
                </p>
                <p>
                    Internship details:
                </p>
                    Job name:<br>
                {{$internship->name}}<br>
                Company name:<br>
                {{$internship->company_name}}<br>
                Description:<br>
                {{$internship->description}}<br>
                Expiration date:<br>
                {{$internship->expires_at}}<br>
                Required faculty:<br>
                {{$internship->required_faculty}}<br>
                Required Department:<br>
                {{$internship->required_department}}<br>
                Required Minimum Level (0-5):<br>
                {{$internship->minimum_level}}<br>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
