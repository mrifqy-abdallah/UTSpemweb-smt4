# UTS pemweb

https://hangmangame-pemweb.000webhostapp.com/

entitas anggota:
K3517005	ALFANDY ZEIN KUSUMA
K3517015	Chrisria Setyaningsih
K3517025	HANIFAH HANUN DZAKIYAH
K3517035	M. RIFQY ABDALLAH
K3517045	NI HALIMAH WIJAYA
K3517055	ROSALIA DEVI KIRANA
K3517065	Jose Feliciano Lim Belo Ximenes

aplikasi game ini merupakan permainan dimana user diharuskan untuk menebak kata yang secara random dipilih (dari file daftar kata) oleh komputer. 
pertama, user diminta untuk login. cukup menggunakan username saja. apabila username yang dimasukkan sebelumnya pernah bermain, ia akan disambut dengan 'welcome....' dan skor yang terakhir kali ia dapatkan akan ditampilkan. dari sini, sesi bermain user dimulai.
kedua, user dipersilahkan untuk memilih level permainan. level mudah memperbolehkan user untuk melakukan 10 percobaan menebak, level medium 5 tebakan, dan level sulit 3 tebakan.
ketiga, dalam menebak kata, apabila selalu salah hingga kesempatan habis, akan ditampilkan jawabannya.
keempat, apabila telah selesai bermain, baik dengan berhasil menjawab maupun gagal, user akan ditawari 'play again' atau 'sign in as other'.
kelima, apabila user memilih 'play again', ia akan mengulangi langkah kedua dan seterusnya, namun ditambah dengan ditampilkan akumulasi skor yang ia dapatkan selama sesi sebelumnya. namun apabila user memilih 'sign in as other', user akan dikembalikan pada langkah pertama dan sesi bermainnya diakhiri. ketika sesi diakhiri, akumulasi skor yang diperoleh akan disimpan di dalam database.



game ini seluruhnya dapat berjalan sebagaimana urutan diatas ketika dijalankan di localhost. namun ketika kami hosting, muncul beberapa error:
1. pada langkah pertama, meski user sebelumnya pernah bermain, ia tidak disambut dan skor terakhirnya tidak ditampilkan
2. pada langkah ketiga, terdapat 2 error. ketika kesempatan menjawab tinggal 1 kali, komputer menunjukkan error 'parsererror': kemudian gambar menjadi blank, dan nyawa menjadi bernilai minus 1. error lainnya adalah, ketika menjawab benar pada 1 huruf terakhir, ia juga menunjukkan 'parsererror'
3. pada langkah kelima, pilihan 'play again' tidak menampilkan akumulasi skor
