@component('mail::message')
# Notifikasi Produk Baru

Sebuah produk baru telah berhasil ditambahkan ke dalam sistem.

**Nama Produk:** {{ $product->name }}
**Harga:** {{ $product->price }}

Terima kasih,
{{ config('app.name') }}
@endcomponent