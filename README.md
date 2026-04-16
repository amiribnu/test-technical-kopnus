Link Dokumentasi API: https://docs.google.com/document/d/1Vqkh5Kzk9h3LLcLice7wfK0BkriCrswbKcvXqWloGOA/edit?usp=sharing

Prosedur menajalankan program:
1. clone repository ini
2. install composer
3. install npm
4. sesuaikan .env dengan database yang digunakan
5. jalankan perintah php artisan migrate
6. jalankan perintah :
   1. php artisan db:seed --class=UserRoleSeeder
   2. php artisan db:seed --class=EmployerSeeder
   3. php artisan db:seed --class=CandidateSeeder
   4. php artisan db:seed --class=VacancySeeder
   5. php artisan db:seed --class=JobApplicationSeeder
      NB: Jalankan sesuai urutan yang di berikan
7. jalan kan npm run dev
8. jalan kan php artisan serve
9. API siap digunakan.

*STACK YANG DIGUNAKAN*
PHP : 8.4
Laravel : 12 / 13
Database : MySQL

