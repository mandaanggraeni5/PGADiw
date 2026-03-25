<form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
<input name="nama" placeholder="Nama">
<input name="harga" type="number">
<input name="stock" type="number">
<input name="diskon" type="number">
<input name="promo_text">

Flashsale:
<select name="flashsale">
<option value="0">No</option>
<option value="1">Yes</option>
</select>

<input type="datetime-local" name="flashsale_end">

<input type="file" name="gambar">
<button>Tambah</button>
</form>
