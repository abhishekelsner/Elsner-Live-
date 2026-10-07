module.exports = {
  testMatch: ['<rootDir>/tests/js/**/*.test.js'],
  collectCoverage: true,
  collectCoverageFrom: [
    'themes/Elsner-Revemp/src/js/custom.js'
  ],
  coverageDirectory: '<rootDir>/coverage',
  coverageReporters: ['lcov', 'text']
};
