#!/bin/sh
set -euo pipefail

DB_HOST=${WORDPRESS_DB_HOST:-db:3306}
DB_HOSTNAME=${DB_HOST%%:*}
DB_PORT=${DB_HOST#*:}
[ "$DB_PORT" = "$DB_HOST" ] && DB_PORT=3306

printf 'Waiting for database (%s:%s)...\n' "$DB_HOSTNAME" "$DB_PORT"
for i in $(seq 1 30); do
  if DB_HOSTNAME="$DB_HOSTNAME" DB_PORT="$DB_PORT" php -r '
    $host = getenv("DB_HOSTNAME") ?: "db";
    $port = getenv("DB_PORT") ?: "3306";
    $fp = @fsockopen($host, (int)$port, $errno, $errstr, 1.5);
    if ($fp) { fclose($fp); exit(0); }
    fwrite(STDERR, "DB ping failed: $errstr\n");
    exit(1);
  ' >/dev/null 2>&1; then
    echo "Database is up."
    break
  fi
  sleep 2
  if [ "$i" -eq 30 ]; then
    echo "Database did not become ready in time." >&2
    exit 1
  fi
done

HEALTH_URL=${WP_HEALTH_URL:-http://wordpress:80/wp-login.php}
printf 'Waiting for WordPress (%s)...\n' "$HEALTH_URL"
for i in $(seq 1 30); do
  STATUS=$(curl -s -o /dev/null -w "%{http_code}" "$HEALTH_URL" || true)
  if echo "$STATUS" | grep -qE "^(200|301|302)$"; then
    echo "WordPress HTTP is responding (status $STATUS)."
    break
  fi
  sleep 2
  if [ "$i" -eq 30 ]; then
    echo "WordPress did not become ready in time." >&2
    exit 1
  fi
done

echo "Ready to run WP-CLI tasks."

