#!/bin/bash

# Start the PHP built-in server in the background
php -S localhost:8000 &

# Save the process ID of the PHP server
SERVER_PID=$!

# Function to open the browser
open_browser() {
  if command -v xdg-open > /dev/null; then
    xdg-open "http://localhost:8000/index.php"
  elif command -v open > /dev/null; then
    open "http://localhost:8000/index.php"
  elif command -v start > /dev/null; then
    start "http://localhost:8000/index.php"
  else
    echo "Please open http://localhost:8000/index.php in your browser"
  fi
}

# Open the browser initially
open_browser

# Check if inotify-tools is available
if ! command -v inotifywait > /dev/null; then
  echo "inotify-tools not found. Please install it:"
  echo "  Ubuntu/Debian: sudo apt-get install inotify-tools"
  echo "  CentOS/RHEL: sudo yum install inotify-tools"
  echo "  macOS: brew install fswatch (alternative solution needed)"
  echo ""
  echo "Server running at http://localhost:8000"
  echo "Press Ctrl+C to stop the server"
  wait $SERVER_PID
  exit 1
fi

# Monitor file changes in the current directory
echo "Watching for file changes..."
echo "Server running at http://localhost:8000"
echo "Press Ctrl+C to stop the server"

while inotifywait -r -e modify,create,delete --exclude '\.(git|tmp|log)' .; do
  echo "File change detected, refreshing browser..."
  open_browser
done

# Kill the PHP server when the script is interrupted
trap 'echo "Stopping PHP server..."; kill $SERVER_PID 2>/dev/null' INT EXIT
