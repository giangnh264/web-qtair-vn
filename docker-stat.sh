#!/bin/bash

# Drupal 7 Docker Status Script
echo "Checking Drupal 7 Docker environment status..."

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

# Check Docker daemon
if ! docker info > /dev/null 2>&1; then
    echo -e "${RED}Docker is not running.${NC}"
    exit 1
fi

echo -e "${BLUE}Docker daemon is running.${NC}"

# Check compose services
if [ ! -f docker-compose.yml ]; then
    echo -e "${RED}docker-compose.yml not found in current directory.${NC}"
    exit 1
fi

echo -e "${YELLOW}Compose services:${NC}"
docker compose ps

echo ""
echo -e "${YELLOW}Container health snapshot:${NC}"
WEB_ID=$(docker compose ps -q web-qtair)
DB_ID=$(docker compose ps -q db)

if [ -n "$WEB_ID" ]; then
    WEB_STATE=$(docker inspect -f '{{.State.Status}}' "$WEB_ID" 2>/dev/null)
    echo -e "  web-qtair: ${GREEN}${WEB_STATE}${NC}"
else
    echo -e "  web-qtair: ${RED}not created${NC}"
fi

if [ -n "$DB_ID" ]; then
    DB_STATE=$(docker inspect -f '{{.State.Status}}' "$DB_ID" 2>/dev/null)
    echo -e "  db: ${GREEN}${DB_STATE}${NC}"
else
    echo -e "  db: ${RED}not created${NC}"
fi

echo ""
echo -e "${YELLOW}Port checks:${NC}"
if lsof -nP -iTCP:18080 -sTCP:LISTEN >/dev/null 2>&1; then
    echo -e "  Web port 18080: ${GREEN}listening${NC}"
else
    echo -e "  Web port 18080: ${RED}not listening${NC}"
fi

if lsof -nP -iTCP:13306 -sTCP:LISTEN >/dev/null 2>&1; then
    echo -e "  DB port 13306: ${GREEN}listening${NC}"
else
    echo -e "  DB port 13306: ${RED}not listening${NC}"
fi

echo ""
echo -e "${YELLOW}Quick URLs:${NC}"
echo -e "  App: ${BLUE}http://localhost:18080${NC}"
echo -e "  DB : ${BLUE}127.0.0.1:13306${NC}"

echo ""
echo -e "${YELLOW}Useful commands:${NC}"
echo -e "  Logs web: ${BLUE}docker compose logs --tail=100 web-qtair${NC}"
echo -e "  Logs db : ${BLUE}docker compose logs --tail=100 db${NC}"
echo -e "  Start   : ${BLUE}docker compose up -d${NC}"
echo -e "  Stop    : ${BLUE}docker compose down${NC}"
