const webpack = require('webpack');
const { merge } = require('webpack-merge');
const baseWebpackConfig = require('./webpack.base');

module.exports = merge(baseWebpackConfig, {
	mode: 'development',
	devtool: 'cheap-module-source-map',
	//devtool: 'source-map',
	plugins: [
		new webpack.SourceMapDevToolPlugin({
			filename: '[file][hash:20].map',
		}),
	],
	devServer: {
		historyApiFallback: true,
		static: {
			directory: baseWebpackConfig.externals.paths.dist,
		},
		compress: true,
		port: 9000,
		hot: true,
		open: true,
		watchFiles: ['src/**/*'],
	},
});
