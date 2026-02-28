export default [
  {
    files: ['assets/js/**/*.js'],
    languageOptions: {
      ecmaVersion: 2020,
      sourceType: 'script',
      globals: {
        document: 'readonly',
        window: 'readonly',
        console: 'readonly',
        requestAnimationFrame: 'readonly',
        setTimeout: 'readonly',
        IntersectionObserver: 'readonly',
        parseInt: 'readonly',
        Math: 'readonly',
      },
    },
    rules: {
      'no-unused-vars': 'warn',
      'no-undef': 'error',
      'no-console': 'off',
      'semi': ['warn', 'always'],
      'eqeqeq': ['warn', 'smart'],
      'no-var': 'off',          // proyecto usa var intencionalmente (ES5 compat)
      'prefer-const': 'off',
    },
  },
];
