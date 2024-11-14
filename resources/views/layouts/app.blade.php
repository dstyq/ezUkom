<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>

    <link href="{{ asset('bootstrap-5.3.3/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body {
            font-family:  sans-serif;
            background-color: #f2f4e1; 
            color: #4a4a4a;
            margin: 0;
            padding: 0;
            background-image: url("{{ asset('foto/white.jpg') }}");
            background-size: cover; 
            background-position: center;
        }

        .container {
            max-width: 1200px;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        h1 {
            font-size: 3rem;
            color: #6b8e23;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
            text-transform: capitalize;
            font-family: 'Poppins', sans-serif;
            background-image: linear-gradient(135deg, #8fc9a9, #6b8e23);
            background-clip: text;
            color: transparent;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);
        }

        .card {
            border: none;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1); 
            border-radius: 15px;
            margin-bottom: 30px;
            background-color: #fff;
            overflow: hidden;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; 
        }

        .card:hover {
            transform: scale(1.05); 
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2); 
        }

        .card-header {
            background-color: #a8d08d;
            color: #fff;
            padding: 20px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .card-body {
            padding: 25px;
            font-size: 1.1rem;
            color: #555;
        }

        .btn-primary {
            background-color: #6b8e23;
            border-color: #6b8e23;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 25px; 
            transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease; /* Menambahkan transisi shadow */
        }

        .btn-primary:hover {
            background-color: #8fc9a9; 
            border-color: #8fc9a9;
            transform: scale(1.05); 
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15); 
        }

        .table th, .table td {
            vertical-align: middle;
            font-weight: 500;
            font-size: 1.1rem;
            text-align: center;
        }

        .table {
            border: 1px solid #d8d8d8;
            border-radius: 15px;
            background-color: #fff;
        }

        .table td img {
            max-width: 50px;
            border-radius: 15px;
        }
    </style>
</head>
<body>

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>