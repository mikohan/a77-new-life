const { merge } = require('webpack-merge');
const baseWebpackConfig = require('./webpack.base');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');

module.exports = merge(baseWebpackConfig, {
	mode: 'production',
	performance: {
        hints: false,
        maxEntrypointSize: 512000,
        maxAssetSize: 512000
    },
	devtool: false,
	plugins: [],
	optimization: {
		minimizer: [new CssMinimizerPlugin(), new TerserPlugin()],
	},
});
