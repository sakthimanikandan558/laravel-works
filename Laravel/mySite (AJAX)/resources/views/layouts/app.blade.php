<!DOCTYPE html>
<html>
<head>
    <title>My Laravel Website(AJAX)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        header {
            background-color: #4CAF50;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        nav {
            background-color: #8BC34A;
            color: #fff;
            padding: 15px;
            text-align: center;
        }
        nav a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
            font-weight: bold;
        }
        .container {
            display: flex;
            padding: 20px;
            height: 70vh;
            text-align: center;


        }
        footer {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            text-align: center;
            margin-top: 20px;
        }
        .sidebar {
            width: 200px;
            background-color: #c8e6c9;
            padding: 15px;
            height: 70vh;
        }
        .sidebar a {
            display: block;
            color: #333;
            margin: 10px 0;
            text-decoration: none;
        }
        .main-content{
            margin-left: 660px;
            padding-top: 250px;
        }
    </style>
</head>
<body>
    @include('layouts.includes.header')
    <div class="container">
        @include('layouts.includes.sidebar')
        <main class="main-content">
            @include('home')
        </main>
    </div>
    @include('layouts.includes.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle navigation link clicks
        $('.nav-link,.sidebar-link').on('click', function(event) {
            event.preventDefault();
            var route = $(this).attr('href');
            // var homeroute = $(this).data('route').split('8001/')[1];
            // console.log(homeroute);

            // Make AJAX request to the route
            if(true){
                $.ajax({
                url: route,
                type: 'GET',
                success: function(data) {
                    // Update the main content with the returned HTML
                    $('.main-content').html(data);
                },
                error: function(xhr) {
                    console.error("An error occurred: " + xhr.status + " " + xhr.statusText);
                }
            });
            }

        });
    });
</script>

</body>
</html>