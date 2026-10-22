# Arkiv av cimage.se (statisk kopia)

Skapad 2026-10-22 med `wget --mirror` av https://cimage.se/ och efterbehandlad. Sajten uppdateras inte längre; den här katalogen
är en färdig statisk webbplats som kan serveras direkt (till exempel med Caddy `file_server`, ingen PHP behövs).

- `img.php`-bilderna (`/image/...?w=...`) är sparade som vanliga filer, med rena namn: `kodim04__w150-h150-crop-to-fit.png`.
  Alla länkar är omskrivna till de nya namnen. Typfiländelsen följer filens verkliga innehåll.
- Filer med versionsfråga har fått den i namnet: `style.min__2016-11-20.css`, `fontawesome-webfont__v4.5.0.woff2`.
- Den dynamiska delen (live-`img.php`, jämförelsesidan) finns inte kvar. Källkoden finns i resten av repot.
- Kända döda länkar som fanns redan på live-sajten: `doc/image/compare-tool.png` (404) och sju bilder på
  `static.dbwebb.se` (ogiltigt certifikat). Externa länkar (GitHub, Packagist, Gitter, Travis) är oförändrade.
