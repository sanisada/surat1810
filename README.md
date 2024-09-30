# AMPLAS BPS PRINGSEWU

Aplikasi Manajemen Penomoran Layanan Surat BPS Kabupaten Pringsewu

## Fitur Utama
- Manajemen surat masuk dan surat keluar
- CRUD (Create, Read, Update, Delete) data surat
- Integrasi dengan Google Sheets
- Otentikasi pengguna menggunakan Keycloak dan OAuth2
- Tabel data dinamis dengan DataTables

## Instalasi

### Prasyarat
- PHP versi **7.4**
- XAMPP versi **7.1.32-2-VC14**
- Composer terinstall di sistem

### Langkah-langkah Instalasi

1. **Clone repository ini:**

   ```bash
   git clone https://github.com/sanisada/surat1810.git

2. **Masuk ke direktori proyek:**

```bash
cd surat1810

3. **Jalankan perintah berikut untuk menginstal dependensi:**

```bash
composer install

4. **Konfigurasi environment:**

Salin file .env.example menjadi .env dan sesuaikan konfigurasi yang diperlukan seperti database dan OAuth2.

```bash
cp .env.example .env

5. **Jalankan aplikasi menggunakan XAMPP:**

Pastikan XAMPP berjalan dan server Apache serta MySQL aktif. Lalu, buka proyek ini di browser melalui alamat berikut:

```bash
http://localhost/surat1810
