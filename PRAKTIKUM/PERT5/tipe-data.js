// Tipe Data Primitif
let nama = "Budi"; // String
let umur = 30; // Number
let isStudent = false; // Boolean
let alamat; // Undefined (belum diberi nilai)
let tidakAda = null; // Null (nilai kosong)

console.log("Nama:", nama); // Output: Nama: Budi
console.log("Umur:", umur); // Output: Umur: 30
console.log("Mahasiswa?", isStudent); // Output: Mahasiswa? false
console.log("Alamat:", alamat); // Output: Alamat: undefined
console.log("Nilai Kosong:", tidakAda); // Output: Nilai Kosong: null

// Tipe Data Non-Primitif (Referensi)
let buah = ["Apel", "Mangga", "Jeruk"]; // Array
let mahasiswa = {
  // Object
  nama: "Rina",
  usia: 20,
  jurusan: "Informatika",
};
let tampilkanPesan = function () {
  // Function
  console.log("Halo dari JavaScript!");
};

console.log("Buah kedua:", buah[1]); // Output: Buah kedua: Mangga
console.log("Jurusan Mahasiswa:", mahasiswa.jurusan); // Output: Jurusan Mahasiswa: Informatika
tampilkanPesan(); // Output: Halo dari JavaScript!
