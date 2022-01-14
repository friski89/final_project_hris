#!/usr/bin/env bash
git fetch --all
git checkout development
docker-compose up --build -d
