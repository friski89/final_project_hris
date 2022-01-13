#!/usr/bin/env bash
git checkout development
git pull origin developement
docker-compose up --build -d
