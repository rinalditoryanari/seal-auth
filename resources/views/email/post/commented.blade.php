@component('mail::message')
# Notifikasi

Postingan kamu mendapatkan komentar baru
di post "{{$post->body}}"

@component('mail::button', ['url' => ''])
Lihat postingan
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
