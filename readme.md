#Changelog
--

Current development target (Assigned 6 April 2017) :
[ ]1. Setiap angka di tabel publikasi per lab diarahkan ke link daftar publikasi
[ ]2. (idem no 1) untuk di halaman Report personal
[*]3. Urut filter fakultas sesuai kode
[ ]4. penambahan filter fakultas, jurusan dan laboratorium di halaman publikasi
[*]5. bug di tampilan laporan publikasi di fakultas
[ ]6. drop down di jurusan tergantung sama fakultas yang dipilih diatasnya (-_______-)


(Forgotten assigned date- Finished)
1. Kategorisasi berdasarkan JIT, JITT (sampe 8 filter)
2. Penggunaan API Elsevier untuk pengecekan publikasi internasional secara otomatis
3. Group by per lab (dari data Excel yang diberikan)
4. Group by per lab (dengan pusat data dari DB SIMPEL)

Note for next Developer :
1. Contains SO FUCKING MUCH duplicate (yet uneffective) codes. Better use ctrl + shift + f before considering your additional feature is done.
2. Using csrf
3. Tables loaded using datatable - and the ajax loaded from its method as well.
4. The publication type codes is hardcoded (set as static variables at constants.php cmiiw). If you have to add/remove/change publication type database, make sure you change the constants or other pages will be ruined.
5. [NOTE] *As I often forgot it
	There is N publication types
	And M category of it (such as Journal for JIT, JITT and JNT etc)
	Make sure you save id of M at the database
6. Javascripts is linked everywhere. Pay attention to what ajax it calls, the methods and what kind of variables it declares in the called function

