# SIM PRESENSI KELOMPOK 3

## Update (21/12/2020)

Menambahkan register dan login menggunakan laravel jetstream. login dan register menggunakan email.

lihat `routes/web.php` untuk route. dan, `resources/views` untuk bagian tampilan.

bagian tampilan register dan login berada di `resources/views/auth`.

## Update (4/1/2021)

tampilan mahasiswa route `/` dan post akan redirect ke `/` juga.

## TODO

- Fork project ini
- lakukan perubahan pada repo forking
- pull request

tutorial: [tutorial kontribusi ke repositori public](!https://www.petanikode.com/github-workflow/)

## Beberapa Setup Jika Ingin Clone dari Repo Forking

- [tutorial setup laravel setelah clone dari github](https://medium.com/angkringan/cara-clone-project-laravel-dari-git-bb2dd403dde3)

## Setelah Clone, Hubungkan dengan Database

Hubungkan dengan database, dan jalankan migrate agar tabel yang telah ditentukan terbuat di database.

jalankan

`php artisan migrate`

atau

`php artisan migrate:refresh`

kemudian cek database apakah sudah ada tabel `absences`, `courses`, dan `students`.

## Tutorial Git Lengkap

- [Tutorial lengkap git dari dasar](https://www.petanikode.com/tutorial/git/)
