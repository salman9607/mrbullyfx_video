@component('mail::message')
# Hello

Your account has been approved you can login now.
Enjoy watching videos.

@component('mail::button', ['url' => 'localhost/VideoUpload'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
