<!DOCTYPE html>
<html>

<head>
    <title>Ringkasan Profesi</title>
</head>

<body>
    <h1>Ringkasan Profesi</h1>
    <button onclick="homePage()">Home</button>

    <table border="1" style="text-align: center">
        <tr>
            <th>Profesi</th>
            <th>Total</th>
        </tr>
        @foreach ($ringkasanProfesi as $item)
            <tr>
                <td>{{ $item->profesi['profesi'] }}</td>
                <td>{{ $item->total }}</td>
            </tr>
        @endforeach
    </table>
    <script>
        function homePage() {
            window.location.href = "{{ route('home') }}";
        }
    </script>
</body>

</html>
