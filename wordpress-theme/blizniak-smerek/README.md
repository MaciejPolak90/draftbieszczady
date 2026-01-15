# Motyw „Bliźniak w Smereku”

Statyczny motyw WordPress oparty o build Vite/React (kopiowane assety z `dist`). Nie wymaga Node/Tailwind/React na hostingu.

## Instalacja
- Skopiuj cały katalog `wordpress-theme/blizniak-smerek` do `wp-content/themes/blizniak-smerek` na serwerze.
- W kokpicie włącz motyw. Ustaw statyczną stronę główną, aby użyć `front-page.php`.
- Włącz miniatury dla CPT: motyw rejestruje `bs_photo` + taksonomię `bs_photo_category`.

## Edycja treści (Kokpit → Wygląd → Dostosuj)
- Sekcja „Bliźniak w Smereku – Ustawienia”: nazwa/brand, tytuł i lead hero, cena, adres, telefon, WhatsApp, zasady, zwierzęta, opis układu, opis lokalizacji, link do Google Maps, obraz HERO.
- Dane są wstrzykiwane w sekcjach: HERO/Details, Cennik, Lokalizacja, CTA/stopka, zwierzaki.

## Galeria
- Typ wpisu: **Galeria (bs_photo)** – dodaj tytuł + obraz wyróżniający.
- Kategorie (tworzone automatycznie): `salon`, `kuchnia`, `pokoje`, `lazienki`, `altana`, `okolica`, `taras`. Używaj tych slugów dla filtrów.
- Filtr „Taras (wkrótce)” i placeholder kafel dodawane są zawsze.
- Brak zdjęć → motyw pokaże instrukcję w sekcji galerii.

## Formularz kontaktowy
- Pola: imię, telefon, daty od/do, liczba osób, checkbox zwierzę, wiadomość.
- Zabezpieczenia: nonce + honeypot. Mail idzie na `admin_email`.
- Po wysłaniu redirect do `?sent=1/0` + komunikat w sekcji kontakt.
- CTA: telefon, WhatsApp, SMS (numery z Customizera).

## UX / JS
- Sticky header desktop, sticky bottom bar mobile, smooth scroll z offsetem nagłówka.
- Filtry galerii + lightbox, prosty akordeon FAQ.
- Ładowane assety z `assets/index-*.css/js` (hashowane) + `assets/js/theme.js` (interakcje).

## Aktualizacja assetów
- W repo wykonaj `npm install` (lub `npm ci` gdy lock i pkg są w sync) + `npm run build`.
- Skopiuj zawartość `dist/assets` do `wordpress-theme/blizniak-smerek/assets/` (nadpisz hashowane pliki).
- Nie trzeba niczego budować na serwerze.

## Struktura
- `style.css` – nagłówek motywu.
- `functions.php` – enqueue assetów (glob index-*.css/js), Customizer, CPT/tax dla galerii, obsługa formularza.
- `header.php` / `footer.php` – layout + sticky navbar i mobilny pasek CTA.
- `front-page.php` – pełny landing 1:1 z wersji Vite (sekcje hero, atuty, układ, galeria, zwierzaki, cennik, lokalizacja, kontakt, FAQ).
- `assets/` – skopiowane buildy z Vite + `assets/js/theme.js`, `assets/css/theme.css` (drobne interakcje/animacje).
- `index.php` – fallback szablon WordPress.

## Uwagi
- Motyw domyślnie korzysta z czcionek z builda (Google Fonts), klas Tailwind wygenerowanych w `index-*.css`.
- Jeśli pojawią się nowe klasy w markup – dodaj własne style do `assets/css/theme.css`.
