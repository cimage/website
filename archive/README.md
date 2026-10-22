# Arkiv av cimage.se (statisk kopia)

Skapad 2026-10-22 med `wget --mirror` av https://cimage.se/ och efterbehandlad. Sajten uppdateras inte längre; den här katalogen
är en färdig statisk webbplats som kan serveras direkt (till exempel med Caddy `file_server`, ingen PHP behövs).

- `img.php`-bilderna (`/image/...?w=...`) är sparade som vanliga filer, med rena namn: `kodim04__w150-h150-crop-to-fit.png`.
  Alla länkar är omskrivna till de nya namnen. Typfiländelsen följer filens verkliga innehåll.
- Filer med versionsfråga har fått den i namnet: `style.min__2016-11-20.css`, `fontawesome-webfont__v4.5.0.woff2`.
- Den dynamiska delen (live-`img.php`, jämförelsesidan) finns inte kvar. Källkoden finns i resten av repot.
- Sidan `doc/convert-to-srgb.html` hämtade sina sex exempelbilder från `static.dbwebb.se` (ogiltigt certifikat, och källbilderna
  saknades där, så de var trasiga redan på live-sajten). De ligger nu lokalt: originalen i `img/example/` och de bearbetade
  varianterna (`?so`, `?so&srgb`) i `image/example/` (`hamburger__so.jpg`, `car__so-srgb.png`, ...), hämtade från cimage.se på do3.
  Obs: `?so` och `?so&srgb` gav identiska bilder på do3 (filerna har samma checksumma), så sRGB-exemplet visar ingen skillnad.
- Känd död länk som fanns redan på live-sajten: `doc/image/compare-tool.png` (404). Länken `static.dbwebb.se/doc/configure#mode`
  på `doc/check-environment.html` är en vanlig sidlänk och är oförändrad. Externa länkar (GitHub, Packagist, Gitter, Travis) är oförändrade.
