#!/bin/bash

# Import latest private/*.mysql.gz into the docker db service.

set -euo pipefail

DB_NAME="drupal"
DB_USER="drupal"
DB_PASS="drupal_local_change_me"

if ! docker info > /dev/null 2>&1; then
  echo "Docker is not running. Please start Docker first."
  exit 1
fi

if [ ! -f docker-compose.yml ]; then
  echo "docker-compose.yml not found in current directory."
  exit 1
fi

if [ ! -d private ]; then
  echo "private/ directory not found."
  exit 1
fi

LATEST_DUMP=$(ls -1t private/*.mysql.gz 2>/dev/null | head -n 1 || true)
if [ -z "${LATEST_DUMP}" ]; then
  echo "No dump found at private/*.mysql.gz"
  exit 1
fi

echo "Latest dump: ${LATEST_DUMP}"

echo "Waiting for db container to be ready..."
docker compose exec -T db sh -lc 'until mysqladmin ping -uroot -p"$MARIADB_ROOT_PASSWORD" --silent; do sleep 1; done'

# Ensure web service is named correctly (optional sanity check).
if ! docker compose config --services 2>/dev/null | grep -qx 'web-qtair'; then
  echo "Warning: expected service 'web-qtair' not found in compose config."
fi

echo "Importing into database: ${DB_NAME}"
gunzip -c "${LATEST_DUMP}" | docker compose exec -T db mysql -u"${DB_USER}" -p"${DB_PASS}" "${DB_NAME}"

echo "Import done."
