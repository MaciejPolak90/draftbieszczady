# Œrodowisko Docker dla WordPress

## Wymagania
- Docker / Docker Desktop z `docker compose`

## Konfiguracja
1. WejdŸ do katalogu `docker/`.
2. SprawdŸ wartoœci w `.env` (port, URL, dane bazy, dane admina WP). Domyœlnie WordPress s³ucha na `http://localhost:8087`.

## Uruchomienie
- Start: `docker compose up -d`
- Po chwili WP-CLI w kontenerze `wpcli` zainstaluje WordPress, utworzy stronê „Home”, ustawi permalink `/%postname%/` i aktywuje motyw `blizniak-smerek` (montowany z `../wordpress-theme/blizniak-smerek`).
- Adres: `http://localhost:8087`
- Panel: `http://localhost:8087/wp-admin`
- Login: `admin` / has³o z `.env` (`WP_ADMIN_PASS`)

## Zarz¹dzanie
- Podgl¹d logów WP-CLI: `docker compose logs -f wpcli`
- Zatrzymanie (bez usuwania danych): `docker compose down`
- Zatrzymanie z czyszczeniem wolumenów (baza + wp_data): `docker compose down -v`

## Struktura us³ug
- `db`: MariaDB 10.6 z trwa³ym wolumenem `db_data`
- `wordpress`: `wordpress:php8.2-apache`, port `${PORT}:80`, wolumen `wp_data` + motyw z repo
- `wpcli`: `wordpress:cli` uruchamia `/scripts/init.sh` (idempotentne)
