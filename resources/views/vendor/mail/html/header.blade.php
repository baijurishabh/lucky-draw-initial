@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
<img src="https://hr.torcinfotech.com/public/user-uploads/app-logo/2f033c5d0779129f7b73b7df7a706251.png" class="logo" alt="Company Logo">
<br>
<br>
{{ $slot }}

@endif
</a>
</td>
</tr>
