const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const fs = require('fs');
const webpack = require('webpack');
const CompressionPlugin = require('compression-webpack-plugin');
const ImageMinimizerPlugin = require('image-minimizer-webpack-plugin');
const { extendDefaultPlugins } = require('svgo');
const glob = require('glob');
const PurgeCSSPlugin = require('purgecss-webpack-plugin');

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
		mainpage: path.join(PATHS.src, 'assets/vendor/vendor.mainpage.js'),
		allpages: path.join(PATHS.src, 'assets/vendor/vendor.allpages.js'),
		about: path.join(PATHS.src, 'assets/js/about.page.js'),
		app: PATHS.src,
		// about: path.join(PATHS.src, 'js/about.js'),
	},
	output: {
		path: PATHS.dist,
		filename: `${PATHS.assets}js/[name].[hash].js`,
		sourceMapFilename: '[name].[hash:8].map',
		assetModuleFilename: 'assets/images/[name].[ext]',
		publicPath: 'auto',
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
			// {
			// 	test: /\.html$/,
			// 	use: [
			// 		{
			// 			loader: 'html-loader',
			// 			// options: {
			// 			// 	minimize: true,
			// 			// 	preprocessor: (content, loaderContext) =>
			// 			// 		content.replace(/<include src="(.+)"\s*\/?>(?:<\/include>)?/gi, (m, src) => {
			// 			// 			const filePath = path.resolve(loaderContext.context, src);
			// 			// 			loaderContext.dependency(filePath);
			// 			// 			return fs.readFileSync(filePath, 'utf8');
			// 			// 		}),
			// 			// },
			// 		},
			// 	],
			// },
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
				type: 'asset/resource',
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
		new MiniCssExtractPlugin({
			filename: '[name].css',
		}),
		new PurgeCSSPlugin({
			paths: glob.sync(`${PATHS.src}/**/*`, { nodir: true }),
		}),
		new ImageMinimizerPlugin({
			minimizerOptions: {
				// Lossless optimization with custom option
				// Feel free to experiment with options for better result for you
				plugins: [
					['gifsicle', { interlaced: true }],
					['mozjpeg', { progressive: true }],
					['optipng', { optimizationLevel: 5 }],
					// Svgo configuration here https://github.com/svg/svgo#configuration
					[
						'svgo',
						{
							plugins: [
								{
									name: 'removeViewBox',
									active: false,
								},
								{
									name: 'addAttributesToSVGElement',
									params: {
										attributes: [{ xmlns: 'http://www.w3.org/2000/svg' }],
									},
								},
							],
						},
					],
				],
			},
		}),
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
					from: `${PATHS.src}/${PATHS.assets}images`,
					to: `${PATHS.assets}images`,
				},
				{
					from: `${PATHS.src}/snippets`,
					to: `${PATHS.dist}/snippets`,
				},
				{
					from: `${PATHS.src}/.htaccess`,
					to: `${PATHS.dist}/`,
				},
				// {
				// 	from: `${PATHS.src}/templates`,
				// 	to: `${PATHS.dist}/templates`,
				// },
			],
		}),
		new HtmlWebpackPlugin({
			template: `${PAGES_DIR}/about.html`,
			filename: `./about.html`,
			inject: 'body',
			chunks: ['mainpage', 'about'],
		}),
		new HtmlWebpackPlugin({
			template: `${PAGES_DIR}/index.html`,
			filename: `./index.html`,
			inject: 'body',
			chunks: ['vends', 'app'],
		}),
		new HtmlWebpackPlugin({
			template: `${PAGES_DIR}/templates/del.html`,
			filename: `./tpl/del.html`,
			inject: 'body',
			chunks: ['allpages', 'app'],
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
