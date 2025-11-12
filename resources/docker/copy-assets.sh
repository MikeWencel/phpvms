#!/bin/sh
set -e

# Ensure destination exists
mkdir -p ./public/build

# If we have prebuilt assets in ./build, and destination is empty or missing, copy them
if [ -d ./build ] && [ "$(ls -A ./build 2>/dev/null)" ]; then
	# Clear destination to avoid stale files
	rm -rf ./public/build/* 2>/dev/null || true
	cp -R ./build/* ./public/build/
else
	echo "[copy-assets] No prebuilt assets found in ./build; skipping copy."
fi

# Do NOT remove ./build; keep it to allow idempotent restarts
