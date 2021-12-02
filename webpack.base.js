const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const fs = require('fs');
const webpack = require('webpack');

const PATHS = {
	src: path.join(__dirname, './src'),
	dist: path.join(__dirname, './dist'),
	assets: 'assets/',
};

const PAGES_DIR = PATHS.src;
const PAGES = fs.readdirSync(PAGES_DIR).filter((fileName) => fileName.endsWith('.html'));

module.exports = {
	externals: {
		paths: PATHS,
	},
	entry: {
		vends: path.join(PATHS.src, 'assets/index.js'),
		app: PATHS.src,
		about: path.join(PATHS.src, 'js/about.js'),
	},
	output: {
		path: PATHS.dist,
		filename: `${PATHS.assets}js/[name].[hash].js`,
		sourceMapFilename: '[name].[hash:8].map',
		assetModuleFilename: 'src/assets/images/[name].[ext]',
		// publicPath: '/',
	},

	resolve: {
		alias: {
			'@': PATHS.src,
		},
		extensions: ['*', '.js', '.json'],
	},
	optimization: {
		splitChunks: {
			cacheGroups: {
				vendor: {
					name: 'vendors',
					test: /node_modules/,
					chunks: 'all',
					enforce: true,
				},
			},
		},
	},
	module: {
		rules: [
			{
				test: /\.html$/,
				use: ['html-loader'],
			},
			{
				test: /\.css$/,
				use: [
					// 'style-loader',
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: { sourceMap: true },
					},
					{
						loader: 'sass-loader',
						options: { sourceMap: true },
					},
					{
						loader: 'postcss-loader',
						options: {
							sourceMap: true,
							postcssOptions: {
								config: `./postcss.config.js`,
							},
						},
					},
				],
			},
			{
				test: /\.scss$/,
				use: [
					// 'style-loader',
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: { sourceMap: true },
					},
					{
						loader: 'sass-loader',
						options: { sourceMap: true },
					},
					{
						loader: 'postcss-loader',
						options: {
							sourceMap: true,
							postcssOptions: {
								config: `./postcss.config.js`,
							},
						},
					},
				],
			},
			{
				test: /\.js$/,
				loader: 'babel-loader',
				exclude: '/node_modules/',
			},
			{
				test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
				loader: 'file-loader',
				options: {
					name: '[name].[ext]',
					outputPath: 'assets/fonts/',
					publicPath: 'assets/fonts/',
				},
			},
			{
				test: /\.(png|jpg|gif|svg|jpeg)$/,
				type: 'asset/resource',
				// options: {
				// 	name: '[name].[ext]',
				// 	outputPath: 'assets/images/',
				// 	publicPath: 'assets/images/',
				// },
			},
		],
	},

	plugins: [
		new webpack.ProvidePlugin({
			$: 'jquery',
			jQuery: 'jquery',
			'window.jQuery': 'jquery',
		}),
		new CleanWebpackPlugin(),
		new MiniCssExtractPlugin({
			filename: `${PATHS.assets}css/[name].[hash].css`,
		}),
		new CleanWebpackPlugin(),
		new MiniCssExtractPlugin({
			filename: `${PATHS.assets}css/[name].[hash].css`,
		}),
		new CopyWebpackPlugin({
			patterns: [
				{
					from: `${PATHS.src}/${PATHS.assets}img`,
					to: `${PATHS.assets}img`,
				},
				{
					from: `${PATHS.src}/${PATHS.assets}fonts`,
					to: `${PATHS.assets}fonts`,
				},
				{
					from: `${PATHS.src}/static`,
					to: '',
				},
			],
		}),
		new HtmlWebpackPlugin({
			template: `${PAGES_DIR}/about.html`,
			filename: `./about.html`,
			inject: 'body',
			chunks: ['vends', 'about'],
		}),
		new HtmlWebpackPlugin({
			template: `${PAGES_DIR}/index.html`,
			filename: `./index.html`,
			inject: 'body',
			chunks: ['vends', 'app'],
		}),
		// ...PAGES.map(
		// 	(page) =>
		// 		new HtmlWebpackPlugin({
		// 			template: `${PAGES_DIR}/${page}`,
		// 			filename: `./${page}`,
		// 			inject: 'body',
		// 		})
		// ),
	],
};
