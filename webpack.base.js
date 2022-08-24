const path = require("path");

module.exports = {
  mode: "production",
  devtool: "source-map",
  entry: {
    app: "./src/scss/app.scss",
    global: [
		"./src/js/global.js",
	]
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
    ],
  },
};
