<!DOCTYPE html>
<html lang="en">
<head>
    <title>Photographers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Photographers</h2>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Location</th>
            <th>Profile Link</th>
            <th>Total Likes</th>
        </tr>
        </thead>
        <tbody>
        @foreach($photographers as $photographer)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $photographer->pId }}</td>
            <td>{{ $photographer->name }}</td>
            <td>{{ $photographer->username }}</td>
            <td>{{ $photographer->location ?? 'No location info' }}</td>
            <td>
                <a href="{{ $photographer->profile_link }}"
                   target="_blank">
                    {{ $photographer->profile_link }}
                </a>
            </td>
            <td>{{ $photographer->likes }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
