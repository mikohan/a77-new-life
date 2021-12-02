const { merge } = require('webpack-merge');
const baseWebpackConfig = require('./webpack.base');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');

module.exports = merge(baseWebpackConfig, {
	mode: 'production',
	plugins: [],
	optimization: {
		minimizer: [new CssMinimizerPlugin(), new TerserPlugin()],
	},
});
