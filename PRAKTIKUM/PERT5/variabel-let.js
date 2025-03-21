function contohLet() {
  let y = 10; // Deklarasi variabel di luar blok (scope global dalam fungsi)
  if (true) {
    let y = 20; // Deklarasi variabel baru di dalam blok (scope lokal dalam blok)
    console.log("Nilai dalam blok:", y); // Output: 20
  }
  console.log("Nilai luar blok:", y); // Output: 10
}
contohLet();

function contohConst() {
  const z = 100; // Deklarasi variabel dengan nilai tetap
  console.log("Nilai awal:", z); // Output: 100

  try {
    z = 200; // Percobaan mengubah nilai const (akan menyebabkan error)
  } catch (error) {
    console.log("Error:", error.message); // Menampilkan pesan error
  }
}
contohConst();
