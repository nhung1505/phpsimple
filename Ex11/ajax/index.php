<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery UI Autocomplete - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</head>
<body>
<div class="container">
    <!-- Page Content goes here -->


    <div class="card">
        <div class="row">
            <div class="col s12">
                <div class="card grey darken-3">
                    <div class="card-content white-text">
                        <div class="card-title">
                            <h1> Search with auto suggestion </h1>
                        </div>
                        <div class="row">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s6 offset-s3">
                                        <input placeholder="Enter username" id="username" type="text" class="validate">
                                        <label for="username">Search Username</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn waves-effect waves-light" id="button">Get all username</button>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="col s12" id="list-all"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#username").autocomplete({
            source: 'source.php'
        });

        $('#button').click(function () {
            $.ajax({
                type: 'GET',
                url: 'getall.php'
            }).success(function (data) {
                    data = JSON.parse(data);
                    console.log(typeof data, data);
                    var html = '';
                    data.forEach(function (elem) {
                        html += '<div class="chip">' + elem + '</div>';
                    });
                    $('#list-all').append(html);

                }
            );
        });
    });
</script>
</body>
</html>