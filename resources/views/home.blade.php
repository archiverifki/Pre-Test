<!DOCTYPE html>
<html>

<head>
    <title>Rifki Kresmanto</title>
</head>

<body>
    <h1>Pre-Test</h1>
    <button onclick="refreshPage()">Akses endpoint</button>
    <button onclick="ringkasanPage()">Ringkasan Profesi</button>



    <table border="1" style="text-align: center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Jalan</th>
                <th>Email</th>
                <th>Profesi</th>
                <th>Md5</th>




            </tr>
        </thead>
        @foreach ($userData as $user)
            <tbody>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user['nama'] }}</td>
                <td>{{ $user->jenisKelamin['jenis_kelamin'] }}</td>
                <td>{{ $user['nama_jalan'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user->profesi['profesi'] }}</td>
                {{-- <td>{{ $user->plain_json['result']}}<td> --}}
                @dd($user->json);




            </tbody>
        @endforeach
    </table>

    <script>
        function refreshPage() {
            location.reload(true);
        }
    </script>

    <script>
        function ringkasanPage() {
            window.location.href = "{{ route('ringkasan') }}";
        }
    </script>

</body>

</html>
