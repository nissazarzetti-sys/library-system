
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Library System')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fff7fa;
            color: #333;
        }

        header {
            background-color: #f5c6d8;
            padding: 22px 40px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        header h1 {
            margin: 0 0 20px;
            color: #783b55;
            font-size: 28px;
        }

        nav {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
        }

        nav a {
            color: #783b55;
            text-decoration: none;
            font-weight: bold;
            font-size: 15px;
        }

        nav a:hover {
            color: #c04779;
        }

        main {
            max-width: 1200px;
            min-height: 350px;
            margin: 35px auto;
            padding: 0 25px;
        }

        .page-heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .page-heading h2 {
            color: #783b55;
            font-size: 26px;
        }

        .page-heading p {
            color: #777;
            font-size: 15px;
        }

        .btn {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #218838;
        }

        .table-container {
            background: white;
            border-radius: 10px;
            overflow-x: auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #f7dce7;
            color: #654052;
            padding: 14px;
        }

        td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        tbody tr:hover {
            background-color: #fff7fa;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        footer {
            background-color: #f5c6d8;
            color: #783b55;
            text-align: center;
            padding: 18px;
            margin-top: 40px;
        }

        footer p {
            margin: 0;
        }

        @media (max-width: 600px) {
            header {
                padding: 20px;
            }

            main {
                padding: 0 15px;
            }

            nav {
                gap: 15px;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Library System</h1>

        <nav>
            <a href="{{ url('/dashboard') }}">Dashboard</a>
            <a href="{{ route('books.index') }}">Books</a>
            <a href="{{ url('/categories') }}">Categories</a>
            <a href="{{ url('/members') }}">Members</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Library System &copy; {{ date('Y') }}</p>
    </footer>
</body>
</html>
