const path = require("path");
const base = require('./webpack.base');
const { merge } = require("webpack-merge")

const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const HtmlWebpackPlugin = require("html-webpack-plugin");

module.exports = merge(base, {
	mode: "development",
	watch: true,
	output: {
		filename: "js/[name].js",
		path: path.resolve(__dirname, 'themes/2020_Website/assets')
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: "css/[name].css",
		}),
	],
	devServer: {
		port: 9000,
		watchContentBase: true,
		liveReload: true,
	},
	module: {
		rules: [
			{
				test: /\.scss$/,
				use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
			},
			{
				test: /\.ejs$/,
				loader: 'ejs-loader',
				options: {
					variable: 'data',
					interpolate: '\\{\\{(.+?)\\}\\}',
					evaluate: '\\[\\[(.+?)\\]\\]'
				}
			}
		],
	}
});
