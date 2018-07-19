<!DOCTYPE html>
<html>
<head>
   <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
<div class ="jumbotron text-center">
<h1><p>Pendaftaran Akun Ditolak!</h1></p>
</div>
<p>Silahkan cek identitas anda kembali dan lakukan pendaftaran kembali pada aplikasi dengan data yang valid</p>

<table>
  <tr>
    <th>Informasi</th>
    <th>Data</th>
  </tr>
  <tr>
    <td>Nama</td>
    <td>{{$name}}</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>{{$email}}</td>
  </tr>
   <tr>
    <td>No. KTP</td>
    <td>{{$identity_number}}</td>
  </tr>
    <tr>
    <td>Alamat</td>
    <td>{{$address}}</td>
  </tr>
    <tr>
    <td>No. HP</td>
    <td>{{$phone}}</td>
  </tr>
</table>

<p align="center">
<img src='http://vizyan.xyz/images/sudutnegeri.png' alt='sudutNegeri' />
</p>

</body>	 
</html>



