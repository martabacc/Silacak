# Sistem Informasi Pelacakan
--
This document summarizes my work as a part timer @LPTSI ITS Surabaya. Started at 1st Sept 2016, I was assigned to maintain and adding new features according to LPPM needs. It is built in CodeIgniter. Previous developers were developed it nicely, but still leave some smelly codes. Didnt use any kind of pattern.


## Changelog
--

Current development target (Assigned 6 April 2017) :
- [ ] Setiap angka di tabel publikasi per lab diarahkan ke link daftar publikasi
- [ ] (idem no 1) untuk di halaman Report personal
- [*] Urut filter fakultas sesuai kode
- [ ] penambahan filter fakultas, jurusan dan laboratorium di halaman publikasi
- [*] bug di tampilan laporan publikasi di fakultas
- [ ] department's drop down is based on chosen faculty's drop down above (-_______-)
- [ ] mini info about the selected filter after it redirects to a new page


### Finished Assignments
1. Kategorisasi berdasarkan JIT, JITT (sampe 8 filter)
2. Using Elsevier API to automate the publication checking process.
3. [Canceled] Group by per lab (dari data Excel yang diberikan)  
   Due to insufficient lecturer's data.
4. Group by per lab (dengan pusat data dari DB SIMPEL)


## Acknowledgements
--
Note for next Developer :

1. Contains SO FUCKING MUCH duplicate (yet uneffective) codes. Better use ctrl + shift + f before considering your work is done.
2. Large Class Ahead
3. Beware of the parameters
4. Using csrf (if you want to ajax , send the token)
5. Tables loaded using datatable - and the ajax loaded from its method as well.
6. The publication type codes is hardcoded (set as static variables at constants.php cmiiw). If you have to add/remove/change publication type database, make sure you change the constants or other pages will be ruined.
7. [NOTE] *As I often forgot it
	There is N publication types
	And M category of it (such as Journal for JIT, JITT and JNT etc)
	Make sure you save id of M in db.
8. Javascript files is linking itself everywhere. Pay attention to ajax url it calls, the methods and what kind of variables it declares in the called function.