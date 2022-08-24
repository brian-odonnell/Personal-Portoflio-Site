const path = require("path");
const base = require("./webpack.base");
const { merge } = require("webpack-merge")

const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const GenerateJsonPlugin = require('generate-json-webpack-plugin');
const CopyPlugin = require("copy-webpack-plugin");
const ImageMinimizerPlugin = require('image-minimizer-webpack-plugin');

function makeHash(length) {
	let result = '';
	let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	let charactersLength = characters.length;
	for (let i = 0; i < length; i++) {
		result += characters.charAt(Math.floor(Math.random() * charactersLength));
	}
	return result;
}
let filehash = makeHash(30);

module.exports = merge(base, {
	output: {
		filename: `js/containers/[name].${filehash}.js`,
	},
	module: {
		rules: [
			{
				test: /\.scss$/,
				use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
			}
		],
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: `css/[name].${filehash}.css`,
		}),
		new GenerateJsonPlugin('appsettings.js.json', {
			"AppSettings": {
				"JSHash": filehash
			}
		}),
		new CopyPlugin({
			patterns: [
				{
					from: "**/**",
					to: "./images",
					context: path.resolve(__dirname, "src", "images/"),
				},
			],
		}),
		new ImageMinimizerPlugin({
			minimizerOptions: {
				plugins: [
					['gifsicle', { interlaced: true }],
					['jpegtran', { progressive: true }],
					['optipng', { optimizationLevel: 5 }],
					[
						'svgo',
						{
							plugins: [
								{
									removeViewBox: false,
								},
							],
						},
					],
				],
			},
		}),
	],
});
