const path = require('path');

module.exports = {
  mode: 'production',
  entry: './public/js/app.js',
  output: {
    path     : path.resolve(__dirname),
    filename : 'public/js/dist/bundle.js'
  }
};