const path = require('path');
const FileManagerPlugin = require('filemanager-webpack-plugin');
const FileManagerPluginConfig = require('./FileManagerPluginConfig');
const WebpackBuildNotifierPlugin = require('webpack-build-notifier');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
// const NodemonPlugin = require('nodemon-webpack-plugin'); // Ding


module.exports = (env, argv) => {
	const production = argv.mode === 'production' ;

	return {
		// watch: true,
		entry: {
			admin: './src/index.js'
		},
		output: {
			path: path.resolve(__dirname, 'assets/scripts')
		},
		module: {
			rules: [
				{
					test: /\.m?js$/,
					exclude: /(node_modules|bower_components)/,
					use: {
						loader: 'babel-loader',
						options: {
							presets: ['@babel/preset-env']
						}
					}
				},
				{
					test: /\.s[ac]ss$/i,
					use: [
						MiniCssExtractPlugin.loader,
						// Translates CSS into CommonJS
						"css-loader",
						// Compiles Sass to CSS
						"sass-loader",
					],
				},
			],
		},

		plugins: [
			// new NodemonPlugin(),
			new MiniCssExtractPlugin(),
			// ... Other Plugins
			new FileManagerPlugin( FileManagerPluginConfig( production ) ),
			new WebpackBuildNotifierPlugin({
				// successSound: false,
				title: "Build",
				logo: path.resolve("./img/favicon.png"),
				suppressSuccess: true, // don't spam success notifications
			})
		]
	}
};



