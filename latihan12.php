
<html>
<head>
<title>Untitled Document</title>
</head>
<body>
<h2>FORM BIODATA</h2>
<form method="post" action="latihan12pro.php">
<pre>
First Name   : <input type="text" size="30" maxlength="50" name="_nama"><br />
Gender       : <input type="radio" value="Laki-Laki" name="_gender">Laki-Laki
               <input type="radio" value="Perempuan" name="_gender" >Perempuan<br />
Hobby        : <input type="checkbox" value="Korespondensi" name="_hobby[]">Korespondensi
               <input type="checkbox" value="Traveling" name="_hobby[]">Traveling
               <input type="checkbox" value="Shopping" name="_hobby[]">Shopping<br />
Pendidikan   : <select name="_pendidikan">
               <option value="SD">SD</option>
               <option value="SMP">SMP</option>
               <option value="SMA">SMA</option>
			   </select><br />
Alamat       : <textarea rows="3" cols="30" name="_alamat"></textarea><br />
               <input type="submit" value="Simpan" name="submit">

</pre>
</form>
</body>
</html>
