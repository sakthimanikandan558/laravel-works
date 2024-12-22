<!-- resources/views/userlist.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">User List</h2>
    <div id="user-list">
        @include('partials.userlist', ['pages' => $pages])
    </div>
</div>
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).on('click', '.pagination a', function(event) {
        console.log( document.querySelector('.pagination a'));
        var url = $(this).attr('href');
        event.preventDefault();
        // console.log(JSON.stringify(url));

        fetch_data(url);
    });

    function fetch_data(url) {
        $.ajax({
            url: url,
            success: function(data) {
                console.log(JSON.stringify(data));
                $('#user-list').html(data);
            }
        });
    }
</script>
</body>
</html>