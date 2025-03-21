// Event listener pada tombol "Cek Nilai"
document.getElementById("cekNilaiBtn").addEventListener("click", function () {
  const nim = document.getElementById("nim").value; // Mengambil nilai input NIM
  const nilai = document.getElementById("nilai").value; // Mengambil nilai input nilai
  const resultDiv = document.getElementById("result"); // Div untuk menampilkan hasil

  // Validasi jika input NIM atau nilai kosong
  if (!nim || !nilai) {
    resultDiv.textContent = "Harap isi NIM dan nilai terlebih dahulu!"; // Pesan error jika input kosong
    resultDiv.style.color = "red"; // Warna merah untuk pesan error
    return; // Menghentikan proses selanjutnya
  }

  const parsedNilai = parseFloat(nilai); // Konversi nilai ke angka
  let hurufMutu; // Variabel untuk huruf mutu

  // Validasi rentang nilai
  if (parsedNilai < 0 || parsedNilai > 100) {
    resultDiv.textContent = "Nilai tidak valid!"; // Menampilkan error jika nilai tidak valid
    resultDiv.style.color = "red"; // Warna merah untuk pesan error
  } else {
    // Menentukan huruf mutu berdasarkan nilai
    if (parsedNilai >= 80) {
      hurufMutu = "A";
    } else if (parsedNilai >= 70) {
      hurufMutu = "B";
    } else if (parsedNilai >= 60) {
      hurufMutu = "C";
    } else if (parsedNilai >= 50) {
      hurufMutu = "D";
    } else {
      hurufMutu = "E";
    }

    // Menampilkan hasil huruf mutu
    resultDiv.textContent = `Huruf Mutu: ${hurufMutu}`;
    resultDiv.style.color = "green"; // Warna hijau untuk hasil valid
  }
});
