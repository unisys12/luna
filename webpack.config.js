const path = require("path");
const TerserJSPlugin = require("terser-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

module.exports = {
  entry: {
    main: "./assests/js/index.js"
  },
  output: {
    path: path.resolve(__dirname, "."),
    filename: "main.js"
  },
  optimization: {
    minimize: true,
    minimizer: [new TerserJSPlugin({}), new OptimizeCSSAssetsPlugin({})]
  },
  plugins: [
    new MiniCssExtractPlugin({
      // output a single CSS file titled 'style.css'
      filename: "style.css",
      chunkFilename: "[id].css",
      ignoreOrder: false // Enable to remove warnings about conflicting order
    }),
    new BrowserSyncPlugin({
      // browse to http://localhost:3000/ during development,
      // ./ directory is being served
      host: "wp-lmh.test"
      //   port: 3000,
      //   server: { baseDir: ["./"] }
    })
  ],
  module: {
    rules: [
      {
        test: /\.css$/i,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              // output to the root of the theme folder
              publicPath: ".",
              hmr: process.env.NODE_ENV === "development"
            }
          },
          "css-loader"
        ]
      },
      {
        test: /\.(woff|woff2|eot|ttf|otf)$/i,
        use: [
          {
            loader: "file-loader"
          }
        ]
      }
    ]
  }
};
