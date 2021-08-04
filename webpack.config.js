const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const CssNano = require('cssnano');
const UglifyJS = require('uglifyjs-webpack-plugin');

//Resource Path
const JS_DIR = path.resolve(__dirname, 'assets/src/');
const IMG_DIR = path.resolve(__dirname, 'assets/src/img');

//Public Path
const BUNDLE_DIR = path.resolve(__dirname, 'assets/public');

const entry = {
    main : JS_DIR + '/app.js'
};
const output = {
    path: BUNDLE_DIR,
    filename: 'js/[name].js'
};

//Rules
const rules = [
    {
        test : /\.js$/,
        include: [JS_DIR],
        exclude: /node_modules/,
        use: 'babel-loader'
    },
    {
        test : /\.scss$/,
        exclude: /node_modules/,
        use: [MiniCssExtractPlugin.loader, "css-loader"],
    },
    {
        test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
                name: '[path][name].[ext]',
                publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../'
              }
          },
        ],
      },
];

const plugins = ( argv ) => [
	new CleanWebpackPlugin( {
		cleanStaleWebpackAssets: ( argv.mode === 'production' )
	} ),

	new MiniCssExtractPlugin( {
		filename: 'css/[name].css'
	} ),
];


module.exports = (env, argv) => ({
    entry : entry,
    output: output,
    devtool: 'source-map',
    module : {
        rules: rules,
    },
    optimization:{
        minimizer: [
            new OptimizeCssAssetsPlugin({
                cssProcessor: CssNano
            }),
            new UglifyJS({
                cache: false,
                parallel: true,
                sourceMap: false
            })
        ]
    },
    plugins: plugins(argv),
    externals: {
        jquery: 'jQuery',
      }
})