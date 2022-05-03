@component('mail::message')
# Notifikasi

Postingan kamu mendapatkan komentar baru

@component('mail::button', ['url' => ''])
Lihat postingan
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
