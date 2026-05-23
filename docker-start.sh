#!/bin/bash

# Drupal 7 Docker Start Script (safe ports, build & run)
echo "Starting Drupal 7 Docker environment..."

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

WEB_PORT=18080
DB_PORT=13306

check_port_free() {
  local port="$1"
  if lsof -nP -iTCP:"${port}" -sTCP:LISTEN >/dev/null 2>&1; then
    return 1
  fi
  return 0
}

fail_port() {
  local port="$1"
  echo -e "${RED}Port ${port} is already in use.${NC}"
  echo -e "${YELLOW}Find the process with:${NC} lsof -nP -iTCP:${port} -sTCP:LISTEN"
  exit 1
}

# Check Docker daemon
if ! docker info > /dev/null 2>&1; then
  echo -e "${RED}Docker is not running. Please start Docker Desktop first.${NC}"
  exit 1
fi

# Check compose file
if [ ! -f docker-compose.yml ]; then
  echo -e "${RED}docker-compose.yml not found.${NC}"
  exit 1
fi

# Check ports before running
echo -e "${BLUE}Checking ports...${NC}"
check_port_free "${WEB_PORT}" || fail_port "${WEB_PORT}"
check_port_free "${DB_PORT}" || fail_port "${DB_PORT}"
echo -e "${GREEN}Ports are free: ${WEB_PORT} (web), ${DB_PORT} (db)${NC}"

# Ensure Drupal public files directory exists
if [ ! -d sites/default/files ]; then
  echo -e "${YELLOW}Creating sites/default/files...${NC}"
  mkdir -p sites/default/files
fi

# Start containers
echo -e "${BLUE}Building and starting containers...${NC}"
docker compose up -d --build

echo ""
echo -e "${GREEN}Drupal 7 is starting.${NC}"
echo -e "${GREEN}App URL:${NC} ${BLUE}http://localhost:${WEB_PORT}${NC}"
echo -e "${GREEN}DB port:${NC} ${BLUE}127.0.0.1:${DB_PORT}${NC}"

echo ""
echo -e "${YELLOW}Container status:${NC}"
docker compose ps

echo ""
echo -e "${YELLOW}Recent logs (web):${NC}"
docker compose logs --tail=80 web-qtair
