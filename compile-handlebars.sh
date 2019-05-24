#!/bin/bash

if command -v handlebars 2>/dev/null; then
    handlebars js/templates/table.handlebars -f js/templates/table.js
else
    echo "Handlebars not installed, please check the README.md"
fi
