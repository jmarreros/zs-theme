const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const config = {
    entry: './src/main.scss',
    module: {
        rules: [
            {
                test: /\.(css|scss)/, 
                use: [
                    MiniCssExtractPlugin.loader,
                    "css-loader",
                    "sass-loader"
                  ]
            }
        ],
    },
    output: {
        path: __dirname,
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "style.css"
        }),
    ]
}

module.exports = config;

