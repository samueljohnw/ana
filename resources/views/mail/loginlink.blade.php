<x-mail::message>
# Login to AnaWerner.org

Click the button to login. 

<x-mail::button :url="$url">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
