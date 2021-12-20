@component('mail::message')
# Perdaftaran Siswa Baru

Selamat Anda Telah terdaftar di SD negeri 200118 Sadabuan

@component('mail::button', ['url' => 'http://junandaari@gmail.com'])
Klik Disini
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent