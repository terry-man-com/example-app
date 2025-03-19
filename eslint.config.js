import globals from "globals";
import pluginJs from "@eslint/js";
import eslintConfigPrettier from "eslint-config-prettier";


/** @type {import('eslint').Linter.Config[]} */
export default [
    { files: ["**/*.js"], languageOptions: { sourceType: "commonjs" } },
    {
        languageOptions: { globals: globals.browser },
        rules: {
            "no-undef": "error", // 意味：未定義の変数を使用するとエラー
            "no-unused-vars": "error", // 意味：未使用の変数を定義するとエラー
            eqeqeq: "error", // 意味：厳密等価演算子を使用する
            "prefer-const": "error", // 意味：再代入されない変数はconstで宣言する
            "no-extra-semi": "error", // 意味：余分なセミコロンを許可しない
        },
    },
    pluginJs.configs.recommended,
    eslintConfigPrettier
];
