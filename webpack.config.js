const path = require('path');

module.exports = {
  entry: {
    example: './public/js/src/path/to/file.js'
  },
  output: {
    path: path.dirname('/public/js/dist'),
    filename: '[name].bundle.js'
  },
  devServer: {
    contentBase: './public/js/dist'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader'
        }
      }
    ]
  }
};
