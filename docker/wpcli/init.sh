#!/bin/sh
set -euo pipefail

SCRIPT_DIR=$(cd -- "$(dirname -- "$0")" && pwd)
WP_PATH=/var/www/html
THEME_SLUG=blizniak-smerek

"$SCRIPT_DIR/wait-for-wp.sh"

if ! wp --path=$WP_PATH --allow-root core is-installed; then
  echo "Installing WordPress..."
  wp --path=$WP_PATH --allow-root core install \
    --url="${WP_URL:-http://localhost:8087}" \
    --title="Blizniak w Smereku" \
    --admin_user="${WP_ADMIN_USER:-admin}" \
    --admin_password="${WP_ADMIN_PASS:-adminpass}" \
    --admin_email="${WP_ADMIN_EMAIL:-admin@example.com}" \
    --skip-email

  wp --path=$WP_PATH --allow-root option update blogdescription "Dom na wylacznosc w Bieszczadach"
  wp --path=$WP_PATH --allow-root option update timezone_string "Europe/Warsaw"
  wp --path=$WP_PATH --allow-root rewrite structure '/%postname%/' --hard
  wp --path=$WP_PATH --allow-root rewrite flush --hard

  HOME_ID=$(wp --path=$WP_PATH --allow-root post list --post_type=page --title='Home' --field=ID | head -n 1 || true)
  if [ -z "$HOME_ID" ]; then
    HOME_ID=$(wp --path=$WP_PATH --allow-root post create --post_type=page --post_title='Home' --post_status=publish --porcelain)
    echo "Created Home page with ID $HOME_ID"
  else
    echo "Reusing existing Home page with ID $HOME_ID"
  fi
  wp --path=$WP_PATH --allow-root option update show_on_front page
  wp --path=$WP_PATH --allow-root option update page_on_front "$HOME_ID"
else
  echo "WordPress already installed; ensuring theme activation."
fi

wp --path=$WP_PATH --allow-root theme activate "$THEME_SLUG"
echo "Setup complete."
